<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\User;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\Domain;
use App\Models\Company;
use App\Models\Experience;
use App\Models\OfferUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::take(6)->get();
        $cities = City::all();
        $domains = Domain::withCount(['offers' => function ($query) {
            $query->where('status', 0);
        }])->get();
         $offers = Offer::where('status', 0)->take(6)->get();
        return view('welcome', compact('offers','cities','domains','companies'));
    }


    public function edit()
    {
        $user = Auth::user();

        $experiences = Experience::where('user_id', $user->id)->get();
        $allSkills = Skill::all();
        $user->load('formations');
        $user->load('skills');

        return view('profile', compact('user', 'experiences', 'allSkills'));
    }
    public function update(Request $request,)
    {
        $user = Auth::user();

        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $user->clearMediaCollection('user');
            $user->addMedia($request->file('image'))->toMediaCollection('user');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile Updated  successfully');
    }

    public function allCompanies()
    {
        $companies = Company::paginate(6);

        return view('companies', compact('companies'));
    }


    public function show($companyId)
    {
        $company = Company::findOrFail($companyId);
        $employees=User::where('company_id',$company->id)->count();
        $Alloffers=User::where('company_id',$company->id)->count();
        $cities = City::all();
        $domains = Domain::all();
        $offers = Offer::where('company_id', $company->id)
        ->where('status', 0)
        ->paginate(6);
           return view('companyDetails',compact('company','employees','Alloffers','cities','domains','domains','offers'));
    }
    public function searchByTitle(Request $request)
    {
        $query = $request->input('query');
        $offerQuery = Offer::query();
        if ($query) {
            $offerQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%$query%");
            });
        }
        $offers = $offerQuery->get();
        foreach ($offers as $offer) {
            $offerData[] = [
                'title' => $offer->title,
                'description' =>  strlen($offer->description) > 50 ? substr($offer->description, 0, 50) . '...' : $offer->description,
                'domain' => $offer->domain->name,
                'company' => $offer->company->name,
                'city' => $offer->city->name,
                'imageUrl' =>  $offer->company->getFirstMediaUrl('company'),
                'created_at' => $offer->created_at->diffForHumans()
            ];
        }
        return response()->json($offerData);
    }

    public function searchByCity(Request $request)
    {
        $query = $request->input('query');


        $offerQuery = Offer::query();

        if ($query) {
            $offerQuery->whereHas('city', function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%");
            });
        }

        $offers = $offerQuery->get();
        foreach ($offers as $offer) {
            $offerData[] = [
                'title' => $offer->title,
                'description' =>  strlen($offer->description) > 50 ? substr($offer->description, 0, 50) . '...' : $offer->description,
                'domain' => $offer->domain->name,
                'company' => $offer->company->name,
                'city' => $offer->city->name,
                'imageUrl' =>  $offer->company->getFirstMediaUrl('company'),
                'created_at' => $offer->created_at->diffForHumans()
            ];
        }

        return response()->json($offerData);
    }

 
}

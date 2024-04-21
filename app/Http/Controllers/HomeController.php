<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\Domain;
use App\Models\Company;
use App\Models\Experience;
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
    public function search(Request $request)
    {
        $query = $request->input('query');
        $domain = $request->input('domain');


        $offerQuery = Offer::query();

        if ($query) {
            $offerQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%$query%");
            });
        }


        if ($domain && $domain != 0) {
            $offerQuery->whereHas('domain', function ($queryBuilder) use ($domain) {
                $queryBuilder->where('id', $domain);
            });

        }
        $offers = $offerQuery->get();

        $eventData = [];

        foreach ($offers as $offer) {
            $offerData[] = [
                'title' => $offer->title,
                'description' => $offer->description,
                'domain' => $offer->domain->name,
                'company' => $offer->company->name,
                'city' => $offer->city->name,
                'imageUrl' =>  $offer->company->getFirstMediaUrl('company'),
            ];
        }

        return response()->json($offerData);





    }
}

<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Offer;
use App\Models\Domain;
use App\Models\Company;
use App\Models\OfferUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserOfferController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $cities = City::all();
        $domains = Domain::all();
        $offers = Offer::where('status', 0)->paginate(6);
        return view('stages_post', compact('offers','cities','domains','companies'));
    }

    public function store(Request $request)
    {
        $offerUser = OfferUser::create($request->all());
        $offerUser->addMediaFromRequest('cv')->toMediaCollection('CVs');
        return back()->with('success', 'Your request sent successfully.');
    }

    public function show($offerId)
    {
        $offer = Offer::findOrFail($offerId);
        return view('ApplyOffer',compact('offer'));
    }
    public function checkApplied(Request $request, $id)
    {
        $userId = Auth::id();

        $userApplied = OfferUser::where('user_id', $userId)
                                ->where('offer_id', $id)
                                ->exists();

        return response()->json(['applied' => $userApplied]);
    }
    public function myApplications($userId)
    {
        $user = User::findOrFail($userId);
        $offers = $user->offers()->get();
        $cities = City::all();
        $companies = Company::all();
        $domains = Domain::all();

        return view('myApplications', compact('offers', 'cities', 'domains', 'companies'));
    }



}

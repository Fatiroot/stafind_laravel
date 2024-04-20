<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Offer;
use App\Models\Domain;
use App\Models\Company;
use App\Models\OfferUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

}

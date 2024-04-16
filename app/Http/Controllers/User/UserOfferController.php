<?php

namespace App\Http\Controllers\User;

use App\Models\Offer;
use App\Models\OfferUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserOfferController extends Controller
{

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

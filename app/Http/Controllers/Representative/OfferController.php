<?php

namespace App\Http\Controllers\Representative;

use App\Models\City;
use App\Models\Offer;
use App\Models\Domain;
use App\Models\OfferUser;
use App\Mail\AcceptRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;

class OfferController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cities = City::all();
        $domains = Domain::all();
        $offers = Offer::where('user_id', $user->id)->get();
        return view('representative.offer.index', compact('offers','cities','domains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $domains = Domain::all();
        return view('representative.offer.create',compact('cities','domains'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request)
    {
           Offer::create($request->all());
            return redirect()->route('representativeOffer.index')->with('success', 'offer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $cities = City::all();
        $domains = Domain::all();
        $offer=Offer::findOrFail($id);


        return view('representative.offer.update', compact('offer','cities','domains'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, $id)
{
    $offer = Offer::findOrFail($id);
    $offer->update($request->validated());
    return redirect()->route('representativeOffer.index')->with('success', 'Offer updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);

        $offer->delete();

        return redirect()->route('representativeOffer.index')->with('success', 'Offer deleted successfully.');
    }

    public function getRequests( $offerId){
        $offer = Offer::findOrFail($offerId);
        $requests = OfferUser::with('user')->whereHas('offer', function($query) use($offer){
            $query->where('id',$offer->id);
        })->get();
        return view('representative.offer.requests', compact('requests'));
    }


        public function changeStatus( $Id)
        {
            $request = OfferUser::with('user')->findOrFail($Id);

        $request->update(['status' => 1]);

        $user = $request->user;
        Mail::to($user->email)->send(new AcceptRequest($request));
        return redirect()->back()->with('success', 'Status changed successfully');

        }

}

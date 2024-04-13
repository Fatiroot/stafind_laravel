<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Models\City;
use App\Models\Offer;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateOfferRequest;

class OfferController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $cities = City::all();
        $domains = Domain::all();
        $offers = Offer::where('user_id', $user->id)->get();
        return view('entrepreneur.offer.index', compact('offers','cities','domains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $domains = Domain::all();
        return view('entrepreneur.offer.create',compact('cities','domains'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

           Offer::create($request->all());
            return redirect()->route('entrepreneurOffer.index')->with('success', 'offer created successfully.');
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


        return view('entrepreneur.offer.update', compact('offer','cities','domains'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, $id)
{
    $offer = Offer::findOrFail($id);
    $offer->update($request->validated());
    return redirect()->route('entrepreneurOffer.index')->with('success', 'Offer updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);

        $offer->delete();

        return redirect()->route('entrepreneurOffer.index')->with('success', 'Offer deleted successfully.');
    }
}

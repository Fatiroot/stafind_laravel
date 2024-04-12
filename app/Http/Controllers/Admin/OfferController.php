<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {

        $offers = Offer::all();
        return view('admin.offer', compact('offers'));
    }

    public function changeStatus(Request $request, $offerId)
    {
        $offer = Offer::findOrFail($offerId);

        $offer->update(['status' => !$offer->status]);

        return redirect()->back()->with('success', 'Status changed successfully');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Mail\MailDetailsOffer;
use App\Mail\MailConfirmationOffer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OfferController extends Controller
{
    public function index()
    {

        $offers = Offer::all();
        return view('admin.offer', compact('offers'));
    }

    public function changeStatus($Id)
    {
        $offer = Offer::findOrFail($Id);
            $offer->update(['status' => 0]);
            Mail::to($offer->user->email)->send(new MailConfirmationOffer($offer));
            Mail::to($offer->user->email)->send(new MailDetailsOffer($offer));
            return redirect()->back()->with('success', 'status changed  successfully');


    }


}

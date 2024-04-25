<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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

        $offers = Offer::paginate(6);
        return view('admin.offer', compact('offers'));
    }

    public function changeStatus($id)
    {
        try {
            // Find the offer by ID and update its status to 0
            $offer = Offer::findOrFail($id);
            $offer->update(['status' => 0]);

            // Find all users with status 1 and role named "candidate"
            $users = User::where('status', 1)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'candidate');
                })
                ->get();

            foreach ($users as $user) {
                Mail::to($user->email)->send(new MailDetailsOffer($offer));
            }

            Mail::to($offer->user->email)->send(new MailConfirmationOffer($offer));

            // Redirect back with success message
            return redirect()->back()->with('success', 'Status changed successfully');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., offer not found)
            return redirect()->back()->with('error', 'Failed to change status: ' . $e->getMessage());
        }
    }
}

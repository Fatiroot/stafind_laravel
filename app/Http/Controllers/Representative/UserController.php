<?php

namespace App\Http\Controllers\Representative;

use App\Models\User;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\OfferUser;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailConfirmationUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $representative = Auth::user();
        $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'Entrepreneur');
            })
            ->where('status', 0)
            ->where('company_id', $representative->company_id)
            ->get();
         $usersCount = User::whereHas('roles', function ($query) {
                $query->where('name', 'Entrepreneur');
            })
            ->where('company_id', $representative->company_id)
            ->count();
        $usersbannedCount = User::whereHas('roles', function ($query) {
                $query->where('name', 'Entrepreneur');
            })
            ->where('status', 0)
            ->where('company_id', $representative->company_id)
            ->count();
        $offerCount =Offer::where('user_id', $representative->id )->count();

        $requestCount = OfferUser::whereHas('offer', function ($query) use ($representative) {
            $query->where('user_id', $representative->id);
        })
        ->count();

        return view('representative.index', compact(['users','usersbannedCount','usersCount','offerCount','requestCount']));
    }
    public function edit()
    {
        $user = Auth::user();

        $experiences = Experience::where('user_id', $user->id)->get();
        $allSkills = Skill::all();
        $user->load('formations');
        $user->load('skills');

        return view('representative.update', compact('user', 'experiences', 'allSkills'));
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

        return redirect()->route('representative.index')->with('success', 'Profile updated successfully.');
    }



    public function changeStatus( $Id)
    {
        $user =User::findOrFail($Id);

        $user->update(['status' => 1]);
        Mail::to($user->email)->send(new MailConfirmationUser($user));

        return redirect()->back()->with('success', 'Status changed successfully');
    }

    public function entrepreneur()
    {
        $representative = Auth::user();
        $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'Entrepreneur');
            })
            ->where('status', 1)
            ->where('company_id', $representative->company_id)
            ->get();

        return view('representative.entrepreneur.index', compact('users'));
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

}

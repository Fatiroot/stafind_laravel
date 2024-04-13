<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Models\User;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $Entrepreneur = Auth::user();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Entrepreneur');
        })
        ->where('company_id', $Entrepreneur->company_id)
        ->get();

        $offerCount =Offer::where('user_id', $Entrepreneur->id )->count();
        return view('entrepreneur.index', compact(['users','offerCount']));
    }
    public function edit()
    {
        $user = Auth::user();

        $experiences = Experience::where('user_id', $user->id)->get();
        $allSkills = Skill::all();
        $user->load('formations');
        $user->load('skills');

        return view('entrepreneur.update', compact('user', 'experiences', 'allSkills'));
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

        return redirect()->route('entrepreneur.index')->with('success', 'Profile updated successfully.');
    }





}

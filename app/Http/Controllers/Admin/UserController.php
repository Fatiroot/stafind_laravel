<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\Domain;
use App\Models\Company;
use App\Models\Experience;
use App\Mail\MailUserBanned;
use Illuminate\Http\Request;
use App\Mail\MailUnbanneUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User ::paginate(6);
        return view('admin.user', compact('users'));
    }
    public function edit()
    {
        $user = Auth::user();
        $experiences = Experience::where('user_id', $user->id)->get();
        $allSkills = Skill::all();
        $user->load('formations');
        $user->load('skills');

        return view('admin.profile', compact('user', 'experiences', 'allSkills'));
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

        return redirect()->back()->with('success', 'Profile Updated  successfully');
    }
    public function changeStatus($Userid)
    {
        $user = User::findOrFail($Userid);
        if ($user->status == 1) {
            $user->update(['status' => 0]);
            Mail::to($user->email)->send(new MailUserBanned($user));
            return redirect()->back()->with('success', 'status changed  successfully');

        } elseif ($user->status == 0) {
            $user->update(['status' => 1]);
            Mail::to($user->email)->send(new MailUnbanneUser($user));
            return redirect()->back()->with('success', 'status changed  successfully');

        }

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'user deleted successfully');
   }

   public function showStatistic(){
    $offerCount =Offer::count();
    $userCount =User::count();
    $cityCount =City::count();
    $domainCount =Domain::count();
    $companyCount =Company::count();

    return view('admin.index', compact(['offerCount','userCount','cityCount','domainCount','companyCount']));
}
}

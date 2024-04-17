<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Mail\MailUserBanned;
use Illuminate\Http\Request;
use App\Mail\MailUnbanneUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User ::all();

        return view('admin.user', compact('users'));
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
}

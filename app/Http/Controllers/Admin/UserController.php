<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User ::all();

        return view('admin.user', compact('users'));
    }


    public function updateStatus(Request $request, User $user)
    {
        if ($user) {
            if ($user->status) {
                $user->status = 0;
            } else {
                $user->status = 1;
            }
            $user->save();
        }
        return redirect()->back()->with('success', ' Status changes successfuly');
    }

}

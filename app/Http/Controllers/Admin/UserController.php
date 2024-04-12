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


    public function changeStatus(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $user->update(['status' => !$user->status]);

        return redirect()->back()->with('success', 'Status changed successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'user deleted successfully');
   }
}

<?php

namespace App\Http\Controllers\Representative;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $representative = Auth::user();
        $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'Entrepreneur');
            })
            ->where('status', 0)
            ->where('company_id', $representative->company_id) // Filter by company_id
            ->get();

        return view('representative.index', compact('users'));
    }


    public function changeStatus(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 1;
        $user->save();
        return back()->with('success', 'User status changed successfully.');
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

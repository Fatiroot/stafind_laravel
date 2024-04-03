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

}

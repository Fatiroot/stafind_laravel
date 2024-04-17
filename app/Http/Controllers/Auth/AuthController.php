<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function registerView(){
        $companies = Company::all();
        return view('auth.register', compact('companies'));
    }

    public function register(Request $request)
{
    // Créer un utilisateur avec les données de la requête
    // dd($request);
    $user = User::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'status' => 1,
        'address' => $request->address,
        'phone' => $request->phone,
    ]);
    if ($request->hasFile('image')) {
        $user->addMedia($request->file('image'))->toMediaCollection('user');
    }
    if ($request->role == 4) {
        $user->roles()->attach(4);
        $user->status = 0;
        $company = Company::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
        ]);
        if ($request->hasFile('logo')) {
            $company->addMedia($request->file('logo'))->toMediaCollection('company');
        }
        $user->company()->associate($company);
    }
    elseif ($request->role == 3) {
        $user->roles()->attach(3);
        $user->company_id = $request->company_id;
        $user->status = 0;
    }
    else {
        $user->roles()->attach(2);
    }

    $user->save();

    return redirect()->route('login');
}


    public function loginView(){
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful
            $user = Auth::user();

            // Set session data for the user
            session([
                'user_name' => $user->fullname,
                'user_id' => $user->id,
                'user_role' => $user->roles->pluck('name')->toArray(),
            ]);

            // Redirect based on the user's roles
            if ($user->hasRole('Admin')) {
                return redirect()->route('adminUser.index');
            } elseif ($user->hasRole('Candidate')) {
                return redirect()->route('home.index');
            } elseif ($user->hasRole('Entrepreneur')) {
                if ($user->status === 1) {
                    return redirect()->route('entrepreneur.index');
                } else {
                    return redirect()->route('login');
                }
            } elseif ($user->hasRole('Representative')) {
                if ($user->status === 1) {
                    return redirect()->route('representative.index');
                } else {
                    return redirect()->route('login');
                }            } else {
                // If none of the specified roles match, redirect to the login page
                return redirect()->route('login');
            }
        } else {
            // Authentication failed, return to the login view
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

}

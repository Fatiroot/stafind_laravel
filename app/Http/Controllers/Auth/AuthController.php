<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Sector;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use \App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView(){
        $companies = Company::all();
        $sectors = Sector::all();
        return view('auth.register', compact('companies','sectors'));
    }
public function register(UserRequest $request)
{
    $validated = $request->all();
        $user = User::create([
            'fullname' => $validated['fullname'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'status' => 1,
            'address' => $validated['address'],
            'phone' => $validated['phone'],
        ]);

        if ($request->hasFile('image')) {
            $user->addMedia($request->file('image'))->toMediaCollection('user');
        }

        if ($validated['role'] == 4) {
            $user->roles()->attach(4);
            $user->status = 0;

            $company = Company::create([
                'name' => $validated['name'],
                'location' => $validated['location'],
                'description' => $validated['description'],
            ]);

            if ($request->hasFile('logo')) {
                $company->addMedia($request->file('logo'))->toMediaCollection('company');
            }

            $user->company()->associate($company);

            if (isset($validated['sectors'])) {
                foreach ($validated['sectors'] as $sectorId) {
                    $sector = Sector::find($sectorId);
                    if ($sector) {
                        $company->sectors()->attach($sector->id);
                    }
                }
            }
        } elseif ($validated['role'] == 3) {
            $user->roles()->attach(3);
            $user->company_id = $validated['company_id'];
            $user->status = 0;
        } else {
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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            session([
                'user_name' => $user->fullname,
                'user_id' => $user->id,
                'user_role' => $user->roles->pluck('name')->toArray(),
            ]);
            if ($user->hasRole('Admin')) {
                return redirect()->route('showStatistic');
            } elseif ($user->hasRole('Candidate')) {
                return redirect()->route('home.index');
            } elseif ($user->hasRole('Entrepreneur')) {
                if ($user->status === 1) {
                    return redirect()->route('entrepreneur.index');
                } else {
                    return redirect()->route('login')->with('error', 'Invalid credentials');
                }
            } elseif ($user->hasRole('Representative')) {
                if ($user->status === 1) {
                    return redirect()->route('representative.index');
                } else {
                    return redirect()->route('login')->with('error', 'Invalid credentials');
                }
             } else {
                return redirect()->route('login')->with('error', 'Invalid credentials');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Offer;
use App\Models\Domain;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::take(6)->get();
        $cities = City::all();
        $domains = Domain::withCount(['offers' => function ($query) {
            $query->where('status', 0);
        }])->get();
         $offers = Offer::where('status', 0)->take(6)->get();
        return view('welcome', compact('offers','cities','domains','companies'));
    }
    public function allCompanies()
    {
        $companies = Company::paginate(6);

        return view('companies', compact('companies'));
    }

}

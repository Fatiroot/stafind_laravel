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
        $companies = Company::take(4)->get();
        $cities = City::all();
        $domains = Domain::withCount('offers')->get(); // This will include the count of offers for each domain
        $offers = Offer::all();
        return view('welcome', compact('offers','cities','domains','companies'));
    }
}

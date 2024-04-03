<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Domain;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City ::all();
        $domains = Domain ::all();

        return view('admin.city', compact(['cities','domains']));
    }

    public function store(Request $request)
    {
        $cites = City::create($request->all());
        return redirect()->back()->with('success', 'City created successfuly');

    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City ::all();

        return view('admin.city', compact('cities'));
    }

    public function store(Request $request)
    {
        $cites = City::create($request->all());
        return redirect()->back()->with('success', 'City created successfuly');

    }

    public function update(CityUpdateRequest $request, City $city)
    {
        $city->update($request->all());

        return redirect()->back()->with('success', 'City updated successfuly');
    }


    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->back()->with('success', 'City deleted successfully');
   }




}

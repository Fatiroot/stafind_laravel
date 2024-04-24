<?php

namespace App\Http\Controllers\Representative;
use App\Models\Experience;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;

class ExperienceController extends Controller
{
     public function index()
     {
        //
     }

     public function store(ExperienceStoreRequest $request)
     {
         $user = Auth::user();

         $experienceData = $request->validated();

         $experience = new Experience($experienceData);

         $user->experiences()->save($experience);

         return back()->with('success', 'Experience created successfully.');

     }

    public function update(ExperienceUpdateRequest $request, $id)
    {
        $experience= Experience::findOrFail($id);

        $experience->update($request->validated());

        return back()->with('success', 'Experience updated successfully.');
    }



    public function destroy($id)
    {
        $experience= Experience::findOrFail($id);
        $experience->delete();

        return back()->with('success', 'Experience deleted successfully.');
    }
}

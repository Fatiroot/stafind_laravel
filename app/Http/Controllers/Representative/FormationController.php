<?php

namespace App\Http\Controllers\Representative;

use App\Models\Formation;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateRequest;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    public function index()
    {
       //
    }

    public function store(FormationStoreRequest $request)
    {
        $user = Auth::user();
        $validatedData = $request->validated();
        $formation = Formation::create($validatedData);
        $user->formations()->attach($formation->id);
        return back()->with('success', 'Formation created successfully.');
    }



   
   public function update(FormationUpdateRequest $request, $id)
   {
       $formation= Formation::findOrFail($id);

       $formation->update($request->validated());

       return back()->with('success', 'formation updated successfully.');
   }



   public function destroy($id)
   {
       $formation= Formation::findOrFail($id);
       $formation->delete();

       return back()->with('success', 'formation deleted successfully.');
   }
}

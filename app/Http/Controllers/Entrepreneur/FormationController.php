<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateRequest;

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



   public function show(formation $formation)
   {
       return view('formations.update', compact('formation'));
   }

   public function edit(formation $formation)
   {
       return view('formations.update', compact('formation'));
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
   }}

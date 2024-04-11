<?php

namespace App\Http\Controllers\Representative;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SkillStoreRequest;
use App\Http\Requests\SkillUpdateRequest;

class SkillController extends Controller
{
    public function index()
    {
       //
    }

    public function store(SkillStoreRequest $request)
    {
        $user = Auth::user();
        $validatedData = $request->validated();
        $skill = Skill::create($validatedData);
        $user->skills()->attach($skill->id);
        return back()->with('success', 'skill created successfully.');
    }



   public function show(skill $skill)
   {
       return view('skills.update', compact('skill'));
   }

   public function edit(skill $skill)
   {
       return view('skills.update', compact('skill'));
   }

   public function update(SkillUpdateRequest $request, $id)
   {
       $skill= Skill::findOrFail($id);

       $skill->update($request->validated());

       return back()->with('success', 'skill updated successfully.');
   }


   public function destroy($id)
   {
       $skill= Skill::findOrFail($id);
       $skill->delete();
       return back()->with('success', 'skill deleted successfully.');
   }
}

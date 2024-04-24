<?php

namespace App\Http\Controllers\Representative;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyUpdateRequest;

class CompanyController extends Controller
{
    public function index(){
        $user = auth()->user();
        $company = Company::Where('id', $user->company_id)->first();
        return view('entrepreneur.company.index', compact('company'));
    }
    public function edit()
    {
        $user = auth()->user();
        $company = Company::Where('id', $user->company_id)->first();
        return view('representative.company.update', compact('company'));
    }


    public function update(Request $request)
    {
        $company = Company::where('id', $request->input('company_id'))
            ->firstOrFail();
        $company->update($request->all());
        if ($request->hasFile('logo')) {
            $company->clearMediaCollection('company');
            $company->addMediaFromRequest('logo')->toMediaCollection('company');
        }
        return redirect()->back()->with('success', 'Company updated successfully.');
    }


    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back()->with('success', 'Company updated successfully.');
    }

}

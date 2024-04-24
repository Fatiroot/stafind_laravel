<?php

namespace App\Http\Controllers\Entrepreneur;

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
   




}

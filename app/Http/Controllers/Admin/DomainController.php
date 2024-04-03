<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function store(Request $request)
    {
        $domains = Domain::create($request->all());
        return redirect()->back()->with('success', 'Domain created successfuly');

    }
}

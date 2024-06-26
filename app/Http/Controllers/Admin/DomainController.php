<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain ::paginate(6);
        return view('admin.domain', compact('domains'));
    }

    public function store(Request $request)
    {
        Domain::create($request->all());
        return redirect()->back()->with('success', 'Domain created successfuly');

    }
    public function update(Request $request,$id)
    {
        $domain = Domain::findOrFail($id);
        $domain->update($request->all());

        return redirect()->back()->with('success', 'domain updated successfuly');
    }

    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();
        return redirect()->back()->with('success', 'domain deleted successfully');
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminType;

class AdminTypesController extends Controller
{

    public function index()
    {
        $admintypes = AdminType::orderBy('active', 'desc')->Paginate(20);
        return view('backend.admintypes.index', compact('admintypes'));
    }


    public function create()
    {
        return view('backend.admintypes.create');
    }


    public function store(Request $request)
    {
        //dd($request);die;
        $request->validate([
            'name' => ['required']
        ]);

        $admintype = AdminType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('admintypes.index')->with('success', 'Admintypes saved successfully!');
    }


    public function show($id)
    {
        $admintype = AdminType::find($id);

        if (!$admintype) {
            return redirect()->route('admintypes.index')->with('error', 'Role not found.');
        }

        $pageTitle = 'Admin Type';
        $parentMenu = 'Super Master';

        // You can pass the data to a view and display it
        return view('backend.admintypes.show', compact('admintype', 'pageTitle', 'parentMenu'));
    }


    public function edit($id)
    {
        $admintype = AdminType::findOrFail($id);
        //dd($menuLinks);
        $parentMenu = 'Super Master';

        $pageTitle = "Edit";
        return view('backend.admintypes.edit', compact('parentMenu', 'pageTitle', 'admintype'));
    }


    public function update(Request $request, $id)
    {
        $admintype = AdminType::find($id);

        if (!$admintype) {
            return redirect()->route('admintypes.index')->with('error', 'Role not found.');
        }

        // Update the role information
        $admintype->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('admintypes.index')->with('success', 'Admintypes updated successfully!');
    }


    public function destroy($id)
    {
        //
    }
}

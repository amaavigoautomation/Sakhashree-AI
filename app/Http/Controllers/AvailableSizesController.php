<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableSize;

class AvailableSizesController extends Controller
{
    public function index()
    {
        $pageTitle = 'Available Size';
        $parentMenu = 'Product Master';
        $availablesizes = AvailableSize::orderBy('active', 'desc')->paginate(20);

        return view('backend.availablesizes.index', compact('parentMenu', 'pageTitle', 'availablesizes'));
    }

    public function create()
    {
        $pageTitle = "Available Sizes";
        $parentMenu = 'Product Master';

        return view('backend.availablesizes.create', compact('parentMenu', 'pageTitle'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required']
        ]);

        $availablesize = AvailableSize::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('availablesizes.index');
    }

    public function show($id)
    {
        $availablesize = AvailableSize::find($id);

        if (!$availablesize) {
            return redirect()->route('availablesizes.index')->with('error', 'Size not found.');
        }

        $pageTitle = "Available Size";
        $parentMenu = 'Product Master';

        return view('backend.availablesizes.show', compact('availablesize', 'pageTitle', 'parentMenu'));
    }


    public function edit($id)
    {
        $availablesize = AvailableSize::findOrFail($id);
        $pageTitle = "Edit";
        $parentMenu = 'Product Master';
        return view('backend.availablesizes.edit', compact('parentMenu', 'pageTitle', 'availablesize'));
    }


    public function update(Request $request, $id)
    {
        $availablesize = AvailableSize::find($id);

        if (!$availablesize) {
            return redirect()->route('availablesizes.index')->with('error', 'Size not found.');
        }

        $availablesize->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('availablesizes.index');
    }


    public function destroy($id)
    {
        //
    }
}

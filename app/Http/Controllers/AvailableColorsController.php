<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableColor;

class AvailableColorsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Available Color';
        $parentMenu = 'Product Master';
        $availablecolors = AvailableColor::orderBy('active', 'desc')->paginate(20);

        return view('backend.availablecolors.index', compact('parentMenu', 'pageTitle', 'availablecolors'));
    }

    public function create()
    {
        //

        $pageTitle = "Available Color";
        $parentMenu = 'Product Master';

        return view('backend.availablecolors.create', compact('parentMenu', 'pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'color_code' => ['required']
        ]);

        $availablecolor = AvailableColor::create([
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('availablecolors.index')->with('success', 'AvailableColor saved successfully!');
    }

    public function show($id)
    {
        $availablecolor = AvailableColor::find($id);

        if (!$availablecolor) {
            return redirect()->route('availablecolors.index')->with('error', 'Color not found.');
        }

        $pageTitle = "Available Color";
        $parentMenu = 'Product Master';

        return view('backend.availablecolors.show', compact('availablecolor', 'pageTitle', 'parentMenu'));
    }

    public function edit($id)
    {
        $availablecolor = AvailableColor::findOrFail($id);
        $pageTitle = "Edit";
        $parentMenu = 'Product Master';
        return view('backend.availablecolors.edit', compact('parentMenu', 'pageTitle', 'availablecolor'));
    }

    public function update(Request $request, $id)
    {
        $availablecolor = AvailableColor::find($id);

        if (!$availablecolor) {
            return redirect()->route('availablecolors.index')->with('error', 'Color not found.');
        }

        $availablecolor->update([
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('availablecolors.index')->with('success', 'AvailableColor updated successfully!');
    }


    public function destroy($id)
    {
        //
    }
}

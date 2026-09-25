<?php

namespace App\Http\Controllers;

use App\Models\FaqType;
use Illuminate\Http\Request;

class FaqTypeController extends Controller
{
    public function index()
    {
        $faqTypes = FaqType::paginate(10);

        return view('backend.faq_types.index', compact('faqTypes'));
    }

    public function create()
    {
        return view('backend.faq_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'active' => 'required',
        ]);

        // First create FAQ Type
        $faqType = FaqType::create([
            'name' => $request->input('name'),
            'icon' => null,
            'active' => $request->input('active'),
        ]);

        // Upload icon
        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $folder = 'images/icon/' . $faqType->id;
            $iconName = $icon->getClientOriginalName();

            // Move image
            $icon->move(public_path($folder), $iconName);

            // Save image name in database
            $faqType->icon = $iconName;
            $faqType->save();
        }

        return redirect()
            ->route('faq_types.index')
            ->with('success', 'FAQ Type created successfully.');
    }

    public function edit($id)
    {
        $faqType = FaqType::findOrFail($id);

        return view('backend.faq_types.edit', compact('faqType'));
    }

    public function update(Request $request, $id)
    {
        $faqType = FaqType::find($id);

        if (!$faqType) {
            return redirect()->route('faq_types.index')->with('error', 'FAQ Type not found.');
        }

        $faqType->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $folder = 'images/icon/' . $faqType->id;

            $icon->move(public_path($folder), $icon->getClientOriginalName());

            $faqType->icon = $icon->getClientOriginalName();
        }

        $faqType->save();

        return redirect()->route('faq_types.index')->with('success', 'FAQ Type updated successfully!');
    }
}

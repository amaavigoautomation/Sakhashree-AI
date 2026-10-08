<?php

namespace App\Http\Controllers;

use App\Models\FaqType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqTypeController extends Controller
{
    public function index()
    {
        $faqTypes = FaqType::paginate(10);
        $PageTitle = 'FAQ Category';

        return view('backend.faq_types.index', compact('faqTypes', 'PageTitle'));
    }

    public function create()
    {
        $PageTitle = 'FAQ Category';
        return view('backend.faq_types.create', compact('PageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:faq_types,name',
            ],
            'icon' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'active' => [
                'required',
                'boolean',
            ],
        ]);

        $faqType = FaqType::create([
            'name' => $request->input('name'),
            'icon' => null,
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $folder = 'images/icon/' . $faqType->id;
            $iconName = $icon->getClientOriginalName();

            $icon->move(public_path($folder), $iconName);

            $faqType->icon = $iconName;
            $faqType->save();
        }

        return redirect()
            ->route('faq_types.index')
            ->with('success', 'FAQ Category created successfully.');
    }

    public function edit($id)
    {
        $faqType = FaqType::findOrFail($id);
        $PageTitle = 'FAQ Category';

        return view('backend.faq_types.edit', compact('faqType', 'PageTitle'));
    }

    public function update(Request $request, $id)
    {
        $faqType = FaqType::find($id);

        if (!$faqType) {
            return redirect()
                ->route('faq_types.index')
                ->with('error', 'FAQ Category not found.');
        }

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('faq_types', 'name')->ignore($faqType->id),
            ],
            'icon' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'active' => [
                'required',
                'boolean',
            ],
        ]);

        $faqType->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $folder = 'images/icon/' . $faqType->id;
            $iconName = $icon->getClientOriginalName();

            $icon->move(public_path($folder), $iconName);

            $faqType->icon = $iconName;
            $faqType->save();
        }

        return redirect()
            ->route('faq_types.index')
            ->with('success', 'FAQ Category updated successfully!');
    }
}

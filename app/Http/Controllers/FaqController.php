<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->filled('faq_type_id')) {
            $query->where('faq_type_id', $request->faq_type_id);
        }

        if ($request->filled('status')) {
            $query->where('active', $request->status);
        }

        $faqs = $query->paginate(10);

        $faqTypes = FaqType::where('active', 1)->get();

        return view('backend.faqs.index', compact('faqs', 'faqTypes'));
    }

    public function create()
    {
        $faqTypes = FaqType::where('active', 1)->get();

        return view('backend.faqs.create', compact('faqTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_type_id' => ['required', 'exists:faq_types,id'],
            'question' => ['required', 'string', 'unique:faqs,question'],
            'answer' => ['required', 'string', 'unique:faqs,answer'],
            'active' => ['required'],
        ]);

        Faq::create([
            'faq_type_id' => $request->faq_type_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'active' => $request->active,
        ]);

        return redirect()
            ->route('faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        $faqTypes = FaqType::where('active', 1)->get();

        return view('backend.faqs.edit', compact('faq', 'faqTypes'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'faq_type_id' => ['required', 'exists:faq_types,id'],
            'question' => [
                'required',
                'string',
                Rule::unique('faqs', 'question')->ignore($faq->id),
            ],
            'answer' => [
                'required',
                'string',
                Rule::unique('faqs', 'answer')->ignore($faq->id),
            ],
            'active' => ['required'],
        ]);

        $faq->update([
            'faq_type_id' => $request->faq_type_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'active' => $request->active,
        ]);

        return redirect()
            ->route('faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function show($id)
    {
        $faq = Faq::findOrFail($id);

        return view('backend.faqs.show', compact('faq'));
    }
}

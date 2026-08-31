<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogAuthor;

class BlogAuthorsController extends Controller
{
    public function index(Request $request)
    {
        $pageTitle = 'Blog Author';
        $parentMenu = 'Blog';
        $blogQuery = BlogAuthor::query();

        if ($request->filled('author_name')) {
            $blogQuery->where('author_name', 'LIKE', '%' . $request->author_name . '%');
        }

        if ($request->filled('active')) {
            $status = $request->active === 'active' ? 1 : 0;
            $blogQuery->where('active', $status);
        }

        $blogauthors = $blogQuery->paginate(20);
        $names = BlogAuthor::select('author_name')->get()->pluck('author_name')->toArray();
        // dd($names);
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];

        return view('backend.blogauthors.index', compact('blogauthors', 'pageTitle', 'parentMenu', 'names', 'statuses'));
    }


    public function create()
    {
        $pageTitle = 'Add';
        return view('backend.blogauthors.create', compact('pageTitle'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'author_name' => ['required'],
        ]);

        $blogauthor = BlogAuthor::create([
            'author_name' => $request->input('author_name'),
            'note' => $request->input('note'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('author_image')) {
            $image = $request->file('author_image');
            $folder = 'images/blog_author/author_image/' . $blogauthor->id;
            $image->move(public_path($folder), $image->getClientOriginalName());

            $blogauthor->author_image = $image->getClientOriginalName();
        }
        $blogauthor->save();
        // dd($blogauthor);
        return redirect()->route('blogauthors.index')->with('success', 'BlogAuthors saved successfully!');
    }


    public function show($id)
    {
        //
        $blogauthor = BlogAuthor::find($id);

        if (!$blogauthor) {
            return redirect()->route('blogauthors.index')->with('error', 'blogauthors not found.');
        }

        $pageTitle = 'View';
        $parentMenu = 'Blog';

        return view('backend.blogauthors.show', compact('blogauthor', 'pageTitle', 'parentMenu'));
    }

    public function edit($id)
    {
        $blogauthor = BlogAuthor::findOrFail($id);
        $parentMenu = 'Blog';
        $pageTitle = "Edit";

        return view('backend.blogauthors.edit', compact('parentMenu', 'pageTitle', 'blogauthor'));
    }


    public function update(Request $request, $id)
    {
        $blogauthor = BlogAuthor::find($id);

        if (!$blogauthor) {
            return redirect()->route('blogauthors.index')->with('error', 'blogauthor not found.');
        }

        $blogauthor->update([
            'author_name' => $request->input('author_name'),
            'note' => $request->input('note'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('author_image')) {
            $image = $request->file('author_image');
            $folder = 'images/blog_author/author_image/' . $blogauthor->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $blogauthor->author_image = $image->getClientOriginalName();
        }

        $blogauthor->save();
        // dd($blogauthor);
        return redirect()->route('blogauthors.index')->with('success', 'BlogAuthors updated successfully!');
    }

    public function destroy($id)
    {
        //
    }
}

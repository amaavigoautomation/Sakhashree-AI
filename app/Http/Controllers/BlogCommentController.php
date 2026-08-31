<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{

    public function index(Request $request)
    {
        // dd($request);
        $blogId = '';
        $blogQuery = BlogComment::query();

        $blogQuery->with('blogs');

        if ($request->filled('blog_id')) {
            $blogId = $request->query('blog_id');
            $blogQuery->where('blog_id', $blogId);
        }

        if ($request->filled('active')) {
            $status = $request->active === 'active' ? 1 : 0;
            $blogQuery->where('active', $status);
        }

        if ($request->filled('name')) {
            $name = $request->query('name');
            $blogQuery->where('name', $name);
        }

        $blogcomments = $blogQuery->paginate(20);
        $blogIds = BlogComment::select('blog_id')->distinct()->get();
        $active = ['active' => 'Active', 'inactive' => 'Inactive'];
        $names = BlogComment::select('name')->distinct()->get();
        return view('backend.blogcomments.index', compact('blogcomments','blogId','names','active','blogIds'));
    }


    public function create(Request $request)
    {
        $blogId = ($request->filled('blog_id')) ? $request->query('blog_id') : '';
        $blogcomments = Blog::where('active', true)->get();

        return view('backend.blogcomments.create', compact('blogId', 'blogcomments'));
    }


    public function add(Request $request)
    {
        $blogcomments = BlogComment::create([
            'blog_id' => $request->input('blog_id'),
            'name' =>  $request->input('name'),
            'email' =>  $request->input('email'),
            'remark' =>  $request->input('remark'),
            'active' =>  $request->input('active', 0),
        ]);

        if ($blogcomments->save()) {
            return redirect()->back()->with('blogcomments')->with('success', 'Blog Comment created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create Blog Comment');
        }
    }


    public function show($id)
    {
        $blogcomments = BlogComment::find($id);
        return view('backend.blogcomments.show', compact('blogcomments'));
    }


    public function edit($id)
    {
        $blogcomments = BlogComment::find($id);
        $blog = Blog::where('active', true)->get();
        return view('backend.blogcomments.edit', compact('blogcomments', 'blog'));
    }


    public function update(Request $request, $id)
    {
        $blogcomments = BlogComment::find($id);
        $data = $request->all();

        $data['updated_at'] = now();
        $blogcomments->update($data);

        if($blogcomments->save()){
            return redirect()->back()->with('blogcomments.index')->with('success', 'BlogComments updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to update blog.');
        }

        // return redirect()->route('blogcomments.index')->with('success', 'BlogComments Updated successfully.');

    }


    public function destroy(string $id)
    {
        //
    }
}

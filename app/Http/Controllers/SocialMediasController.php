<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediasController extends Controller
{
    public function index()
    {
        $pageTitle = 'Social Media';
        $parentMenu = 'Super Master';
        $socialmedias = SocialMedia::orderBy('active', 'desc')->Paginate(20);

        return view('backend.socialmedias.index', compact('parentMenu', 'pageTitle', 'socialmedias'));
    }

    public function create()
    {
        $pageTitle = 'Add';

        return view('backend.socialmedias.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'link' => ['required'],
        ]);

        $socialmedia = SocialMedia::create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_icon')) {
            $image = $request->file('image_icon');
            $folder = 'images/socialmedias/image_icon/' . $socialmedia->id;
            $image->move(public_path($folder), $image->getClientOriginalName());

            $socialmedia->image_icon = $image->getClientOriginalName();
        }
        $socialmedia->save();

        return redirect()->route('socialmedias.index')->with('success', 'Socialmedia saved successfully!');
    }

    public function show($id)
    {
        $socialmedia = SocialMedia::find($id);

        if (!$socialmedia) {
            return redirect()->route('socialmedias.index')->with('error', 'socialmedias not found.');
        }

        $pageTitle = 'SocialMedia';
        $parentMenu = 'Super Master';
        return view('backend.socialmedias.show', compact('socialmedia', 'pageTitle', 'parentMenu'));
    }

    public function edit($id)
    {
        $socialmedia = SocialMedia::findOrFail($id);
        $parentMenu = 'Super Master';
        $pageTitle = "Edit";

        return view('backend.socialmedias.edit', compact('parentMenu', 'pageTitle', 'socialmedia'));
    }


    public function update(Request $request, $id)
    {
        $socialmedia = SocialMedia::find($id);

        if (!$socialmedia) {
            return redirect()->route('socialmedias.index')->with('error', 'Socialmedia not found.');
        }

        $socialmedia->update([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_icon')) {
            $image = $request->file('image_icon');
            $folder = 'images/socialmedias/image_icon/' . $socialmedia->id;
            $image->move(public_path($folder), $image->getClientOriginalName());

            $socialmedia->image_icon = $image->getClientOriginalName();
        }
        $socialmedia->save();

        return redirect()->route('socialmedias.index')->with('success', 'Socialmedia updated successfully!');
    }


    public function destroy($id)
    {
        //
    }
}

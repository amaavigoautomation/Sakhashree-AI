<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $query = Category::query();

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $query->where('active', $status);
        }
        $categoriesArr = Category::pluck('name','id');
        $categories = $query->orderBy('id', 'asc')->paginate(20);
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];

        return view('backend.categories.index', compact('categories', 'statuses','categoriesArr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = Category::create([
            'order' => $request->input('order'),
            'name' => $request->input('name'),
            'display_on_homepage' => $request->input('display_on_homepage'),
            'no_of_elements_to_show' => $request->input('no_of_elements_to_show'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'homepage_order' => $request->input('homepage_order'),
            'display_order' => $request->input('display_order'),
            'meta_description' => $request->input('meta_description'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),

        ]);

        // Cover Image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $folder = 'images/categories/cover_image/' . $categories->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $categories->cover_image = $image->getClientOriginalName();
        }

        // Thumbnail Image
        if ($request->hasFile('thumbnail_image')) {
            $image = $request->file('thumbnail_image');
            $folder = 'images/categories/thumbnail_image/' . $categories->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $categories->thumbnail_image = $image->getClientOriginalName();
        }
        $categories->save();

        return redirect()->route('category.index')->with('success', 'Category saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Category::findOrFail($id);
        $categories->update([
            'order' => $request->input('order'),
            'name' => $request->input('name'),
            'display_on_homepage' => $request->input('display_on_homepage'),
            'no_of_elements_to_show' => $request->input('no_of_elements_to_show'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'homepage_order' => $request->input('homepage_order'),
            'display_order' => $request->input('display_order'),
            'meta_description' => $request->input('meta_description'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
        ]);

        // Cover Image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $folder = 'images/categories/cover_image/' . $categories->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $categories->cover_image = $image->getClientOriginalName();
        }

        // Thumbnail Image
        if ($request->hasFile('thumbnail_image')) {
            $image = $request->file('thumbnail_image');
            $folder = 'images/categories/thumbnail_image/' . $categories->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $categories->thumbnail_image = $image->getClientOriginalName();
        }
        $categories->save();

        return redirect()->route('category.index')->with('success', 'Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function categoriesAPI()
    {
        $categories = Category::where('active', true)->get();

        dd($categories);

        $categoryArr = [];

        if ($categories->isNotEmpty()) {
            foreach ($categories as $category) {
                $id = $category->id;

                $coverImage = $category->cover_image;
                $thumbImage = $category->thumbnail_image;

                $coverImagePath = $coverImage
                    ? secure_asset("public/images/categories/cover_image/{$id}/{$coverImage}")
                    : secure_asset("public/images/no-image.png");

                $thumbImagePath = $thumbImage
                    ? secure_asset("public/images/categories/thumbnail_image/{$id}/{$thumbImage}")
                    : secure_asset("public/images/no-image.png");

                $categoryArr[] = [
                    'id' => $id,
                    'name' => $category->name,
                    'cover_image' => $coverImagePath,
                    'thumbnail_image' => $thumbImagePath,
                    'page_title' => $category->page_title,
                    'page_slug' => $category->page_slug,
                    'page_url' => $category->page_url,
                    'meta_description' => $category->meta_description,
                    'description' => $category->description,
                    'display_on_homepage' => (bool) $category->display_on_homepage,
                    'order' => $category->order,
                    'display_order' => $category->display_order,
                    'active' => (bool) $category->active,
                ];
            }
        }
        return response()->json([
                'success' => true,
                'message' => 'Categories retrieved successfully.',
                'data' => $categoryArr
            ]);

        return response()->json([
            'success' => false,
            'message' => 'No categories found.',
            'data' => []
        ], 404);
    }

}

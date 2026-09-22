<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogAuthor;
use App\Models\BlogTag;
use App\Models\BlogBlogTag;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;



class BlogsController extends Controller
{
    public function getSeoData($url, $controller, $action, $params, $slug)
    {
        $baseController = new BaseController();
        return $baseController->getSeoData($url, $controller, $action, $params, $slug);
    }

    public function index(Request $request)
    {
        $blogQuery = Blog::with(['blogauthor']);
        $authors = BlogAuthor::all();

        if ($request->filled('blog_author_id')) {
            $blogQuery->where('blog_author_id', $request->blog_author_id);
        }

        if ($request->filled('blog_category_id')) {
            $blogQuery->where('blog_category_id', $request->blog_category_id);
        }

        if ($request->filled('title')) {
            $blogQuery->where('title', $request->title);
        }

        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $blogQuery->where('active', $status);
        }

        $blogCategories = BlogCategory::all();
        $blogs = $blogQuery->orderBy('created_at', 'desc')->paginate(20);
        $authors = BlogAuthor::all();
        $title = Blog::select('title')->get()->pluck('title')->toArray();
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];

        return view('backend.blogs.index', compact('blogs', 'authors', 'statuses', 'title', 'blogCategories'));
    }

    public function create()
    {
        $pageTitle = "Add";

        $blogCategories = BlogCategory::all()->where('active', true);

        $blogAuthors = BlogAuthor::all()->where('active', true);
        $blogAuthorList = $blogAuthors->pluck('author_name', 'id');

        $blogTags = BlogTag::all()->where('active', true);
        $blogTagList = $blogTags->pluck('name', 'id');

        return view('backend.blogs.create', compact('pageTitle', 'blogAuthorList','blogTags','blogTagList','blogCategories'));
    }

    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'blog_author_id' => ['required'],
        ]);



        $blog = Blog::create([
            'user_id' => Auth::id(),
            'blog_author_id' => $request->input('blog_author_id'),
            'blog_category_id' => $request->input('blog_category_id'),
            'blog_date' =>  $request->input('blog_date'),
            'title' => $request->input('title'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'page_url' => $request->input('page_url'),
            'description' => $request->input('description'),
            'video_link' => $request->input('video_link'),
            'its_video_link' => $request->input('its_video_link'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/blog/image_file/' . $blog->id;
            $image->move(public_path($folder), $image->getClientOriginalName());

            $blog->image_file = $image->getClientOriginalName();
        }
        $blog->save();

        foreach ($request->input('blogtags') as $blogtagsId) {
            $blogblogtags = BlogBlogTag::create([
                'blog_id' => $blog->id,
                'blog_tag_id' => $blogtagsId,
                'created' => now(),
                'modified' => now(),
            ]);
        }

        return redirect()->route('blogs.index')->with('success', 'Blogs saved successfully!');
    }


    public function show($id)
    {

        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found.');
        }
        $pageTitle = 'Blog List';
        $parentMenu = 'Blog';

        return view('backend.blogs.show', compact('blog', 'pageTitle', 'parentMenu'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $blogCategories = BlogCategory::all()->where('active', true);

        $blogAuthor = BlogAuthor::where('id', $blog->blog_author_id)->first();
        $blogAuthors = $blogAuthor ? BlogAuthor::where('id', '!=', $blogAuthor->id)->get() : BlogAuthor::all();

        $selectedBlogTags = $blog->blogtags;
        $blogtags = BlogTag::all();

        return view('backend.blogs.edit', compact('blogAuthor', 'blogAuthors','blog','selectedBlogTags','blogtags','blogCategories'));
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'blog not found.');
        }

        $blogAuthorId = $request->input('blog_author_id');
        $blogAuthor = BlogAuthor::find($blogAuthorId);

        if (!empty($blogAuthor)) {
            $blogAuthorId = $blogAuthor->id;
        }

        $blog->update([
            'user_id' => Auth::id(),
            'blog_author_id' => $blogAuthorId,
            'blog_category_id' => $request->input('blog_category_id'),
            'blog_date' =>  $request->input('blog_date'),
            'title' => $request->input('title'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keyword' => $request->input('meta_keyword'),
            'page_url' => $request->input('page_url'),
            'header_text' => $request->input('header_text'),
            'description' => $request->input('description'),
            'video_link' => $request->input('video_link'),
            'its_video_link' => $request->input('its_video_link'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/blog/image_file/' . $blog->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $blog->image_file = $image->getClientOriginalName();
        }

        $blog->save();
        $blog->blogtags()->sync($request->input('blogtags'));

        return redirect()->route('blogs.index')->with('success', 'Blogs updated successfully!');
    }

    /*Front-end Blog Detail Pages*/
    public function view($slug)
    {
        $blog = Blog::where('page_slug', $slug)
            ->where('active', true)
            ->with('blogauthor')
            ->first();

        if (!$blog) {
            return redirect()->route('blogs')->with('error', 'Blog not found.');
        }

        $id = $blog->id;

        // Blog image
        $firstImage = $blog->image_file;

        $imagePath = $firstImage ? secure_asset("public/images/blog/image_file/{$id}/{$firstImage}") : secure_asset("dist/images/no-image.png");

        // SEO
        $seoData = [
            'page_title' => $blog->page_title,
            'page_url' => $blog->page_url,
            'meta_keyword' => $blog->meta_keyword,
            'meta_description' => $blog->meta_description,
            'meta_image' => $imagePath,
        ];

        // Categories
        $blogcategory = BlogCategory::where('active', true)->orderBy('order', 'asc')->get();

        // Other blogs
        $otherBlogs = Blog::where('active', true)->where('id', '!=', $id)->orderBy('blog_date', 'desc')->get();

        // Recent blogs
        $relatedBlogs = Blog::where('active', true)->where('id', '!=', $id)->orderBy('blog_date', 'desc')->take(3)->get();

        // Current category
        $category = $blog->blogcategory;

        // Current blog tags
        $blogtags = $blog->blogtags()->get();

        return view('frontend.blog_detail', compact('blog','seoData','otherBlogs','relatedBlogs','blogcategory','category','blogtags'));
    }


    /*Front-end Blog Listing Page*/
    public function list(Request $request)
    {
        $blogQuery = Blog::where('active', true);
        if ($request->filled('search')) {
            $search = $request->search;
            $blogQuery->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $blogs = $blogQuery->orderBy('blog_date', 'desc')->paginate(9)->withQueryString();

        $blogtags = BlogTag::where('active', true)
            ->withCount([
                'blogs' => function ($query) {
                    $query->where('active', true);
                }
            ])->get();

        $blogcategory = BlogCategory::where('active', true)->orderBy('order', 'asc')->get();

        return view('frontend.blog_list', compact('blogs','blogtags','blogcategory'))->with('action', 'blogs.list');
    }

    /* Blog Tags Route */
    public function tagFilter($page_slug)
    {
        $selectedTag = BlogTag::where('page_slug', $page_slug)->where('active', true)->firstOrFail();
        $blogcategory = BlogCategory::where('active', true)->orderBy('order', 'asc')->get();
        $blogs = $selectedTag->blogs()->where('active', true)->orderBy('id', 'desc')->paginate(9);

        $blogtags = BlogTag::where('active', true)
        ->withCount(['blogs' => function ($query) {
            $query->where('active', true);
        }])
        ->orderBy('id', 'desc')
        ->get();

        $seoData = [
            'page_title' => $selectedTag->page_title,
            'page_url' => $selectedTag->page_url,
            'meta_keyword' => $selectedTag->meta_keyword,
            'meta_description' => $selectedTag->meta_description
        ];
        // dd($selectedTag);


        return view('frontend.blog_list', compact('blogs', 'blogtags', 'selectedTag', 'blogcategory','seoData'));
    }

    public function categoryFilter($page_slug)
    {
        $selectedCategory = BlogCategory::where('page_slug', $page_slug)
            ->where('active', true)
            ->firstOrFail();

        $blogcategory = BlogCategory::where('active', true)
            ->orderBy('order', 'asc')
            ->get();

        $blogs = $selectedCategory->blogs()
            ->where('active', true)
            ->orderBy('id', 'desc')
            ->paginate(9);

        $blogtags = BlogTag::where('active', true)
            ->withCount([
                'blogs' => function ($query) {
                    $query->where('active', true);
                }
            ])
            ->orderBy('id', 'desc')
            ->get();

        $seoData = [
            'page_title' => $selectedCategory->page_title,
            'page_url' => $selectedCategory->page_url,
            'meta_keyword' => $selectedCategory->meta_keyword,
            'meta_description' => $selectedCategory->meta_description
        ];

        return view('frontend.blog_list', compact(
            'blogs',
            'blogtags',
            'blogcategory',
            'selectedCategory',
            'seoData'
        ));
    }


    /* Search Filter in Blogs Page */
    public function search(Request $request)
    {
        $query = $request->input('search');

        $blogs = Blog::where('title', 'LIKE', "%{$query}%")->get();

        if ($blogs->isEmpty()) {
            return "<p style='padding: 10px;'>No results found</p>";
        }

        $html = "<ul>";
        foreach ($blogs as $blog) {
            $html .= "<li>
                    <a href='" . route('blog_detail', $blog->page_slug) . "'>
                        " . e($blog->title) . "
                    </a>
                  </li>";
        }
        $html .= "</ul>";

        return $html;
    }

    /* API for Umrah360 */
    // public function Blog(){
    //     $blog = Blog::where('active', true)->get();

    //     $blogArr = [];

    //     foreach ($blog as $key => $BLOG) {
    //     $id = $BLOG->id;
    //     $image = $BLOG->image_file;
    //     $imagePath = $image ? secure_asset("public/images/blog/image_file/" . $id . "/" . $image) : secure_asset('dist/images/no-image.png');

    //     $blogArr[$key] = [
    //         'id' => $id,
    //         'page_name' => $BLOG->page_name,
    //         'page_slug' => $BLOG->page_slug,
    //         'page_title' => $BLOG->page_title,
    //         'page_url' => $BLOG->page_url,
    //         'image_file' => $imagePath,
    //     ];
    // }

    //     if (!empty($blogArr)) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'BLOG found.',
    //             'data' => $blogArr,
    //     ], 200); // HTTP status code 200: OK
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data not found.',
    //         ], 404); // HTTP status code 404: Not Found
    //     }
    // }

}

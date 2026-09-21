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

        // if ($request->filled('blog_category_id')) {
        //     $blogQuery->where('blog_category_id', $request->blog_category_id);
        // }

        if ($request->filled('id')) {
            $blogQuery->where('id', $request->id);
        }

        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $blogQuery->where('active', $status);
        }

        $blogs = $blogQuery->orderBy('id', 'asc')->paginate(20);
        $authors = BlogAuthor::all();
        $titleArr = Blog::pluck('title','id')->toArray();
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];

        return view('backend.blogs.index', compact('blogs', 'authors', 'statuses', 'titleArr'));
    }

    public function create()
    {
        $blogAuthors = BlogAuthor::all()->where('active', true);
        $blogAuthorList = $blogAuthors->pluck('author_name', 'id');

        $blogTags = BlogTag::all()->where('active', true);
        $blogTagList = $blogTags->pluck('name', 'id');

        return view('backend.blogs.create', compact('blogAuthorList','blogTags','blogTagList'));
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

        $blog->blogtags()->sync($request->input('blogtags', []));

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

        $blogAuthor = BlogAuthor::where('id', $blog->blog_author_id)->first();
        $blogAuthors = $blogAuthor ? BlogAuthor::where('id', '!=', $blogAuthor->id)->get() : BlogAuthor::all();

        $selectedBlogTags = $blog->blogtags;
        $blogtags = BlogTag::all();

        return view('backend.blogs.edit', compact('blogAuthor', 'blogAuthors','blog','selectedBlogTags','blogtags'));
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
        $blog = Blog::where('page_slug', $slug)->first();
        if (!$blog) {
            return redirect()->route('blogs')->with('error', 'Blog not found.');
        }

        $firstImage = $blog->image_file;
        $id = $blog->id;
        $imagePath = $firstImage ? secure_asset("public/images/blog/image_file/{$id}/{$firstImage}") : secure_asset("dist/no-image.png");

        $seoData = [
            'page_title' => $blog->page_title,
            'page_url' => $blog->page_url,
            'meta_keyword' => $blog->meta_keyword,
            'meta_description' => $blog->meta_description,
            'meta_image' => $imagePath,
        ];

        $otherBlogs = Blog::where('active', true)
            ->where('id', '!=', $id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        $relatedBlogs = Blog::with('blogauthor')
            ->where('active', true)
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        // $category = $blog->blogcategory;
        $blogtags = $blog->blogtags;


        return view('frontend.blog_detail', compact('blog', 'seoData', 'otherBlogs','blogtags','relatedBlogs'));
    }


    /*Front-end Blog Listing Page*/
    public function list(){

        $blogs = Blog::where('active', true)
            ->orderBy('blog_date', 'desc')
            ->paginate(10);

        $currentIds = $blogs->pluck('id');

        $otherBlogs = Blog::where('active', true)
            ->whereNotIn('id', $currentIds)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        $blogtags = BlogTag::has('blogs')->get();

        $blogCategories = BlogCategory::where('active', true)
        ->orderBy('id', 'asc')
        ->get();

        return view('frontend.blog_list', compact('blogs','blogtags','otherBlogs','blogCategories'));
    }

    /* Blog Tags Route */
    public function tagFilter($page_slug)
    {
        $selectedTag = BlogTag::where('page_slug', $page_slug)->where('active', true)->firstOrFail();
        // $blogcategory = BlogCategory::where('active', true)->orderBy('order', 'asc')->get();
        $blogs = $selectedTag->blogs()->where('active', true)->orderBy('id', 'desc')->paginate(9);

        $blogtags = BlogTag::has('blogs')->orderBy('id', 'desc')->get();

        $otherBlogs = Blog::where('active', true)
        ->where('id', '!=', optional($blogs->first())->id)
        ->limit(5)
        ->get();

        $seoData = [
            'page_title' => $selectedTag->page_title,
            'page_url' => $selectedTag->page_url,
            'meta_keyword' => $selectedTag->meta_keyword,
            'meta_description' => $selectedTag->meta_description
        ];
        // dd($selectedTag);


        return view('frontend.blog_list', compact('blogs', 'blogtags', 'selectedTag','seoData','otherBlogs'));
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


}

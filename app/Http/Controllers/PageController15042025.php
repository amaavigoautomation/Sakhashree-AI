<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Video;


class PageController extends BaseController
{
    public function home(){
        $blogs = Blog::whereNotNull('title')
                ->where('active',true)
                ->whereNotNull('page_slug')
                ->take(2)
                ->inRandomOrder()
                ->get();

        $testimonials = Testimonial::where('active',true)->inRandomOrder()->get();

        return view('frontend.home', compact('blogs','testimonials'));
    }



    public function aboutme()
    {
        $videos = Video::where('active', true)->inRandomOrder()->limit(4)->get();

        return view('frontend.aboutme', compact('videos'));
    }

    public function blogs()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('frontend.blog_list', compact('blogs'));
    }

    public function contactus()
    {
        return view('frontend.contactus');
    }

    public function gallery()
    {
        $videos = Video::where('active', true)->get();

        $videoTestimonials = $videos->filter(function ($item) {
            return !empty($item->video_link);
        });

        $photos = $videos->filter(function ($item) {
            return empty($item->video_link) && !empty($item->image_file);
        });

        $testimonials = Testimonial::where('active', true)->get();

        return view('frontend.gallery', compact('videoTestimonials', 'photos', 'testimonials'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('active', true)->orderBy('id', 'asc')->get();

        return view('frontend.testimonials', compact('testimonials'));
    }

    public function comingsoon()
    {
        return view('frontend.comingsoon');
    }

    public function products()
    {
        return view('frontend.products');
    }

    public function thankyou()
    {
        return view('frontend.thankyou');
    }


}

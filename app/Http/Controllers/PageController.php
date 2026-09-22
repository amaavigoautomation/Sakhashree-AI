<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\Faq;
use App\Models\FaqType;
use App\Models\TestimonialVideo;
use App\Models\Country;
use App\Models\Event;
use App\Models\Subject;
use App\Models\Workshop;

class PageController extends BaseController
{
    public function home()
    {
        $blogs = Blog::whereNotNull('title')
            ->where('active', true)
            ->whereNotNull('page_slug')
            ->take(2)
            ->inRandomOrder()
            ->get();

        $testimonials = Testimonial::where('active', true)->inRandomOrder()->get();

        return view('frontend.home', compact('blogs', 'testimonials'));
    }

    public function aboutme()
    {
        $videos = Video::where('active', true)->inRandomOrder()->limit(4)->get();

        return view('frontend.aboutme', compact('videos'));
    }

    public function discover_rudra_center()
    {
        return view('frontend.discover_rudra_center');
    }

    public function discover_chakra_yog()
    {
        return view('frontend.discover_chakra_yog');
    }

    public function rrct()
    {
        return view('frontend.rrct');
    }

    public function spiritual_tours()
    {
        return view('frontend.spiritual_tours');
    }



    public function workshop()
    {
        $latestWorkshop = Workshop::where('active', true)
            ->where('is_latest', true)
            ->orderBy('id', 'desc')
            ->first();

        $pastWorkshops = Workshop::where('active', true)
            ->where('is_latest', false)
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.workshop', compact(
            'latestWorkshop',
            'pastWorkshops'
        ));
    }

    public function events()
    {
        $upcomingEvents = Event::where('active', 1)
            ->where('is_past_event', 0)
            ->orderBy('date', 'asc')
            ->get();

        $pastEvents = Event::where('active', 1)
            ->where('is_past_event', 1)
            ->orderBy('date', 'desc')
            ->paginate(6);

        return view('frontend.events', compact('upcomingEvents', 'pastEvents'));
    }

    public function videos_list()
    {
        $videos =  Video::where('active', true)->orderBy('id', 'asc')->get();
        return view('frontend.videos_list', compact('videos'));
    }



    public function faq_list()
    {
        $faqs = Faq::where('active', true)->get();
        $faqTypes = FaqType::where('active', true)->get();
        // dd($faqs);

        return view('frontend.faqs', compact('faqs', 'faqTypes'));
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

        $photos = Gallery::where('active', true)->get();

        // dd($photos);
        $testimonials = Testimonial::where('active', true)->get();

        return view('frontend.gallery', compact('videoTestimonials', 'photos', 'testimonials'));
    }

    public function contact()
    {
        $countries = Country::where('active', true)->get();
        $subjects = Subject::where('active', true)->get();

        return view('frontend.contact',compact('countries','subjects'));
    }

    public function consultations()
    {
        return view('frontend.consultations');
    }


    public function testimonials()
    {
        $testimonials = Testimonial::where('active', true)->orderBy('id', 'asc')->get();


        return view('frontend.testimonials', compact('testimonials'));
    }



    public function testimonials_video()
    {
        $videoTestimonials = TestimonialVideo::where('active', true)
            ->get();

        return view('frontend.testimonials_video', compact('videoTestimonials'));
    }

    public function comingsoon()
    {
        return view('frontend.comingsoon');
    }

    public function evisitingcard()
    {
        return view('frontend.evisitingcard');
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

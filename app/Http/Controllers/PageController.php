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
use App\Models\News;
use App\Models\Subject;
use App\Models\Workshop;
use App\Models\SpiritualTour;

class PageController extends BaseController
{
    public function home()
    {
        $blogs = Blog::whereNotNull('title')
            ->where('active', true)
            ->whereNotNull('page_slug')
            ->inRandomOrder()
            ->get();

        $testimonials = Testimonial::where('active', 1)
            ->where('display_on_homepage', 1)
            ->orderBy('id', 'desc')
            ->get();

        $testimonialVideos = TestimonialVideo::where('active', 1)
            ->limit(11)
            ->get();
        $workshops = Workshop::where('active', true)
            ->where('is_latest', true)
            ->orderBy('id', 'desc')
            ->get();

        $spiritualTours = SpiritualTour::where('is_upcoming', 1)
            ->where('active', 1)
            ->orderBy('id', 'asc')
            ->get();
        $videos = Video::where('active', true)->inRandomOrder()->limit(3)->get();

        $news = News::where('active', true)->orderBy('id', 'desc')->get();

        return view('frontend.home', compact('blogs', 'testimonials', 'videos', 'testimonialVideos', 'workshops', 'spiritualTours', 'news'));
    }

    public function aboutme()
    {
        $videos = Video::where('active', true)->inRandomOrder()->limit(4)->get();

        $photos = Gallery::where('active', true)->get();

        return view('frontend.aboutme', compact('videos', 'photos'));
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
        $upcomingTours = SpiritualTour::where('is_upcoming', 1)
            ->where('active', 1)
            ->orderBy('id', 'asc')
            ->get();

        $pastTours = SpiritualTour::where('is_upcoming', 0)
            ->where('active', 1)
            ->orderBy('id', 'asc')
            ->get();

        $countries = Country::where('active', 1)->get();

        return view('frontend.spiritual_tours', compact('upcomingTours', 'pastTours', 'countries'));
    }



    public function workshop()
    {
        $latestWorkshops = Workshop::where('active', true)
            ->where('is_latest', true)
            ->orderBy('id', 'desc')
            ->get();

        $pastWorkshops = Workshop::where('active', true)
            ->where('is_latest', false)
            ->orderBy('id', 'desc')
            ->get();

        $countries = Country::where('active', true)->get();

        return view('frontend.workshop', compact(
            'latestWorkshops',
            'pastWorkshops',
            'countries'
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
        $countries = Country::where('active', 1)->get();

        return view('frontend.events', compact('upcomingEvents', 'pastEvents', 'countries'));
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

    public function gallery()
    {
        $photos = Gallery::where('active', true)->get();

        return view('frontend.gallery', compact('photos'));
    }

    public function contact()
    {
        $countries = Country::where('active', true)->get();
        $subjects = Subject::where('active', true)->get();

        return view('frontend.contact', compact('countries', 'subjects'));
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
        $videoTestimonials = TestimonialVideo::where('active', true)->get();
 
        return view('frontend.testimonials_video', compact('videoTestimonials'));
    }

    public function news()
    {
        $news = News::where('active', true)->get();
        return view('frontend.news', compact('news'));
    }

    // news detail page method
    public function view($page_slug)
    {
        $news = News::where('page_slug', $page_slug)->where('active', true)->firstOrFail();

        $seoData = [
            'page_title' => $news->page_title,
            'meta_description' => $news->meta_description,
        ];

        return view('frontend.news_detail', compact('news', 'seoData'));
    }

    public function comingsoon()
    {
        return view('frontend.comingsoon');
    }

    public function thankyou()
    {
        return view('frontend.thankyou');
    }
}

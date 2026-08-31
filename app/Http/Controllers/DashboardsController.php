<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Attraction;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\City;
use App\Models\Consultant;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Http\Request;

class DashboardsController extends BaseController
{
    public function index()
    {
        $data = [
            'Blog' => Blog::where('active', 1)->count(),
            'BlogTag' => BlogTag::where('active', 1)->count(),
            'Video' => Video::where('active', 1)->count(),
            'Testimonial' => Testimonial::where('active', 1)->count(),
            'Consultation' => Consultant::all()->count(),
        ];

        return view('backend.dashboards.index', $data);
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminTypesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\BlogAuthorsController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogTagsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsultantController;
use App\Http\Middleware\CheckSession;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReorderController;
use App\Http\Controllers\MenuLinkController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RolesRightsController;
use App\Http\Controllers\SeoModulesController;
use App\Http\Controllers\SocialMediasController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideoCategoriesController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideoTagController;
use App\Http\Controllers\EventController;
use App\Models\Blog;
use App\Models\SeoModule;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqTypeController;
use App\Http\Controllers\TestimonialVideoController;
use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\SpiritualTourController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\WorkshopEnquiryController;
use App\Http\Controllers\TestimonialReviewController;
use App\Http\Controllers\EventEnquiryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SpiritualTourEnquiryController;
// Public Authentication Routes
Route::get('/admin', fn() => view('backend.auth.login'));
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Frontend Routes
Route::get('/', [PageController::class, 'home'])->name('home');
// Route::get('/', [PageController::class, 'comingSoon']);
Route::get('/about-me', [PageController::class, 'aboutme'])->name('about');
Route::get('/discover_rudra_center', [PageController::class, 'discover_rudra_center'])->name('discover_rudra_center');
Route::get('/discover_chakra_yog', [PageController::class, 'discover_chakra_yog'])->name('discover_chakra_yog');
Route::get('/rrct', [PageController::class, 'rrct'])->name('rrct');
Route::get('/spiritual-tours', [PageController::class, 'spiritual_tours'])->name('spiritual_tours');
Route::get('/workshop', [PageController::class, 'workshop'])->name('workshop');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/contact-us', [PageController::class, 'contactus'])->name('contact');
Route::get('/faq', [PageController::class, 'faq_list'])->name('faq_list');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact_info', [EnquiryController::class, 'store'])->name('enquiries.store');
Route::get('/consultations', [PageController::class, 'consultations'])->name('consultations');
Route::get('/testimonials_list', [PageController::class, 'testimonials'])->name('testimonials_list');
Route::get('/testimonials_video_list', [PageController::class, 'testimonials_video'])->name('testimonials_video_list');
Route::get('/blog-tags/{page_slug}', [BlogsController::class, 'tagFilter'])->name('blog.tag');
Route::get('/blog_list', [BlogsController::class, 'list'])->name('blogs');
Route::get('/videos_list', [PageController::class, 'videos_list'])->name('videos_list');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/coming-soon', [PageController::class, 'comingsoon'])->name('comingsoon');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/blogcategories', [BlogCategoriesController::class, 'index'])->name('category');
Route::get('/blog-category/{page_slug}', [BlogsController::class,'categoryFilter'])->name('blog.category');

Route::post('/consultations', [ConsultantController::class, 'store'])->name('consultations.store');
Route::post('search-blogs', [BlogsController::class, 'search'])->name('search.blogs');
Route::post('workshop-enquiry',[WorkshopEnquiryController::class, 'store'])->name('workshop.enquiry.store');
Route::post('event-enquiry',[EventEnquiryController::class, 'store'])->name('event.enquiry.store');
Route::post('spiritual_tour-enquiry',[SpiritualTourEnquiryController::class, 'store'])->name('SpiritualTour.enquiry.store');
Route::post('testimonial-review',[TestimonialController::class, 'submitReview'])->name('testimonial.review.store');

// Route::get('/news_listing', [NewsController::class, 'news'])->name('news');


// Middleware Start -----------------------------------------
Route::middleware([CheckSession::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardsController::class, 'index'])->name('dashboards.index');

    // MenuLink AJAX & Management
    Route::prefix('menulink')->group(function () {
        Route::get('/index', [MenuLinkController::class, 'index'])->name('menulink.index');
        Route::get('/add', [MenuLinkController::class, 'add'])->name('menulink.add');
        Route::post('/store', [MenuLinkController::class, 'store'])->name('menulink.store');
        Route::get('/edit/{id}', [MenuLinkController::class, 'edit'])->name('menulink.edit');
        Route::post('/update/{id}', [MenuLinkController::class, 'update'])->name('menulink.update');
        Route::get('/view/{id}', [MenuLinkController::class, 'view'])->name('menulink.view');
    });

    // MenuLink Routes
    Route::get('/get-methods-for-controller', function (Request $request) {
        $controller = $request->input('controller');
        $methods = (new MenuLinkController)->getMethodsForController($controller);
        return response()->json(['methods' => $methods]);
    })->name('get.methods.for.controller');
    Route::get('/get-route-name', [MenuLinkController::class, 'getRouteName'])->name('get.route.name');

    // Common BaseController Routes
    Route::post('update-status', [BaseController::class, 'updateStatus']);
    Route::post('update-order', [BaseController::class, 'updateOrder']);
    Route::post('/posts/image_upload', [BaseController::class, 'imageUpload'])->name('image.upload');

    // Resource Controllers
    Route::resources([
        'admintypes'         => AdminTypesController::class,
        'blogauthors'        => BlogAuthorsController::class,
        'blogcomments'       => BlogCommentController::class,
        'blogcategories'       => BlogCategoriesController::class,
        'blogs'              => BlogsController::class,
        'blogtags'           => BlogTagsController::class,
        'category'           => CategoryController::class,
        'roles-rights'       => RolesRightsController::class,
        'seomodules'         => SeoModulesController::class,
        'socialmedias'       => SocialMediasController::class,
        'users'              => UsersController::class,
        'videos'             => VideosController::class,
        'videocategories'    => VideoCategoriesController::class,
        'videotag'           => VideoTagController::class,
        'testimonials'       => TestimonialController::class,
        'galleries'          => GalleryController::class,
        'faqs'               => FaqController::class,
        'faq_types'          => FaqTypeController::class,
        'testimonials_videos' => TestimonialVideoController::class,
        'event' => EventController::class,
        'workshops_listing' => WorkshopController::class,
        'spiritual_tours_listing' => SpiritualTourController::class,
        'workshop_enquiries' => WorkshopEnquiryController::class,
        'news_listing' => NewsController::class,

    ]);

    Route::get('/enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries/{id}', [EnquiryController::class, 'show'])->name('enquiries.show');

    // Change Password Routes
    Route::get('/changepassword', [UsersController::class, 'showChangePasswordForm'])->name('users.changepassword');
    Route::post('/changepassword', [UsersController::class, 'changePassword'])->name('users.update-password');
});
// Middleware End -------------------------------------------

// Sitemap Generation Route
// Route::get('/generate-sitemap', function () {
//     $sitemap = Sitemap::create();
//     $url = "https://gopinathan.ca/";

//     foreach (SeoModule::where('active', true)->get() as $seoModule) {
//         $sitemap->add(Url::create("{$url}/{$seoModule->page_slug}"));
//     }

//     foreach (Blog::where('active', true)->get() as $blog) {
//         $sitemap->add(Url::create("{$url}/{$blog->page_slug}"));
//     }

//     $sitemap->writeToFile(base_path('sitemap.xml'));
//     return redirect('/sitemap.xml');
// });

Route::get('/thank-you', function () {return view('frontend.thankyou');})->name('thankyou');

Route::post('/reorder', [ReorderController::class, 'reorder'])->name('universal.reorder');

Route::get('/clear-cache', function () {Artisan::call('optimize:clear');return "Cache cleared successfully";});

Route::get('/news/{page_slug}', [PageController::class, 'view'])->name('news_detail');
Route::get('/{page_slug}', [BlogsController::class, 'view'])->name('blog_detail');


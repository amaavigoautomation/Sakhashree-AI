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
use App\Models\Blog;
use App\Models\SeoModule;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Artisan;

// Public Authentication Routes
Route::get('/admin', fn() => view('backend.auth.login'));
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Frontend Routes
Route::get('/', [PageController::class, 'home'])->name('home');
// Route::get('/', [PageController::class, 'comingSoon']);
Route::get('/about-me', [PageController::class, 'aboutme'])->name('about');
Route::get('/contact-us', [PageController::class, 'contactus'])->name('contact');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/testimonials_list', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/blog-tags/{page_slug}', [BlogsController::class, 'tagFilter'])->name('blog.tag');
Route::get('/blog_list', [BlogsController::class, 'list'])->name('blogs');
Route::get('/coming-soon', [PageController::class, 'comingsoon'])->name('comingsoon');
Route::get('/products', [PageController::class, 'products'])->name('products');

Route::post('/consultations', [ConsultantController::class, 'store'])->name('consultations.store');
// Route::post('/evisitingcard', [PageController::class, 'evisitingcard'])->name('evisitingcard');
Route::get('/evisitingcard', [PageController::class, 'evisitingcard'])->name('evisitingcard');


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
    ]);

    Route::prefix('admin')->middleware([CheckSession::class])->group(function () {

        Route::get('/consultations', [ConsultantController::class, 'index'])
            ->name('consultations.index');

        Route::get('/consultations/{id}', [ConsultantController::class, 'show'])
            ->name('consultations.show');

    });

    // Change Password Routes
    Route::get('/changepassword', [UsersController::class, 'showChangePasswordForm'])->name('users.changepassword');
    Route::post('/changepassword', [UsersController::class, 'changePassword'])->name('users.update-password');

});
// Middleware End -------------------------------------------

// Sitemap Generation Route
Route::get('/generate-sitemap', function () {
    $sitemap = Sitemap::create();
    $url = "https://gopinathan.ca/";

    foreach (SeoModule::where('active', true)->get() as $seoModule) {
        $sitemap->add(Url::create("{$url}/{$seoModule->page_slug}"));
    }

    foreach (Blog::where('active', true)->get() as $blog) {
        $sitemap->add(Url::create("{$url}/{$blog->page_slug}"));
    }

    $sitemap->writeToFile(base_path('sitemap.xml'));
    return redirect('/sitemap.xml');
});

Route::get('/thank-you', function () {
    return view('frontend.thankyou');
})->name('thankyou');
// Reorder
Route::post('/reorder', [ReorderController::class, 'reorder'])->name('universal.reorder');
Route::post('search-blogs', [BlogsController::class, 'search']);
Route::get('/gopinathan.vcf', function () {
    return response()->download(public_path('gopinathan.vcf'));
});
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return "Cache cleared successfully";
});

Route::get('/{page_slug}', [BlogsController::class, 'view'])->name('blog_detail');

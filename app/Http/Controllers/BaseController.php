<?php

namespace App\Http\Controllers;

use App\Models\SeoModule;
use App\Models\Blog;
use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\MenuLink;
use App\Models\Gallery;
use App\Models\TestimonialVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;


class BaseController extends Controller
{
    public function __construct()
    {
        $currentRoute = Route::current();
        $action = (isset($currentRoute->action['as'])) ? $currentRoute->action['as'] : '';

        $parameteresNames = (!empty($currentRoute->parameterNames)) ? $currentRoute->parameterNames['0'] : '';

        $firstKey = '';
        if (!empty($parameteresNames) && isset($currentRoute->parameters[$parameteresNames])) {
            $parameteres = $currentRoute->parameters[$parameteresNames];
        } else {
            $parameteres = '';
        }

        if (empty($parameteres)) {
            $queryParams = request()->query();

            if (!empty($queryParams)) {
                $firstKey = array_key_first($queryParams);
                $parameteres = $queryParams[$firstKey];
            }
        }

        /*Current Page Name*/
        $currentRouteDetails = Route::currentRouteName();
        $currentRouteDetailexplod = explode('.', $currentRouteDetails);
        $currentPage = end($currentRouteDetailexplod);
        $PageUrl = reset($currentRouteDetailexplod);

        $currentControllerAction = Route::currentRouteAction();
        $controllerName = class_basename(explode('@', $currentControllerAction)[0]);

        $modelName = Str::replaceLast('Controller', '', $controllerName);
        $modelName = Str::singular($modelName);

        $modelClass = 'App\\Models\\' . $modelName;

        $tableName = '';
        if (class_exists($modelClass)) {
            $modelInstance = new $modelClass;
            $tableName = $modelInstance->getTable();
        } else {

            $tableName = ($modelName == 'Dashboard') ? $modelName : 'Model not found';
        }

        if (strpos($tableName, '_') !== false) {
            $tableName = str_replace('_', ' ', $tableName);
            $tableName = ucwords($tableName);
        }

        $PageTitle = $tableName;

        // $menuLinks = MenuLink::where('active',1)->get();

        /* Get SEO Data */
        $seoData = $this->getSeoData($controllerName, $action);


        $photos = Gallery::where('active', true)->get();

        $videoTestimonials = TestimonialVideo::where('active', true)->get();

        // dd($seoData);

        view()->share(['action' => $action, 'parameteres' => $parameteres, 'PageUrl' => $PageUrl, 'currentPage' => $currentPage, 'PageTitle' => $PageTitle, 'parameteresNames' => $parameteresNames, 'firstKey' => $firstKey, 'seoData' => $seoData, 'photos' => $photos, 'videoTestimonials' => $videoTestimonials]);
    }

    protected function getSeoData($controllerName, $action)
    {

        // dd($controllerName,$action);

        $seoModule = SeoModule::where('action', $action)
            ->where('controller', $controllerName)
            ->first();

        // dd($seoModule);

        if (!empty($seoModule)) {
            $firstImage = (!empty($seoModule->meta_image)) ? $seoModule->meta_image : '';
            $id = (!empty($seoModule->id)) ? $seoModule->id : '';
            // dd($id);
            $imagePath = $firstImage ? secure_asset("public/images/seomodules/meta_image/{$id}/{$firstImage}") :  secure_asset("dist/img/open-graph-image2.jpg");

            $seoModule->meta_image =  $imagePath;
        }

        return $seoModule;
    }


    // Update Status Methos
    public function updateStatus(Request $request)
    {
        $model = $request->input('model');
        $id = $request->input('id');
        $active = $request->input('active');

        $modelClass = 'App\\Models\\' . $model;

        if (class_exists($modelClass)) {
            $record = $modelClass::findOrFail($id);
            $record->active = $active;
            $record->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Model not found']);
    }


    // Update Order Method
    public function updateOrder(Request $request)
    {
        $model = $request->input('model');
        $id = $request->input('id');
        $order = $request->input('order');

        $modelClass = 'App\\Models\\' . $model;

        if (class_exists($modelClass)) {
            $record = $modelClass::findOrFail($id);
            $record->order = $order;
            $record->save();
            return response()->json(['success' => true]);
        }
        // dd($modelClass);
        return response()->json(['success' => false, 'message' => 'Model not found']);
    }

    // Text-editor Image Upload
    public function imageUpload(Request $request)
    {
        // Validate the image
        $request->validate([
            'userfile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the uploaded image
        if ($request->hasFile('userfile')) {
            $image = $request->file('userfile');
            $folder = 'images/tinymce_uploads';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = public_path($folder . '/' . $imageName);
            $image->move(public_path($folder), $imageName);

            // Image URL
            $imageUrl = asset('public/' . $folder . '/' . $imageName);

            // Generate HTML response (similar to CakePHP2)
            return response()->make("
                <script language='javascript' type='text/javascript'>
                    window.parent.window.jbImagesDialog.uploadFinish({
                        filename: '{$imageUrl}',
                        result: 'file_uploaded',
                        resultCode: 'ok'
                    });
                </script>
                <p>Result: file_uploaded</p>
            ")->header('Content-Type', 'text/html');
        }

        // If upload fails
        return response()->make("
            <script language='javascript' type='text/javascript'>
                window.parent.window.jbImagesDialog.uploadFinish({
                    filename: '',
                    result: 'error',
                    resultCode: 'failed'
                });
            </script>
            <p>Result: error</p>
        ")->header('Content-Type', 'text/html');
    }


    // SitemapUrls
    // public function siteMapUrls()
    // {
    //     $seoArr = $blogArr = $blogCategoryArr = $blogTagArr = $blogAuthorArr =  [];

    //     // Seo Module
    //     $seoModuleUrls = SeoModule::where('active', true)->get();
    //     foreach ($seoModuleUrls as $key => $seoModuleUrl) {
    //         $seoArr[$key] = [
    //             'page_url' => $seoModuleUrl->page_url,
    //         ];
    //     }

    //     // Blogs Module
    //     $blogUrls = Blog::where('active', true)->get();
    //     foreach ($blogUrls as $key => $blogUrl) {
    //         $blogArr[$key] = [
    //             'page_url' => $blogUrl->page_url,
    //         ];
    //     }

    //     // Blog Category
    //     $blogCategory = BlogCategory::where('active', true)->get();
    //     foreach ($blogCategory as $key => $blogCat) {
    //         $blogCategoryArr[$key] = [
    //             'page_url' => $blogCat->page_url,
    //         ];
    //     }

    //     // Blog Tag
    //     $blogTag = BlogTag::where('active', true)->get();
    //     foreach ($blogTag as $key => $blogTags) {
    //         $blogTagArr[$key] = [
    //             'page_url' => $blogTags->page_url,
    //         ];
    //     }

    //     // Blog Author
    //     $blogAuthor = BlogAuthor::where('active', true)->get();
    //     foreach ($blogAuthor as $key => $blogAuth) {
    //         $blogAuthorArr[$key] = [
    //             'page_url' => $blogAuth->page_url,
    //         ];
    //     }


    //     $siteMapUrls = array_merge($seoArr, $blogArr,$blogCategoryArr,$blogTagArr,$blogAuthorArr);

    //     // dd($siteMapUrls);
    // }
}

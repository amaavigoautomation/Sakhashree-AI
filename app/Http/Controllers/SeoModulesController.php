<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoModule;

class SeoModulesController extends BaseController
{
    public function index(Request $request)
    {
        $pageNames = SeoModule::distinct()->pluck('page_name');
        $pageTitles = SeoModule::distinct()->pluck('page_title');
        $query = SeoModule::query();

        if ($request->filled('page_name')) {
            $query->where('page_name', $request->page_name);
        }

        if ($request->filled('page_title')) {
            $query->where('page_title', $request->page_title);
        }

        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $query->where('active', $status);
        }

        $seomodules = $query->orderBy('active','desc')->paginate(20);
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
        return view('backend.seomodules.index', compact('seomodules', 'statuses','pageNames','pageTitles'));
    }

    public function create()
    {
        $pageTitle = 'Add';
        $parentMenu = 'Super Master';
        $controllers = $this->getControllers();
        return view('backend.seomodules.create', compact('pageTitle', 'parentMenu', 'controllers'));
    }

    public function store(Request $request)
    {

        // dd($request);

        $seoModule = SeoModule::create([
            'page_name' => $request->input('page_name'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'page_slug' => $request->input('page_slug'),
            'controller' => $request->input('controller'),
            'action' => $request->input('action'),
            'link' => $request->input('link'),
            'active' => $request->input('active'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' => $request->input('meta_description'),
        ]);

        if ($request->hasFile('meta_image')) {
            $image = $request->file('meta_image');
            $folder = 'images/seomodules/meta_image/' . $seoModule->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $seoModule->meta_image = $image->getClientOriginalName();
        }

        if($seoModule->save()){
            return redirect()->route('seomodules.index')->with('success', 'Seomodule saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to save Data.');
        }

    }

    public function show($id)
    {
        $seomodule = SeoModule::find($id);

        if (!$seomodule) {
            return redirect()->route('seomodules.index')->with('error', 'Seo not found.');
        }
        $pageTitle = 'Seo Modules';
        $parentMenu = 'Super Master';

        return view('backend.seomodules.show', compact('seomodule', 'pageTitle', 'parentMenu'));
    }

    public function edit($id)
    {
        $seomodule = SeoModule::findOrFail($id);
        $parentMenu = 'Super Master';
        $controllers = $this->getControllers();
        $menulinks = SeoModule::find($id);
        $pageTitle = "Edit";

        return view('backend.seomodules.edit', compact('parentMenu', 'pageTitle', 'seomodule', 'menulinks', 'controllers'));
    }

    public function update(Request $request, $id)
    {
        $seomodule = SeoModule::find($id);
        $seomodule->update($request->all());


        if ($request->hasFile('meta_image')) {
            $image = $request->file('meta_image');
            $folder = 'images/seomodules/meta_image/' . $seomodule->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $seomodule->meta_image = $image->getClientOriginalName();
        }

        if($seomodule->save()){
            return redirect()->route('seomodules.index')->with('success', 'Seomodule saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to save Data.');
        }
    }

    public function destroy($id)
    {
        //
    }

    public function getControllers()
    {
        $controllerPath = app_path('Http/Controllers');
        $controllers = [];
        foreach (glob("$controllerPath/*.php") as $file) {
            $controllers[] = str_replace('.php', '', basename($file));
        }

        return $controllers;
    }


    /*For Setup API*/
    // public function getSeoBySlug($slug){
    //     $seomodule = SeoModule::where('page_slug',$slug)->first();

    //     $seoData = [];
    //     if(!empty($seomodule)){
    //         $id = $seomodule->id;
    //         $metaImage = $seomodule->meta_image;
    //         $imagePath = $metaImage ? secure_asset("public/images/seomodules/meta_image/".$id."/".$metaImage) : secure_asset('dist/images/no-image.png');

    //         $seomodule->meta_image = $imagePath;

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'SEO Data Found',
    //             'data' => [$seomodule]
    //         ],202);

    //     }else{
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'SEO Data Not Found'
    //         ], 404);
    //     }


    // }

//     public function Seo(){
//         $seo = SeoModule::where('active', true)->get();

//         $seoArr = [];

//         foreach ($seo as $key => $SEO) {
//         $id = $SEO->id;
//         $image = $SEO->meta_image;
//         $imagePath = $image ? secure_asset("public/images/seomodules/meta_image/" . $id . "/" . $image) : secure_asset('dist/images/no-image.png');

//         $seoArr[$key] = [
//             'id' => $id,
//             'page_name' => $SEO->page_name,
//             'page_slug' => $SEO->page_slug,
//             'page_title' => $SEO->page_title,
//             'page_url' => $SEO->page_url,
//             'link' => $SEO->link,
//             'controller' => $SEO->controller,
//             'action' => $SEO->action,
//             // 'meta_description' => $SEO->meta_description,
//             'meta_keyword' => $SEO->meta_keyword,
//             'meta_image' => $imagePath,
//             'active' => $SEO->active,
//         ];
//     }
//         if (!empty($seoArr)) {
//             return response()->json([
//                 'success' => true,
//                 'message' => 'SEO found.',
//                 'data' => $seoArr,
//             ], 200); // HTTP status code 200: OK
//         } else {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Data not found.',
//             ], 404); // HTTP status code 404: Not Found
//         }
//    }

    


}

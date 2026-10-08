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

    public function getControllers()
    {
        $controllerPath = app_path('Http/Controllers');
        $controllers = [];
        foreach (glob("$controllerPath/*.php") as $file) {
            $controllers[] = str_replace('.php', '', basename($file));
        }

        return $controllers;
    }

}

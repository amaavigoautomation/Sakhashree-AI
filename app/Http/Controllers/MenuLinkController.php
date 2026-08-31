<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\MenuLink;
use App\Models\MenuLinkUser;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use File;

class MenuLinkController extends BaseController
{

    public function getMenuLinks(){
        $allowedMenuLinkIds = null;
        $adminTypeId = (isset(Auth::user()->admin_type_id)) ? Auth::user()->admin_type_id : '';

        if(!empty($adminTypeId)){
          $userId = Auth::user()->id;
           if($adminTypeId == 2){
                $menuLinks = MenuLink::with([
                    'children' => function ($query) {
                        $query->where('active', true)->orderBy('order');
                    }])->whereNull('parent_id')->where('active', true)->orderBy('order')->get();
           }
           else{
            $allowedMenuLinkIds = MenuLinkUser::where('user_id', $userId)->pluck('menu_link_id')->toArray();

            $menuLinks = MenuLink::with([
                'children' => function ($query) use ($allowedMenuLinkIds) {
                    $query->where('active', true)->whereIn('id', $allowedMenuLinkIds)->orderBy('order');
                }
            ])->whereNull('parent_id')->where('active', true)->whereIn('id', $allowedMenuLinkIds)->orderBy('order')->get();
           }
           return $menuLinks;
        }
    }

    public function index(Request $request)
    {
        $query = Menulink::query();
        $selectedParentId = $selectedId = '';
        $parents = Menulink::select('parent_id', 'title')->distinct()->get();
        $titles = Menulink::select('title')->distinct()->get();


        if ($request->filled('parent_id')) {
            $selectedParentId = $request->query('parent_id');
            $query->where('parent_id', $selectedParentId);
        }

        if ($request->filled('id')) {
            $selectedId = $request->query('id');
            $query->where('id', $selectedId);
        }

        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $query->where('active', $status);
        }

        $menulinks = $query->orderBy('active', 'desc')->paginate(20);

        /* Get All Menu Links Data */
        $menulinkData = MenuLink::all();
        $parentlinkArr = $menuLinkTitleArr =  [];
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];

        foreach ($menulinkData as $key => $parentLink) {
            if (empty($parentLink->parent_id)) {
                $parentlinkArr[$parentLink->id] = $parentLink->title;
            }
            $menuLinkTitleArr[$parentLink->id] = $parentLink->title;
        }

        // dd($menuLinkTitleArr);


        return view('backend.menulinks.index', compact('menulinks', 'statuses', 'parents', 'titles', 'selectedParentId', 'selectedId', 'parentlinkArr', 'menuLinkTitleArr'));
    }




    public function add()
    {
        $parentMenuLinks = MenuLink::whereNull('parent_id')->with('children')->get();
        $controllers = $this->getControllers();

        $menulinkUsers = User::all()->where('active', true);

        return view('backend.menulinks.add', compact('parentMenuLinks', 'controllers', 'menulinkUsers'));
    }


    /*Store Method*/
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'order' => 'required|int',
        ]);

        $user = Auth::user(); // Get the currently authenticated user

        // Create a new MenuLink instance
        $menuLink = new MenuLink();
        $menuLink->order = $request->input('order');
        $menuLink->title = $request->input('title');
        $menuLink->link = $request->input('link');
        $menuLink->parent_id = $request->input('parent_id');
        $menuLink->active = $request->input('active');
        $menuLink->created_by = $user->id;;
        $menuLink->updated_by = $user->id;;


        $menuLink->save();

        if ($request->has('users')) {
            foreach ($request->input('users') as $userId) {
                MenuLinkUser::create([
                    'user_id' => $userId,
                    'menu_link_id' => $menuLink->id,
                ]);
            }
        }


        return redirect()->route('menulink.index')->with('success', 'Data saved successfully!');
        // dd($menuLink);

    }

    // Show edit form
    public function edit($id)
    {

        $user = Auth::user(); // Get the currently authenticated user

        /*Page Title*/
        $pageTitle = $this->model_name();
        /*Controllers*/
        $controllers = $this->getControllers();

        /*parent Menu Links*/
        $parentMenuLinks = MenuLink::whereNull('parent_id')->with('children')->get();

        $menulinks = MenuLink::find($id);
        $menulinkUsers = User::where('active', true)->get();
        $selectedmenulinkUsers = $menulinks->users->pluck('id')->toArray();
        // dd($menulinkUsers);

        return view('backend.menulinks.edit', compact('menulinks', 'controllers', 'pageTitle', 'parentMenuLinks', 'user', 'menulinkUsers', 'selectedmenulinkUsers'));
    }

    // Update item in the database
    public function update(Request $request, $id)
    {

        $menulink = MenuLink::find($id);
        $menulink->update($request->all());

        if ($request->has('user')) {
            MenuLinkUser::where('menu_link_id', $id)->delete();
            foreach ($request->input('user') as $menuLinkId) {
                MenuLinkUser::create([
                    'menu_link_id' => $id,
                    'user_id' => $menuLinkId,
                ]);
            }
        }


        $menulink->save();


        return redirect()->route('menulink.index')->with('success', 'menulink updated successfully');
    }


    /*FOr View Page*/
    public function view($id)
    {
        $pageTitle = $this->model_name();
        $menulink = MenuLink::find($id);

        return view('backend.menulinks.view', compact('menulink', 'pageTitle'));
    }

    public function model_name()
    {
        $modelName = 'MenuLink';

        return $modelName;
    }

    public function getControllers()
    {
        $controllerPath = app_path('Http/Controllers');
        // var_dump($controllerPath);exit;
        $controllers = [];
        foreach (glob("$controllerPath/*.php") as $file) {
            // $controllers[] = ['select Controller'];
            $controllers[] = str_replace('.php', '', basename($file));
        }

        // var_dump($controllers);exit;

        return $controllers;
    }

    public function getAllControllersAndMethods()
    {
        $controllers = [];

        // Get all routes registered in your application
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $controllerAction = $route->getAction('controller');
            var_dump($controllerAction);
            // Extract the controller class from the controller action
            if ($controllerAction) {
                $controller = explode('@', $controllerAction)[0];
                // Get the methods of the controller
                $methods = get_class_methods($controller);

                // Store controller name and its methods
                $controllers[$controller] = $methods;
            }
        }
        exit;

        return $controllers;
    }

    /*Get ll Controller*/
    public function getAllControllers()
    {
        $controllers = [];
        $controllerPath = app_path('Http/Controllers');

        $controllerFiles = File::files($controllerPath);

        foreach ($controllerFiles as $controllerFile) {
            $fileName = pathinfo($controllerFile, PATHINFO_FILENAME);
            $controllerClass = "App\\Http\\Controllers\\{$fileName}";

            if (class_exists($controllerClass)) {
                $controllers[] = $controllerClass;
            }
        }
        return $controllers;
    }

    public function getMethodsForController($controllerName)
    {

        $methods = get_class_methods("App\Http\Controllers\\$controllerName");
        return response()->json($methods);
    }



    public function getRouteName(Request $request)
    {
        $controller = $request->input('controller');
        $method = $request->input('method');
        $controllerPrefix = $this->getControllerPrefix($controller);
        // var_dump($method);exit;
        $routeName = $controllerPrefix . '.' . $method;

        return response()->json(['routeName' => $routeName, 'controller' => $controller, 'action' => $method]);
    }


    private function getControllerPrefix($controllerName)
    {
        // Remove the 'Controller' suffix and convert to snake_case
        $prefix = strtolower(str_replace('Controller', '', $controllerName));


        // You might have specific rules for certain controllers:
        if ($prefix === 'menu_link') {
            return 'menu_links'; // Customize prefixes as needed
        }

        // If no specific rule applies, return the modified controller name
        return $prefix;
    }
}

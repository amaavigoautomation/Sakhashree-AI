<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Blog;
use App\Models\City;
use App\Models\Country;

class StatesController extends Controller
{

    public function index(Request $request)
    {
        $statesQuery = State::where('country_id',101);
        $countries = Country::all()->where('active', true);
        $countryList = $countries->pluck('name', 'id');
        $stateDetail = State::all();
        $stateList = $statesQuery->pluck('name', 'id');
        $selectedCountryId = $selectedStateId = '';

        if (!empty($request->query('country_id'))) {
            $selectedCountryId = $request->query('country_id');
            $statesQuery->where('country_id', $selectedCountryId);
        }

        if (!empty($request->query('state_id'))) {
            $selectedStateId = $request->query('state_id');
            $statesQuery->where('id', $selectedStateId);
        }

        if ($request->filled('active')) {
            $status = $request->active === 'active' ? 1 : 0;
            $statesQuery->where('active', $status);
        }

        $states = $statesQuery->orderBy('active', 'desc')->paginate(20);
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];

        return view('backend.states.index', compact('states', 'countryList', 'selectedCountryId', 'stateList', 'statuses','selectedStateId'));
    }

    public function create()
    {

        $countries = Country::all()->where('active', true);

        return view('backend.states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => ['required']
        ]);

        $countryName = $request->input('country_id');

        $country = Country::where('name', $countryName)->first();
        if (!empty($country)) {
            $country_id = $country->id;
        }

        $state = State::create([
            'country_id' => $country_id,
            'name' => $request->input('name'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' => $request->input('meta_description'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/states/image_file/' . $state->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $state->image_file = $image->getClientOriginalName();
        }

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $folder = 'images/states/banner_image/' . $state->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $state->banner_image = $image->getClientOriginalName();
        }
        $state->save();

        return redirect()->route('states.index');
    }


    public function show($id)
    {
        $states = State::find($id);
        if (!$states) {
            return redirect()->route('states.index')->with('error', 'State not found.');
        }

        return view('backend.states.show', compact('states'));
    }

    public function edit($id)
    {
        $states = State::findOrFail($id);
        $countries = Country::all()->where('active', true);

        return view('backend.states.edit', compact( 'states', 'countries'));
    }


    public function update(Request $request, $id)
    {
        $state = State::find($id);
        if (!$state) {
            return redirect()->route('states.index')->with('error', 'State not found.');
        }

        $country_id = $state->country_id;
        $countryName = $request->input('country_id');
        $country = Country::where('id', $countryName)->first();
        if (!empty($country)) {
            $country_id = $country->id;
        }

        $state->update([
            'country_id' => $country_id,
            'name' => $request->input('name'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' => $request->input('meta_description'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/states/image_file/' . $state->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $state->image_file = $image->getClientOriginalName();
        }

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $folder = 'images/states/banner_image/' . $state->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $state->banner_image = $image->getClientOriginalName();
        }
        $state->save();

        return redirect()->route('states.index')->with('success', 'State updated successfully.');
    }



    public function destroy($id)
    {
        //
    }

    public function getStates($countryId)
    {

        $states = State::where('country_id', $countryId)->get();

        return response()->json($states);
    }

    public function stateList()
    {
        
        $blogCityId = Blog::pluck('city_id')->filter()->unique()->values();

        // dd($blogCityId);

        $stateIds = City::whereIn('id',$blogCityId)->pluck('state_id')->filter()->unique()->values();


        // dd($cityIds);

        $states = State::whereIn('id',$stateIds)->get();

        // dd($states);


        // $stateList = State::where('active', true)
        //                   ->where('country_id', 101)
        //                   ->with(['cities' => function ($query) {
        //                       $query->where('active', true)->select('id', 'state_id');
        //                   }, 'country:id,name']) // eager load country name
        //                   ->get();

        $stateArr = [];

        foreach ($states as $key => $state) {
            $id = $state->id;

            $image_file = $state->image_file;
            $imagePath = $image_file 
                ? secure_asset("public/images/states/image_file/{$id}/{$image_file}") 
                : secure_asset('dist/images/no-image.png');

            // Get only active city IDs for this state
            $cityIds = $state->cities->where('active',true)->pluck('id')->toArray();

            $stateArr[$key] = [
                'id'           => $id,
                'country_id'   => $state->country_id,
                'country_name' => $state->country->name ?? '',
                'name'         => $state->name,
                'page_slug'    => $state->page_slug,
                'description'  => $state->description,
                'image_file'   => $imagePath,
                'active'       => $state->active,
                'cities'       => $cityIds, // only active city IDs
            ];
        }

        if (!empty($stateArr)) {
            return response()->json([
                'success' => true,
                'message' => 'States found.',
                'data'    => $stateArr,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No data found.',
            ], 404);
        }
    }

    public function tagDetail($slug){
        $states = State::where('page_slug', $slug)->first();
        $stateArr = $cityArr = [];
        $id = $states->id ;
        $image_file = $states->image_file;
        $banner_image = $states->banner_image;

        $imagePath1 = $image_file ? secure_asset("public/images/states/image_file/".$id."/".$image_file) : secure_asset("public/images/no-image.png");
        $imagePath2 = $banner_image ? secure_asset("public/images/states/banner_image/".$id."/".$banner_image) : secure_asset("public/images/no-image.png");


        // Citi Details State Wise
        $cities = $states->cities->where('active',true);

        // dd($cities);
        if(!empty($cities)){
            foreach ($cities as $key => $city) {

                $cityId = $city->id;
                $imageFile = $city->image_file;
                $imagePathCity = $imageFile ? secure_asset("public/images/cities/image_file/".$cityId."/".$imageFile) : secure_asset("public/images/no-image.png");

                $cityArr[] = [
                    'id'=>$cityId,
                    'state_id'=>$city->state_id,
                    'page_slug'=>$city->page_slug,
                    'name'=>$city->name,
                    'description'=>$city->description,
                    'image_file'=>$imagePathCity,
                ];


            }
        }


        $stateArr = [
            'id'=>$id,
            'country_id'=>$states->country_id,
            'country_name'=>$states->country->name,
            'name'=>$states->name,
            'active'=>$states->active,
            'page_slug'=>$states->page_slug,
            'page_title'=>$states->page_title,
            'page_url'=>$states->page_url,
            'meta_description'=>$states->meta_description,
            'meta_keyword'=>$states->meta_keyword,
            'description'=>$states->description,
            'image_file'=>$imagePath1,
            'banner_image'=>$imagePath2,

        ];

        if(!empty($stateArr)){
            return response()->json([
                'success' => true,
                'message' => 'State found.',
                'data' => ['State'=>$stateArr,'City'=>$cityArr],
            ], 200); // HTTP status code 200: OK
        }else{
             return response()->json([
                'success' => false,
                'message' => 'Data not found.',
            ], 404); // HTTP status code 404: Not Found
        }

    }

}

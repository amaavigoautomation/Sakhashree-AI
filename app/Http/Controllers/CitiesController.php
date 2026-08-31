<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\FitProductDestination;
use App\Models\OurJourneyDestination;
use App\Models\OurJourney;
use App\Models\FitProduct;
use App\Models\State;
use App\Models\Blog;



class CitiesController extends Controller
{
    public function index(Request $request)
    {
        $cityQuery = City::with(['country', 'state'])->where('country_id', 101);

        $countries = Country::where('active', true)->get();
        $countryList = $countries->pluck('name', 'id');

        $states = State::where('country_id', 101)->get();
        $stateList = $states->pluck('name', 'id');

        $cityList = City::where('country_id', 101)->orderBy('name')->get(['id', 'name']);

        $cityStatus = ['Active' => 'true', 'Inactive' => 'false'];

        $statusValue = $selectedCountryId = $selectedStateId = $selectedCityId = $selectedCityName = '';

        if (!empty($request->query('active'))) {
            $statusValue = $request->query('active');
            $cityQuery->where('active', $statusValue === 'true');
        }

        if (!empty($request->query('country_id'))) {
            $selectedCountryId = $request->query('country_id');
            $cityQuery->where('country_id', $selectedCountryId);
        }

        if (!empty($request->query('state_id'))) {
            $selectedStateId = $request->query('state_id');
            $cityQuery->where('state_id', $selectedStateId);
        }

        if (!empty($request->query('city_id'))) {
            $selectedCityId = $request->query('city_id');
            $cityQuery->where('id', $selectedCityId);

            $city = City::find($selectedCityId);
            if ($city) {
                $selectedCityName = $city->name;
            }
        }

        $cities = $cityQuery->orderBy('active', 'desc')->paginate(20);

        return view('backend.cities.index', compact('countryList','stateList','cityList','selectedCityId','selectedCityName','selectedCountryId','selectedStateId','statusValue','cityStatus','cities'));
    }



    // city search filter
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $cities = City::where('name', 'LIKE', "%{$searchTerm}%")->where('country_id', 101)->limit(10)->get();

        $html = '<ul>';
        foreach ($cities as $city) {
            $html .= '<li data-id="' . $city->id . '"><a href="#">' . $city->name . '</a></li>';
        }
        $html .= '</ul>';

        return $html;
    }


    public function create()
    {
        $city = City::all()->where('active', true);
        $countries = Country::all()->where('active', true);
        $states = State::all()->where('active', true);
        return view('backend.cities.create', compact( 'city', 'countries', 'states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => ['required'],
            'state_id' => ['required'],
        ]);

        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');

        $country = Country::find($countryId);
        $state = State::find($stateId);

        if (!empty($country)) {
            $country_id = $country->id;
        }
        if (!empty($state)) {
            $state_id = $state->id;
        }

        $city = City::create([
            'country_id' => $country_id,
            'state_id' => $state_id,
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
            $folder = 'images/cities/image_file/' . $city->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $city->image_file = $image->getClientOriginalName();
        }
        $city->save();

        // return redirect()->route('cities.index');
        return redirect()->route('cities.index')->with('success', 'City saved successfully!');
    }

    public function show($id)
    {
        $city = City::find($id);

        if (!$city) {
            return redirect()->route('city.index')->with('error', 'State not found.');
        }

        return view('backend.cities.show', compact('city'));
    }


    public function edit($id)
    {
        $city = City::findOrFail($id);
        $countries = Country::where('active', true)->get();
        $states = State::where('active', true)->get();

        return view('backend.cities.edit', compact('city', 'countries', 'states'));
    }


    public function update(Request $request, $id)
    {
        $city = City::find($id);

        if (!$city) {
            return redirect()->route('cities.index')->with('error', 'State not found.');
        }

        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');


        $country = Country::find($countryId);
        $state = State::find($stateId);


        if (!empty($country)) {
            $country_id = $country->id;
        }
        if (!empty($state)) {
            $state_id = $state->id;
        }


        $city->update([
            'country_id' => $country_id,
            'state_id' => $state_id,
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
            $folder = 'images/cities/image_file/' . $city->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $city->image_file = $image->getClientOriginalName();
        }
        $city->save();

        return redirect()->route('cities.index')->with('success', 'City saved successfully!');
    }

    public function destroy($id)
    {
        //
    }

    public function getCities($stateId)
    {

        $cities = City::where('state_id', $stateId)->get();

        return response()->json($cities);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CountryDetail;
use Illuminate\Support\Facades\DB;

class CountriesController extends Controller
{
    public function index(Request $request)
    {


        $countriesQuery = Country::with('countryDetails');
        /*Country List*/
        $countryDetails = Country::all();

        /*Country List*/
        $countryList = $countryDetails->pluck('name', 'id');

        /*Country Status*/
        $countryStatus = ['Active' => 'true', 'Inactive' => 'false'];

        $statusValue = $activeConditions = $selectedCountryId = '';
        if (!empty($request->query('active'))) {
            $statusValue = $request->query('active');
            if ($statusValue == 'true') {
                $countriesQuery->where('active', true);
            } else {
                $countriesQuery->where('active', false);
            }
        }

        if (!empty($request->query('country_id'))) {
            $selectedCountryId = $request->query('country_id');
            $countriesQuery->where('id', $selectedCountryId);
        }
        $countries = $countriesQuery->orderBy('active','desc')->paginate(30);

        return view('backend.countries.index', compact('countries', 'countryList', 'countryStatus', 'statusValue', 'selectedCountryId'));
    }

    public function add()
    {
        $parentMenu = 'Segment & Currency Setup';
        $pageTitle = "Add";

        return view('backend.countries.add', compact('parentMenu', 'pageTitle'));
    }

    public function store(Request $request)
    {

        $country = Country::create([
            'name' => $request->input('name'),
            'alpha_2_code' => $request->input('alpha_2_code'),
            'alpha_3_code' => $request->input('alpha_3_code'),
            'calling_code' => $request->input('calling_code'),
            'active' => $request->input('active'),
        ]);

        $countryDetail = CountryDetail::create([
            'country_id' => $country->id,
            'created_at'=>now(),
            'updated_at'=>now(),

        ]);

        // Handle image uploads
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $folder = '/images/country_details/cover_image/' . $countryDetail->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $countryDetail->cover_image = $image->getClientOriginalName();
        }

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $folder = '/images/country_details/icon_image/' . $countryDetail->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $countryDetail->icon_image = $image->getClientOriginalName();
            //dd($countryDetail->icon_image);
        }
        $countryDetail->save();

        return redirect()->route('countries.index');
    }

    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        $countryDetails = CountryDetail::where('country_id', $countries->id)->firstOrFail();
        $parentMenu = 'Segment & Currency Setup';
        $pageTitle = "Edit";

        return view('backend.countries.edit', compact('parentMenu', 'pageTitle', 'countries', 'countryDetails'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);

        if (!$country) {
            return redirect()->route('countries.index')->with('error', 'Country not found.');
        }

        $country->update([
            'name' => $request->input('name'),
            'alpha_2_code' => $request->input('alpha_2_code'),
            'alpha_3_code' => $request->input('alpha_3_code'),
            'calling_code' => $request->input('calling_code'),
            'active' => $request->input('active'),

        ]);
        $countryDetail = CountryDetail::updateOrCreate(
            ['country_id' => $country->id],

        );


        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $folder = '/images/country_details/cover_image/' . $countryDetail->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $countryDetail->cover_image = $image->getClientOriginalName();
        }

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $folder = '/images/country_details/icon_image/' . $countryDetail->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $countryDetail->icon_image = $image->getClientOriginalName();
        }
        $countryDetail->save();

        return redirect()->route('countries.index')->with('success', 'Country updated successfully.');
    }


    public function show($id)
    {
        $country = Country::find($id);

        if (!$country) {
            return redirect()->route('countries.index')->with('error', 'Country not found.');
        }
        $countryDetail = $country->countryDetail;

        $pageTitle = 'Countries';
        $parentMenu = 'Segment & Currency Setup';
        return view('backend.countries.show', compact('country', 'countryDetail', 'pageTitle', 'parentMenu'));
    }
}

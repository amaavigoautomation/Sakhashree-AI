<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CountryDetail;
use App\Traits\FileValidationTrait;
use Illuminate\Support\Facades\DB;

class CountriesController extends Controller
{
   
    use FileValidationTrait;

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
        $countries = $countriesQuery->orderBy('active','desc')->paginate(20);

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

        $request->validate([
            'name' => 'required|string|max:255',
            'alpha_2_code' => 'required|string|size:2',
            'alpha_3_code' => 'required|string|size:3',
            'calling_code' => 'required|string|max:10',
            'active' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'cover_image.mimes' => 'Only JPG and PNG images are allowed for cover image.',
            'cover_image.image' => 'Please upload a valid cover image file.',
            'icon_image.mimes' => 'Only JPG and PNG images are allowed for icon image.',
            'icon_image.image' => 'Please upload a valid icon image file.',
        ]);

        $country = Country::create([
            'name' => $request->input('name'),
            'alpha_2_code' => $request->input('alpha_2_code'),
            'alpha_3_code' => $request->input('alpha_3_code'),
            'calling_code' => $request->input('calling_code'),
            'active' => $request->input('active'),
        ]);

        $countryDetail = CountryDetail::create([
            'country_id' => $country->id,
            'created' => now(),

        ]);

        // Handle image uploads
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            
            if (!$this->validateRealFileType($image)) {
                return back()->with('error', 'Invalid or unsafe icon image uploaded.');
            }

            $folder = '/images/country_details/cover_image/' . $countryDetail->id;
            $filename = time() . '.' . $image->extension();
            $image->move(public_path($folder), $filename);
            $countryDetail->cover_image = $filename;
        }

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');

            if (!$this->validateRealFileType($image)) {
                return back()->with('error', 'Invalid or unsafe icon image uploaded.');
            }
            
            $folder = '/images/country_details/icon_image/' . $countryDetail->id;
            // $image->move(public_path($folder), $image->getClientOriginalName());
            // $countryDetail->icon_image = $image->getClientOriginalName();
            
             $filename = time() . '.' . $image->extension();
             $image->move(public_path($folder), $filename);
             $countryDetail->icon_image = $filename;
        }
        
        $countryDetail->save();

        return redirect()
        ->route('countries.index')
        ->with('success', 'Country Added Successfully.');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'alpha_2_code' => 'required|string|size:2',
            'alpha_3_code' => 'required|string|size:3',
            'calling_code' => 'required|string|max:10',
            'active' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'cover_image.mimes' => 'Only JPG and PNG images are allowed for cover image.',
            'cover_image.image' => 'Please upload a valid cover image file.',
            'icon_image.mimes' => 'Only JPG and PNG images are allowed for icon image.',
            'icon_image.image' => 'Please upload a valid icon image file.',
        ]);

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
        

         $countryDetail = CountryDetail::where('country_id', $country->id)->first();

           if (!$countryDetail) {
                $countryDetail = new CountryDetail();
                $countryDetail->country_id = $country->id;
                $countryDetail->created = now();
            }

            $countryDetail->modified = now();


        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $folder = '/images/country_details/cover_image/' . $countryDetail->id;

            $filename = time() . '.' . $image->extension();
            $image->move(public_path($folder), $filename);
            $countryDetail->cover_image = $filename;


            // $image->move(public_path($folder), $image->getClientOriginalName());
            // $countryDetail->cover_image = $image->getClientOriginalName();
        }

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $folder = '/images/country_details/icon_image/' . $countryDetail->id;
            
            $filename = time() . '.' . $image->extension();
            $image->move(public_path($folder), $filename);
            $countryDetail->icon_image = $filename;

            // $image->move(public_path($folder), $image->getClientOriginalName());
            // $countryDetail->icon_image = $image->getClientOriginalName();
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

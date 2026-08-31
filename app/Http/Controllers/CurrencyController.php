<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{

    public function index(Request $request)
    {
        $currencyNames = Currency::select('name')->distinct()->pluck('name');
        $isoCodes = Currency::select('iso_code')->distinct()->pluck('iso_code');
        $countries = Country::all(); 
        $currencies = Currency::query();

        if (request('name')) {
            $currencies->where('name', request('name'));
        }

        if (request('country_id')) {
            $currencies->where('country_id', request('country_id'));
        }

        if (request('iso_code')) {
            $currencies->where('iso_code', request('iso_code'));
        }

        if (request('status')) {
            $status = request('status') === 'active' ? 1 : 0;
            $currencies->where('active', $status);
        }

        $currencies->orderBy('active', 'desc')->orderBy('name','asc');
        $currencies = $currencies->paginate(20);

        return view('backend.currencies.index', compact('currencies', 'countries', 'currencyNames', 'isoCodes'));
    }



    public function create()
    {
        $countries = Country::all();
        $countryNames = $countries->pluck('name', 'id');
        return view('backend.currencies.create', compact('countries', 'countryNames'));
    }




    public function store(Request $request)
    {
        Currency::create([
            'country_id' => $request->input('country_id'),
            'name' => $request->input('name'),
            'iso_code' => $request->input('iso_code'),
            'iso_code_num' => $request->input('iso_code_num'),
            'sign' => $request->input('sign'),
            'blank' => $request->input('blank'),
            'format' => $request->input('format'),
            'decimals' => $request->input('decimals'),
            'conversion_rate' => $request->input('conversion_rate'),
            'display_on_frontend' => $request->input('display_on_frontend'),
            'its_default_country' => $request->input('its_default_country'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('currency.index')->with('success', 'Currency added successfully.');
    }


    public function show($id)
    {
        $currencies = Currency::findOrFail($id);
        return view('backend.currencies.show', compact('currencies'));
    }


    public function edit($id)
    {
         $currencies = Currency::findOrFail($id);
        $countries = Country::all();
        return view('backend.currencies.edit', compact('countries','currencies'));
    }

    public function update(Request $request, $id)
    {
        $currencies = Currency::findOrFail($id);
        $currencies->update([
            'country_id' => $request->input('country_id'),
            'name' => $request->input('name'),
            'iso_code' => $request->input('iso_code'),
            'iso_code_num' => $request->input('iso_code_num'),
            'sign' => $request->input('sign'),
            'blank' => $request->input('blank'),
            'format' => $request->input('format'),
            'decimals' => $request->input('decimals'),
            'conversion_rate' => $request->input('conversion_rate'),
            'display_on_frontend' => $request->input('display_on_frontend'),
            'its_default_country' => $request->input('its_default_country'),
            'active' => $request->input('active'),
            'updated_at' => now(),
        ]);

        return redirect()->route('currency.index')->with('success', 'Currency Updated successfully.');
    }


    public function destroy($id)
    {
        //
    }



    /*Setup API*/
    public function currencies(){

        $currencyArr = [];

        $currencies = Currency::where('active',true)->get();

        // dd($currencies)ss

        if(!empty($currencies)){
            foreach ($currencies as $key => $currency) {
                
                $currencyArr [] = [
                    'id'=>$currency->id,
                    'name'=>$currency->name,
                    'iso_code'=>$currency->iso_code,
                    'iso_code_num'=>$currency->iso_code_num,
                    'sign'=>$currency->sign,
                    'country_id'=>$currency->country_id,
                    'country_name'=>$currency->Country->name,
                    'alpha_2_code'=>$currency->Country->alpha_2_code,
                ];


            }
        
        }


       return response()->json([
            'success' => true,
            'message' => 'Detail found.',
            'data' => $currencyArr
        ], 200); 



    }


}

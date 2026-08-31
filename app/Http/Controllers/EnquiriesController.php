<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Http;
use App\Models\Enquiry;
use App\Models\EnquiryUmrahProduct;
use Illuminate\Http\Request;

class EnquiriesController extends Controller
{

    public function index(Request $request)
    {
        $query = Enquiry::query()->with(['Country', 'products']);

        if ($request->filled('unique_code')) {
                $query->where('id', $request->unique_code);
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $enquiries = $query->orderBy('id', 'desc')->paginate(20);
        $allEnquiryCodes = Enquiry::select('id', 'unique_code')->get();
        $cities = Enquiry::select('city')->distinct()->get();
        $countries = Country::whereIn('id', Enquiry::distinct()->pluck('country_id'))->get();


        return view('backend.enquiries.index', compact('enquiries', 'countries','allEnquiryCodes','cities'));
    }

    public function store(Request $request){

        // dd($request);


        $currentDate = date('Y-m-d');

        // dd($currentDate);

        $enquiry = Enquiry::create([
            'country_id' => $request->input('country_id'),
            'calling_code' => $request->input('calling_code'),
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'team_size' => $request->input('team_size'),
            'company_name' => $request->input('company_name'),
            'company_url' => $request->input('company_url'),
            'branches' => ($request->input('branches') === 'on') ? 0 : 1, // Set to 0 if 'on', else 1
            'remark' => $request->input('remark'),
            'enquery_date' => date('Y-m-d'),
        ]);


        $products = $request->input('product');

        // dd($products);

        if ($products) {
            foreach ($products as $productId) {
                 $productsData = EnquiryUmrahProduct::create([
                    'enquiry_id' => $enquiry->id,
                    'umrah_product_id' => $productId,
                    'created' => now(),
                    'modified' => now(),
                ]);
            }
        }


        if ($enquiry) {
            // 2. Update unique code
            $uniqueCode = "Web/Um360/" . $enquiry->id;
            $enquiry->update(['unique_code' => $uniqueCode]);

            // 3. Send data to CakePHP
            $this->moveToeFEwa($enquiry);

            // 4. Send data to EtosCRM
            $this->moveToEtosCRM($enquiry);

        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }


        return redirect()->route('thankyou')->with('success', 'Thank You ! Our Team Contact You SHortly');

    }

    public function moveToeFEwa($enquiry){
        $efewaData = [];
        $serverName = request()->server('SERVER_NAME');

        switch ($serverName) {
            case 'localhost':
                $url = 'http://localhost/Projects/CakePHP/efewa/';
                break;

            case 'https://www.umrah360.in/':
                $url = 'http://www.efewa2.efewa.com';
                break;

            case 'https://umrah360.in/':
                $url = 'http://www.efewa2.efewa.com';
                break;

        }

        $sourceTypeId = 23;
        $alias = 'WEB-U360';
        $year=date('ny');

        /*Master User*/
		$masterUser = json_decode(file_get_contents($url."/users/masterUser/1"), true);
		$masterUserId = $masterUser['User']['id'];

        /*Last Added Enquiry Id*/
		$lastEnquiryId = json_decode(file_get_contents($url."/enquirySourceTypes/last_enquiry"), true);

        // dd($lastEnquiryId);
        /*Pre-enquiry No.*/
		$preEnquiryNo = $alias.'/'.$year.'/'.$lastEnquiryId;

        // Enquiry data
        $enquiryData = $enquiry ->toArray();

        // dd($enquiryData);

        $efewaData ['DelegateVisitorEnquiry'] = [
            'meeting_code'=>$lastEnquiryId,
            'alias'=>$alias,
            'enquiry_source_type_id'=>$sourceTypeId,
            'pre_enquiry_no'=>$preEnquiryNo,
            'lead_assigned_to_user_id'=>$masterUserId,
            'pre_enquiry_assigned_to_user_id'=>$masterUserId,
            'event_domain_id'=>1,
            'crm_meeting_status_id'=>10,
            'company_id'=>2,
        ];

        $efewaData ['DelegateVisitorEnquiryDetail'] = [
            'enquiry_source_type_id'=>$sourceTypeId,
            'user_id'=>$masterUserId,

        ];

        $efewaData ['VisitorDetail'][0] = [
            'country_id'=>$enquiryData['country_id'],
            'company_name'=>$enquiryData['company_name'],
            'company_url'=>$enquiryData['company_url'],
            'contact_name'=>$enquiryData['name'],
            'designation'=>$enquiryData['designation'],
            'contact_email'=>$enquiryData['email'],
            'mobile_no'=>$enquiryData['mobile'],
        ];


        $response = Http::post($url . '/receiveInquiry', $efewaData);

        // Optional: handle response
        if ($response->successful()) {
            // Handle success
            return  redirect()->back()->with('success', 'Enquiry submitted successfully');
        } else {
            // Handle failure
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }


    /*Moved To Etos CRM*/
    public function moveToEtosCRM($enquiry)
    {

        // dd($enquiry);
        $etosData = [];
        $serverName = request()->server('SERVER_NAME');

        switch ($serverName) {
            case 'localhost':
                $url = 'http://localhost/Projects/CakePHP/EtosDMS/EtosGloabalOld/';
                break;

            case 'www.umrah360.in':
                $url = 'https://www.etosglobal.com/';
                break;

            case 'umrah360.in':
                $url = 'https://www.etosglobal.com/';
                break;
        }

        // Enquiry data
        $enquiryData = $enquiry->toArray();

        $sourceTypeId = 12;
        $alias = 'WEB-U360';
        $year=date('my');

        /*Last Added Enquiry Id*/
		$lastEnquiryId = json_decode(file_get_contents($url."/last_enquiry"), true);
        $uniquecode = $alias.'/'.$year.'/'.$lastEnquiryId;
        /*Source Type*/
        $sourceTypes = json_decode(file_get_contents($url."/source_type_api/12"), true);
        // dd($sourceTypes);
        if(!empty($sourceTypes)){
            $sourceTypeId = $sourceTypes[0]['SourceType']['id'];
            $alias = $sourceTypes[0]['SourceType']['alias'];
            $uniquecode = $alias.'/'.$year.'/'.$lastEnquiryId;
        }

        // dd($uniquecode);

        $etosData['RequestDemo'] = [
            'name' => $enquiryData['name'],
            'designation' => $enquiryData['designation'],
            'email' => $enquiryData['email'],
            'country_code' => $enquiryData['calling_code'],
            'mobile' => $enquiryData['mobile'],
            'country_id' => $enquiryData['country_id'],
            'company_name' => $enquiryData['company_name'],
            'company_url' => $enquiryData['company_url'],
            'branches' => $enquiryData['branches'],
            'unique_code' => $uniquecode,
            'source_url'=> $serverName,
            'source_type_id' => $sourceTypeId,
        ];

        $etosData ['Product']['Product'][0] = 2;

        // dd($url);

        $response = Http::post($url . '/receiveInquiry', $etosData);

        // Optional: handle response
        if ($response->successful()) {
            // Handle success
            return  redirect()->back()->with('success', 'Enquiry submitted successfully');
        } else {
            // Handle failure
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);



        return view('backend.enquiries.show', compact('enquiry'));
    }


    public function destroy($id)
    {

    }

}

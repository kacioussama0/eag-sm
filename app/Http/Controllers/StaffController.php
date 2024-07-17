<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\SubService;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicesArr = Service::all()->toArray();
        $subservicesArr = SubService::all()->toArray();
        $maritalStatusArr = Setting::where('type','etat civil')->get()->toArray();
        $functionsArr = Setting::where('type','fonction')->get()->toArray();
        $nationalitiesArr = Setting::where('type','nationnalite')->get()->toArray();
        $countriesArr = Setting::where('type','pays')->get()->toArray();
        $currenciesArr = Setting::where('type','devise')->get()->toArray();
        $citiesArr = Setting::where('type','ville')->get()->toArray();

        $services = [];
        $subServices = [];
        $maritalStatus = [];
        $functions = [];
        $nationalities = [];
        $countries = [];
        $currencies = [];
        $cities = [];

        foreach ($maritalStatusArr as $status) {
            $maritalStatus[$status['name']] = $status['id'];
        }

        foreach ($servicesArr as $service) {
            $services[$service['name']] = $service['id'];
        }

        foreach ($subservicesArr as $subservice) {
            $subServices[$subservice['name']] = $subservice['id'];
        }

        foreach ($functionsArr as $func) {
            $functions[$func['name']] = $func['id'];
        }

        foreach ($nationalitiesArr as $nationality) {
            $nationalities[$nationality['name']] = $nationality['id'];
        }

        foreach ($countriesArr as $country) {
            $countries[$country['name']] = $country['id'];
        }

        foreach ($currenciesArr as $currency) {
            $currencies[$currency['name']] = $currency['id'];
        }

        foreach ($citiesArr as $city) {
            $cities[$city['name']] = $city['id'];
        }

        return view('staff.create',compact('services','subServices','maritalStatus','functions','nationalities','countries','currencies','cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'registration_number' => 'nullable',
           'pointing_id' => 'nullable',
           'nssf_number' => 'nullable',
           'first_name' => 'required',
           'last_name' => 'required',
           'gender' => 'required',
           'address' => 'nullable',
           'city_residence_id' => 'nullable|integer',
           'country_id' => 'nullable|integer',
           'email' => 'nullable|email',
           'phone' => 'nullable',
           'fix' => 'nullable',
           'nationality_id' => 'nullable|integer',
           'nic_number' => 'nullable',
           'nic_date' => 'nullable|date',
           'date_of_birth' => 'nullable|date',
           'place_of_birth_id' => 'nullable|integer',
           'postal_code' => 'nullable',
           'departure_date' => 'nullable|date',
           'reason_departure' => 'nullable',
           'function_id' => 'nullable|integer',
           'service_id' => 'nullable|integer',
           'sub_service_id' => 'nullable|integer',
           'marital_status_id' => 'nullable|integer',
           'children' => 'nullable',
           'first_name_ar' => 'nullable',
           'last_name_ar' => 'nullable',
           'address_ar' => 'nullable',
           'salary' => 'nullable',
           'rate_hourly' => 'nullable',
           'currency_id' => 'nullable|integer',
           'bank_name' => 'nullable',
           'bank_account' => 'nullable',
           'bank_agency' => 'nullable',
           'paypal' => 'nullable',
           'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       if($request->hasFile('photo')){
           $validatedData['photo'] = $request->file('photo')->store('staff/photos','public');
       }

       if(Staff::create($validatedData)){
           return redirect()->route('staff.index')->with('success', 'Personnel créé avec succès');
       }

       abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $servicesArr = Service::all()->toArray();
        $subservicesArr = SubService::all()->toArray();
        $maritalStatusArr = Setting::where('type','etat civil')->get()->toArray();
        $functionsArr = Setting::where('type','fonction')->get()->toArray();
        $nationalitiesArr = Setting::where('type','nationnalite')->get()->toArray();
        $countriesArr = Setting::where('type','pays')->get()->toArray();
        $currenciesArr = Setting::where('type','devise')->get()->toArray();
        $citiesArr = Setting::where('type','ville')->get()->toArray();

        $services = [];
        $subServices = [];
        $maritalStatus = [];
        $functions = [];
        $nationalities = [];
        $countries = [];
        $currencies = [];
        $cities = [];

        foreach ($maritalStatusArr as $status) {
            $maritalStatus[$status['name']] = $status['id'];
        }

        foreach ($servicesArr as $service) {
            $services[$service['name']] = $service['id'];
        }

        foreach ($subservicesArr as $subservice) {
            $subServices[$subservice['name']] = $subservice['id'];
        }

        foreach ($functionsArr as $func) {
            $functions[$func['name']] = $func['id'];
        }

        foreach ($nationalitiesArr as $nationality) {
            $nationalities[$nationality['name']] = $nationality['id'];
        }

        foreach ($countriesArr as $country) {
            $countries[$country['name']] = $country['id'];
        }

        foreach ($currenciesArr as $currency) {
            $currencies[$currency['name']] = $currency['id'];
        }

        foreach ($citiesArr as $city) {
            $cities[$city['name']] = $city['id'];
        }

        return view('staff.edit',compact('staff','services','subServices','maritalStatus','functions','nationalities','countries','currencies','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'registration_number' => 'nullable',
            'pointing_id' => 'nullable',
            'nssf_number' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'address' => 'nullable',
            'city_residence_id' => 'nullable|integer',
            'country_id' => 'nullable|integer',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'fix' => 'nullable',
            'nationality_id' => 'nullable|integer',
            'nic_number' => 'nullable',
            'nic_date' => 'nullable|date',
            'date_of_birth' => 'nullable|date',
            'place_of_birth_id' => 'nullable|integer',
            'postal_code' => 'nullable',
            'departure_date' => 'nullable|date',
            'reason_departure' => 'nullable',
            'function_id' => 'nullable|integer',
            'service_id' => 'nullable|integer',
            'sub_service_id' => 'nullable|integer',
            'marital_status_id' => 'nullable|integer',
            'children' => 'nullable',
            'first_name_ar' => 'nullable',
            'last_name_ar' => 'nullable',
            'address_ar' => 'nullable',
            'salary' => 'nullable',
            'rate_hourly' => 'nullable',
            'currency_id' => 'nullable|integer',
            'bank_name' => 'nullable',
            'bank_account' => 'nullable',
            'bank_agency' => 'nullable',
            'paypal' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('photo')){
            $validatedData['photo'] = $request->file('photo')->store('staff/photos','public');
        }

        if($staff->update($validatedData)){
            return redirect()->route('staff.index')->with('success', 'Personnel editer avec succès');
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}

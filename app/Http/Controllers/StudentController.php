<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use App\Models\Student;
use App\Models\SubService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalitiesArr = Setting::where('type','nationnalite')->get()->toArray();
        $countriesArr = Setting::where('type','pays')->get()->toArray();
        $currenciesArr = Setting::where('type','devise')->get()->toArray();
        $religionArr = Setting::where('type','religion')->get()->toArray();
        $citiesArr = Setting::where('type','ville')->get()->toArray();
        $languagesArr = Setting::where('type','langue')->get()->toArray();

        $nationalities = [];
        $countries = [];
        $currencies = [];
        $cities = [];
        $languages = [];
        $religions = [];

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

        foreach ($religionArr as $religion) {
            $religions[$religion['name']] = $religion['id'];
        }

        foreach ($languagesArr as $language) {
            $languages[$language['name']] = $language['id'];
        }

        return view('students.create',compact('nationalities','countries','currencies','cities','religions','languages'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'nationality_id' => 'nullable|integer',
            'address' => 'nullable',
            'country_id' => 'nullable|integer',
            'postal_code' => 'nullable',
            'place_of_birth_id' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'nic_number' => 'nullable',
            'cne_number' => 'nullable',
            'date_of_birth' => 'nullable',
            'country_of_birth_id' => 'nullable',
            'religion_id' => 'nullable',
            'currency_id' => 'nullable',
            'assurance_name' => 'nullable',
            'assurance_number' => 'nullable',
            'old_school' => 'nullable',
            'old_academy' => 'nullable',
            'old_delegation' => 'nullable',
            'old_state' => 'nullable',
            'remarks' => 'nullable',
            'first_name_ar' => 'nullable',
            'last_name_ar' => 'nullable',
            'address_ar' => 'nullable',
        ]);

        $created = Student::create($validatedData);

        if($request->hasFile('photo')){
            $validatedData['photo'] = $request->file('photo')->store('staff/photos','public');
        }

        if($created){
           dd("create student");
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}

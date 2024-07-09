<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{


    public function show(School $school)
    {
        return view('platform.school.show',compact('school'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('platform.school.edit',compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'name_abbr' => 'required',
            'manager_phone' => 'required|max:15',
            'email' => 'required|email',
            'site_url' => 'required|url:http,https',
            'address' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'delegation' => 'required',
            'academy' => 'required',
            'phone' => 'required|min:10|max:15',
            'phone_alt' => 'nullable|min:10|max:15',
            'fax' => 'nullable',
            'nssf_number' => 'nullable',
            'cr_number' => 'nullable',
            'bank_account' => 'required',
            'bank_name' => 'required',
            'bank_agency' => 'nullable',
            'longitude' => 'nullable',
            'latitude' => 'nullable',
            'legal_informations' => 'nullable',
            'authorization_number' => 'nullable',
            'authorization_date' => 'nullable',
            'name_ar' => 'required',
            'address_ar' => 'required',
            'delegation_ar' => 'required',
            'manager_ar' => 'required',
            'legal_informations_ar' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'header' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'school_rules' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,gif,svg|max:2048',
        ]);


        if(!empty($request->file('logo'))) {
            $validatedData['logo'] = $request->file('logo')->store('school','public');
        }

        if(!empty($request->file('header'))) {
            $validatedData['header'] = $request->file('header')->store('school','public');
        }

        if(!empty($request->file('footer'))) {
            $validatedData['footer'] = $request->file('footer')->store('school','public');
        }

        if(!empty($request->file('school_rules'))) {
            $validatedData['school_rules'] = $request->file('school_rules')->store('school','public');
        }

        $updated = $school->update($validatedData);

        if($updated) {
            return redirect()->to('platform/school/' . $school->id)->with([
                'success' => 'Les Informations De L\'école mise à jour avec succès',
            ]);
        }

        abort(500);

    }


}

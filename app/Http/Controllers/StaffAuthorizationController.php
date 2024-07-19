<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Staff;
use App\Models\StaffAuthorization;
use App\Models\Vacation;
use Illuminate\Http\Request;

class StaffAuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $authorizations = StaffAuthorization::all();
        $staffsArr = Staff::all()->toArray();
        $authorizationTypeArr = Setting::where('type', 'type autorisation')->get()->toArray();

        $staffs = [];
        $authorizationsType = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }

        foreach ($authorizationTypeArr as $a) {
            $authorizationsType[$a['name']] = $a['id'];
        }

        return view('staff-authorizations.index', compact('authorizations','staffs','authorizationsType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type_authorization_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'reason' => 'required',
        ]);

        if(StaffAuthorization::create($validated)){
            return redirect()->to('human-resources/staff-authorizations')->with([
                'success' => 'Authorisation cree avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffAuthorization $staffAuthorization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffAuthorization $staff_authorization)
    {
        $authorizations = StaffAuthorization::all();
        $staffsArr = Staff::all()->toArray();
        $authorizationTypeArr = Setting::where('type', 'type autorisation')->get()->toArray();

        $staffs = [];
        $authorizationsType = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }

        foreach ($authorizationTypeArr as $a) {
            $authorizationsType[$a['name']] = $a['id'];
        }

        return view('staff-authorizations.edit', compact('staff_authorization','staffs','authorizationsType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffAuthorization $staff_authorization)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type_authorization_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'reason' => 'required',
        ]);

        if($staff_authorization->update($validated)){
            return redirect()->to('human-resources/staff-authorizations')->with([
                'success' => 'Authorisation editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffAuthorization $staff_authorization)
    {
        if($staff_authorization->delete()){
            return redirect()->to('human-resources/staff-authorizations')->with([
                'success' => 'Authorisation supprimer avec succès',
            ]);
        }

        abort(500);
    }
}

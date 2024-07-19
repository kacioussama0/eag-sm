<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Staff;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacations = Vacation::all();
        $vacationTypeArr = Setting::where('type', 'type conge')->get()->toArray();
        $staffsArr = Staff::all()->toArray();
        $staffs = [];
        $vacationType = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }

        foreach ($vacationTypeArr as $vacation) {
            $vacationType[$vacation['name']] = $vacation['id'];
        }

        return view('vacations.index',compact('staffs','vacations','vacationType'));
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
            'type_vacation_id' => 'required|integer',
            'staff_id' => 'required|integer',
        ]);

        if(Vacation::create($validated)){
            return redirect()->to('human-resources/vacations')->with([
                'success' => 'Conge cree avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Vacation $vacation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacation $vacation)
    {
        $staffsArr = Staff::all()->toArray();
        $vacationTypeArr = Setting::where('type', 'type conge')->get()->toArray();
        $staffs = [];
        $vacationType = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }

        foreach ($vacationTypeArr as $v) {
            $vacationType[$v['name']] = $v['id'];
        }

        return view('vacations.edit',compact('vacation','staffs','vacationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacation $vacation)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type_vacation_id' => 'required|integer',
            'staff_id' => 'required|integer',
        ]);

        if($vacation->update($validated)){
            return redirect()->to('human-resources/vacations')->with([
                'success' => 'Conge editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacation $vacation)
    {
        if($vacation->delete()){
            return redirect()->to('human-resources/vacations')->with([
                'success' => 'Conge supprimer avec succès',
            ]);
        }

        abort(500);
    }
}

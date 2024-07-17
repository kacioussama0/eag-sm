<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffAbsence;
use Illuminate\Http\Request;

class StaffAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absences = StaffAbsence::all();
        $staffsArr = Staff::all()->toArray();
        $staffs = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }


        return view('absences.index',compact('absences','staffs'));
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
            'date' => 'required|date',
            'staff_id' => 'required|integer',
            'hours' => 'required',
            'reason' => 'required|string',
            'justificated' => 'required|boolean',
            'justification_attachment' => 'nullable|mimes:jpeg,jpg,png,pdf,doc,docx,svg|max:5120',
        ]);

        $validated['hours'] = serialize($validated['hours']);

        if($request->hasFile('justification_attachment')){
            $validated['justification_attachment'] = $request->file('justification_attachment')->store('staff/justification_attachment','public');
        }

        if(StaffAbsence::create($validated)){
            return redirect()->route('absences.index')->with('success', 'Absence Cree avec succès');
        }

        abort(500);


    }

    /**
     * Display the specified resource.
     */
    public function show(StaffAbsence $staffAbsence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffAbsence $absence)
    {
        $staffsArr = Staff::all()->toArray();
        $staffs = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }

        return view('absences.edit',compact('absence','staffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffAbsence $absence)
    {

        $validated = $request->validate([
            'date' => 'required|date',
            'staff_id' => 'required|integer',
            'hours' => 'required',
            'reason' => 'required|string',
            'justificated' => 'required|boolean',
            'justification_attachment' => 'nullable|mimes:jpeg,jpg,png,pdf,doc,docx,svg|max:5120',
        ]);

        $validated['hours'] = serialize($validated['hours']);

        if($request->hasFile('justification_attachment')){
            $validated['justification_attachment'] = $request->file('justification_attachment')->store('staff/justification_attachment','public');
        }

        if($absence->update($validated)){
            return redirect()->route('absences.index')->with('success', 'Absence Editer avec succès');
        }

        abort(500);


        return redirect()->to('human-resources/absences')->with('success', 'Absence Supprimer avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffAbsence $absence)
    {
        if($absence->delete()){
            return redirect()->to('human-resources/absences')->with('success', 'Absence Supprimer avec succès');
        }
    }
}

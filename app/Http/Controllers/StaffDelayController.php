<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffDelay;
use Illuminate\Http\Request;

class StaffDelayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delays = StaffDelay::all();
        $staffsArr = Staff::all()->toArray();
        $staffs = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }


        return view('delays.index',compact('delays','staffs'));
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
            'start_hour' => 'required',
            'arrived_hour' => 'required',
            'reason' => 'required|string',
            'justificated' => 'required|boolean',
            'justification_attachment' => 'nullable|mimes:jpeg,jpg,png,pdf,doc,docx,svg|max:5120',
        ]);



        if($request->hasFile('justification_attachment')){
            $validated['justification_attachment'] = $request->file('justification_attachment')->store('staff/justification_attachment','public');
        }

        if(StaffDelay::create($validated)){
            return redirect()->route('delays.index')->with('success', 'Retard Cree avec succès');
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(StaffDelay $staffDelay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffDelay $delay)
    {
        $delays = StaffDelay::all();
        $staffsArr = Staff::all()->toArray();
        $staffs = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }


        return view('delays.edit',compact('delay','staffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffDelay $delay)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'staff_id' => 'required|integer',
            'start_hour' => 'required',
            'arrived_hour' => 'required',
            'reason' => 'required|string',
            'justificated' => 'required|boolean',
            'justification_attachment' => 'nullable|mimes:jpeg,jpg,png,pdf,doc,docx,svg|max:5120',
        ]);


        if($request->hasFile('justification_attachment')){
            $validated['justification_attachment'] = $request->file('justification_attachment')->store('staff/justification_attachment','public');
        }

        if($delay->update($validated)){
            return redirect()->route('delays.index')->with('success', 'Retard Editer avec succès');
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffDelay $delay)
    {
        if($delay->delete()){
            return redirect()->route('delays.index')->with('success', 'Retard Supprimer avec succès');
        }
    }
}

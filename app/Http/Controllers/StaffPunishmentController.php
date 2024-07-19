<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Staff;
use App\Models\StaffPunishment;
use Illuminate\Http\Request;

class StaffPunishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanctions = StaffPunishment::all();
        $staffsArr = Staff::all()->toArray();
        $sanctionTypeArr = Setting::where('type', 'type sanction')->get()->toArray();

        $staffs = [];
        $sanctionsType = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }

        foreach ($sanctionTypeArr as $a) {
            $sanctionsType[$a['name']] = $a['id'];
        }

        return view('staff-sanctions.index', compact('sanctions','staffs','sanctionsType'));
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
            'type_sanction_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'reason' => 'required',
            'decision' => 'required',
            'description' => 'required',
        ]);

        if(StaffPunishment::create($validated)){
            return redirect()->to('human-resources/staff-sanctions')->with([
                'success' => 'Sanction cree avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffPunishment $staffPunishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffPunishment $staff_sanction)
    {
        $staffsArr = Staff::all()->toArray();
        $sanctionTypeArr = Setting::where('type', 'type sanction')->get()->toArray();

        $staffs = [];
        $sanctionsType = [];

        foreach ($staffsArr as $staff) {
            $staffs[$staff['first_name'] . ' ' . $staff['last_name']] = $staff['id'];
        }

        foreach ($sanctionTypeArr as $a) {
            $sanctionsType[$a['name']] = $a['id'];
        }

        return view('staff-sanctions.edit', compact('staff_sanction','staffs','sanctionsType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffPunishment $staff_sanction)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'type_sanction_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'reason' => 'required',
            'decision' => 'required',
            'description' => 'required',
        ]);

        if($staff_sanction->update($validated)){
            return redirect()->to('human-resources/staff-sanctions')->with([
                'success' => 'Sanction editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffPunishment $staff_sanction)
    {
        if($staff_sanction->delete()){
            return redirect()->to('human-resources/staff-sanctions')->with([
                'success' => 'Sanction supprimer avec succès',
            ]);
        }
    }
}

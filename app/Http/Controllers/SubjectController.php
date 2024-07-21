<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Staff;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $natureTypeArr = Setting::where('type', 'nature de la matière')->get()->toArray();
        $typeRoomArr = Setting::where('type', 'type salle')->get()->toArray();
        $languagesArr = Setting::where('type', 'langue')->get()->toArray();

        $natures = [];
        $typeRoom = [];
        $languages = [];

        foreach ($natureTypeArr as $a) {
            $natures[$a['name']] = $a['id'];
        }

        foreach ($typeRoomArr as $a) {
            $typeRoom[$a['name']] = $a['id'];
        }

        foreach ($languagesArr as $a) {
            $languages[$a['name']] = $a['id'];
        }


        return view('subjects.index', compact('subjects','natures','typeRoom','languages'));
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
            'name' => 'required',
            'name_ar' => 'required',
            'langue_id' => 'required|integer',
            'type_room_id' => 'required|integer',
            'nature_subject_id' => 'required|integer',
        ]);


        if(Subject::create($validated)){
            return redirect()->to('repartition-yearly/subjects')->with([
                'success' => 'Matière cree avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $natureTypeArr = Setting::where('type', 'nature de la matière')->get()->toArray();
        $typeRoomArr = Setting::where('type', 'type salle')->get()->toArray();
        $languagesArr = Setting::where('type', 'langue')->get()->toArray();

        $natures = [];
        $typeRoom = [];
        $languages = [];

        foreach ($natureTypeArr as $a) {
            $natures[$a['name']] = $a['id'];
        }

        foreach ($typeRoomArr as $a) {
            $typeRoom[$a['name']] = $a['id'];
        }

        foreach ($languagesArr as $a) {
            $languages[$a['name']] = $a['id'];
        }


        return view('subjects.edit', compact('subject','natures','typeRoom','languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'langue_id' => 'required|integer',
            'type_room_id' => 'required|integer',
            'nature_subject_id' => 'required|integer',
        ]);


        if($subject->update($validated)){
            return redirect()->to('repartition-yearly/subjects')->with([
                'success' => 'Matière editer avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        if($subject->delete()){
            return redirect()->to('repartition-yearly/subjects')->with([
                'success' => 'Matière supprimer avec succès',
            ]);
        }

        abort(500);
    }
}

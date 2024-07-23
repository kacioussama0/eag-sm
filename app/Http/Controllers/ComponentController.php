<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Subject;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $components = Component::all();
        $subjectsArr = Subject::all()->toArray();

        $subjects = [];

        foreach ($subjectsArr as $subject) {
            $subjects[$subject['name']] = $subject['id'];
        }


        return view('subject-components.index', compact('components','subjects'));
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
           'name_ar' => 'nullable',
           'color' => 'nullable',
           'subject_id' => 'required|integer',
        ]);

        if(Component::create($validated)){
            return redirect()->to('repartition-yearly/components')->with([
                'success' => 'Composant créé avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Component $component)
    {
        $subjectsArr = Subject::all()->toArray();

        $subjects = [];

        foreach ($subjectsArr as $subject) {
            $subjects[$subject['name']] = $subject['id'];
        }

        return view('subject-components.edit', compact('component','subjects'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Component $component)
    {
        $validated = $request->validate([
            'name' => 'required',
            'name_ar' => 'nullable',
            'color' => 'nullable',
            'subject_id' => 'required|integer',
        ]);

        if($component->update($validated)){
            return redirect()->to('repartition-yearly/components')->with([
                'success' => 'Composant editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Component $component)
    {
        if($component->delete()){
            return redirect()->to('repartition-yearly/components')->with([
                'success' => 'Composant supprimer avec succès',
            ]);
        }

        abort(500);
    }
}

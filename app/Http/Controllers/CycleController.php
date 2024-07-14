<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::all(['id','name','name_ar','duration'])->toArray();
        return view('platform.cycles.index',compact('cycles'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required|max:200',
           'name_ar' => 'required|max:200',
           'duration' => 'required|integer',
        ]);

        if(Cycle::create($validatedData)){
            return redirect()->to('platform/cycles')->with([
                'success' => 'Cycle créé avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cycle $cycle)
    {
        return view('platform.cycles.edit',compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cycle $cycle)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'name_ar' => 'required|max:200',
            'duration' => 'required|integer',
        ]);

        if($cycle->update($validatedData)){
            return redirect()->to('platform/cycles')->with([
                'success' => 'Cycle mis à jour avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle)
    {
        if($cycle->delete()) {
            return redirect()->to('platform/cycles')->with([
                'success' => 'Cycle supprimer avec succès',
            ]);
        }

        abort(500);
    }
}

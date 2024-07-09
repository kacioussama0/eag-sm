<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();

        $branchesArr = Branch::all()->toArray();

        $branches = [];

        foreach ($branchesArr as $branch) {
            $branches[$branch['name']] = $branch['id'];
        }

        return view('platform.levels.index',compact('levels','branches'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'school_supplies' => 'nullable|mimes:jpeg,png,jpg,gif,svg,docx,pdf|max:2048',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if(!empty($request->file('school_supplies'))) {
            $validatedData['school_supplies'] = $request->file('school_supplies')->store('school_supplies','public');
        }

        if(Level::create($validatedData)) {
            return redirect()->to('platform/levels')->with([
                'success' => 'Niveau créé avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {


        $branchesArr = Branch::all()->toArray();

        $branches = [];

        foreach ($branchesArr as $branch) {
            $branches[$branch['name']] = $branch['id'];
        }

        return view('platform.levels.edit', compact('level','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'school_supplies' => 'nullable|mimes:jpeg,png,jpg,gif,svg,docx,pdf|max:2048',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if(!empty($request->file('school_supplies'))) {
            $validatedData['school_supplies'] = $request->file('school_supplies')->store('school_supplies','public');
        }

        if($level->update($validatedData)) {
            return redirect()->to('platform/levels')->with([
                'success' => 'Niveau editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        if($level->delete()) {
            return redirect()->to('platform/levels')->with([
                'success' => 'Niveau supprimer avec succès',
            ]);
        }

        abort(500);
    }
}

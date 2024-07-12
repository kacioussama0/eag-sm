<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $classes = Classes::all();
       $branchesArr = Branch::all()->toArray();

        $branches = [];

        foreach ($branchesArr as $branch) {
            $branches[$branch['name']] = $branch['id'];
        }


       return view('platform.classes.index', compact('classes','branches'));
    }


    public function branchLevels($branchId)
    {
        $branch = Branch::findOrFail($branchId);

        $level = $branch->levels;

        return response()->json($level);

    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'code_class' => 'required',
           'name' => 'required',
           'name_ar' => 'required',
           'branch_id' => 'required|integer',
           'level_id' => 'required|integer',
        ]);

        $branch = Branch::findOrFail($validated['branch_id']);

        if(!$branch->levels()->where('id', $validated['level_id'])->exists()){
            abort(401);
        }

        if(Classes::create($validated)){
            return redirect()->to('platform/classes')->with([
                'success' => 'Classe créé avec succès',
            ]);
        }

        abort(500);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($classe)
    {
        $classe = Classes::findOrFail($classe);

        $branchesArr = Branch::all()->toArray();

        $branches = [];

        foreach ($branchesArr as $branch) {
            $branches[$branch['name']] = $branch['id'];
        }


        return view('platform.classes.edit', compact('classe','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $classe)
    {
        $classe = Classes::findOrFail($classe);

        $validated = $request->validate([
            'code_class' => 'required',
            'name' => 'required',
            'name_ar' => 'required',
            'branch_id' => 'required|integer',
            'level_id' => 'required|integer',
        ]);

        $branch = Branch::findOrFail($validated['branch_id']);

        if(!$branch->levels()->where('id', $validated['level_id'])->exists()){
            abort(401);
        }

        if($classe->update($validated)){
            return redirect()->to('platform/classes')->with([
                'success' => 'Classe editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($classe)
    {

        $classe = Classes::findOrFail($classe);

        if($classe->delete()) {
            return redirect()->to('platform/classes')->with([
                'success' => 'Classe supprimer avec succès',
            ]);
        }
    }
}

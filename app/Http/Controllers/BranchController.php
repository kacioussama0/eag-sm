<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Cycle;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        $cyclesArr = Cycle::all()->toArray();

        $cycles = [];

        foreach ($cyclesArr as $cycle) {
            $cycles[$cycle['name']] = $cycle['id'];
        }

        return view('platform.branches.index', compact('branches','cycles'));
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
           'code_branch' => 'required|max:20',
           'cycle_id' => 'required|exists:cycles,id',
        ]);

        if(Branch::create($validatedData)) {
            return redirect()->to('platform/branches')->with([
                'success' => 'Branche créé avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        $cyclesArr = Cycle::all()->toArray();

        $cycles = [];

        foreach ($cyclesArr as $cycle) {
            $cycles[$cycle['name']] = $cycle['id'];
        }
        return view('platform.branches.edit', compact('branch','cycles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'code_branch' => 'required|max:20',
            'cycle_id' => 'required|exists:cycles,id',
        ]);

        if($branch->update($validatedData)) {
            return redirect()->to('platform/branches')->with([
                'success' => 'Branche editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        if($branch->delete()) {
            return redirect()->to('platform/branches')->with([
                'success' => 'Branche supprimer avec succès',
            ]);
        }

        abort(500);
    }
}

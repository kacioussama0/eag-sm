<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
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
           'name' => 'required',
           'name_ar' => 'required',
           'type' => 'required',
        ]);

        if(Service::create($validatedData)){
            return redirect()->to('services')->with([
                'success' => 'Service cree avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'type' => 'required',
        ]);

        if($service->update($validatedData)){
            return redirect()->to('services')->with([
                'success' => 'Service modifier avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if($service->delete()){
            return redirect()->to('services')->with([
                'success' => 'Service supprimer avec succès',
            ]);
        }

        abort(500);

    }

}

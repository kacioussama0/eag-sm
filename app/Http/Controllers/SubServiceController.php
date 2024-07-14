<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $subServices = SubService::all();

        $servicesArr = Service::all()->toArray();

        $services = [];

        foreach ($servicesArr as $service) {
            $services[$service['name']] = $service['id'];
        }

       return view('sub-services.index', compact('subServices','services'));
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
            'service_id' => 'required',
        ]);

        if(SubService::create($validatedData)){
            return redirect()->to('sub-services')->with([
                'success' => 'Sous Service cree avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubService $subService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubService $subService)
    {

        $servicesArr = Service::all()->toArray();

        $services = [];

        foreach ($servicesArr as $service) {
            $services[$service['name']] = $service['id'];
        }

        return view('sub-services.edit', compact('subService','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubService $subService)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'service_id' => 'required',
        ]);

        if($subService->update($validatedData)){
            return redirect()->to('sub-services')->with([
                'success' => 'Sous Service modifier avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubService $subService)
    {
        if($subService->delete()){
            return redirect()->to('sub-services')->with([
                'success' => 'Sous Service supprimer avec succès',
            ]);
        }
    }
}

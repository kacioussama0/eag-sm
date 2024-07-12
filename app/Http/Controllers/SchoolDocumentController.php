<?php

namespace App\Http\Controllers;

use App\Models\SchoolDocument;
use Illuminate\Http\Request;

class SchoolDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = SchoolDocument::all();
        return view('platform.school-documents.index', compact('documents'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
           'description' => 'nullable',
           'file'=> 'required|mimes:pdf,doc,docx,jpg,jpeg,png,svg,xlsx,xls,zip,rar,webp|max:5120'
        ]);

        $validated['file'] = $request->file('file')->store('school_documents','public');


        if(SchoolDocument::create($validated)){
            return redirect()->to('platform/school-documents')->with([
                'success' => 'Document créé avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolDocument $schoolDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolDocument $schoolDocument)
    {
        $document = $schoolDocument;
        return view('platform.school-documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolDocument $schoolDocument)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'file'=> 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png,svg,xlsx,xls,zip,rar,webp|max:5120'
        ]);


        if($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('school_documents','public');
        }



        if($schoolDocument->update($validated)){
            return redirect()->to('platform/school-documents')->with([
                'success' => 'Document editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolDocument $schoolDocument)
    {

        if($schoolDocument->delete()){
            return redirect()->to('platform/school-documents')->with([
                'success' => 'Document supprimer avec succès',
            ]);
        }
    }
}

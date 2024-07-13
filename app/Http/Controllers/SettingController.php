<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function findSetting($setting)
    {
        $settings = [
            ["name" => "Années Scolaires","setting" => "school-years","type" => "année scolaire"],
            ["name" => "Comment il a connu l'école","setting" => "school-social","type" => "prospection"],
            ["name" => "Depenses","setting" => "expenses","type" => "depense"],
            ["name" => "Devise","setting" => "currency","type" => "devise"],
            ["name" => "Diplômes","setting" => "diplomas","type" => "diplome"],
            ["name" => "Documents pédagogiques","setting" => "educational-documents","type" => "document pedagogique"],
            ["name" => "Etat Civil","setting" => "marital-status","type" => "etat civil","type" => "etat civil"],
            ["name" => "Fonctions","setting" => "functions","type" => "fonction"],
            ["name" => "Langue","setting" => "languages","type" => "langue"],
            ["name" => "Lien de Parenté","setting" => "relationship","type" => "lien de parenté"],
            ["name" => "Nationnalités","setting" => "nationalities","type" => "nationalite"],
            ["name" => "Natures des matières","setting" => "nature-of-materials","type"=>"nature de la matière"],
            ["name" => "Niveaux de Branches","setting" => "branch-levels","type" => "niveau de branche"],
            ["name" => "Niveaux de formations","setting" => "training-levels","type" => "niveau foramtion"],
            ["name" => "Niveaux scolaires","setting" => "school-levels","type" => "niveau de classe"],
            ["name" => "Pays","setting" => "countries","type" => "pays"],
            ["name" => "Professions","setting" => "professions","type" => "profession"],
            ["name" => "Recompenses","setting" => "awards","type" => "recompense"],
            ["name" => "Religions","setting" => "religions","type" => "religion"],
            ["name" => "Sanctions","setting" => "sanctions","type" => "sanction"],
            ["name" => "Thème Ouvrage","setting" => "book-theme","type" => "categorie ouvrage"],
            ["name" => "Types de branches","setting" => "branch-types","type" => "type de branche"],
            ["name" => "Types des documents","setting" => "document-types","type" => "type du document"],
            ["name" => "Types de professeurs","setting" => "types-of-teachers","type" => "type de professeur"],
            ["name" => "Types écoles","setting" => "types-of-schools","type"=>"type école"],
            ["name" => "Types de salle","setting" => "room-types","type" => "type salle"],
            ["name" => "Villes","setting" => "cities","type" => "ville"],
        ];

        $foundSetting = [];

        foreach ($settings as $data) {
            if($data['setting'] == $setting){
               $foundSetting = $data;
            }
        }
        if(empty($foundSetting)) abort(404);

        return $foundSetting;

    }




    public function index($setting)
    {

        $foundSetting = $this->findSetting($setting);

        $data = Setting::where('type',$foundSetting['type'])->get();

        return view('settings.index', compact('foundSetting','data'));


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
    public function store(Request $request,$setting)
    {
        $validated = $request->validate([
           'name' => 'required',
           'name_ar' => 'required',
        ]);

        $foundSetting = $this->findSetting($setting);

        $validated['type'] = $foundSetting['type'];

        if(Setting::create($validated)) {
            return redirect()->to('settings/' . $foundSetting['setting'])->with([
                'success' => $foundSetting['name'] . ' créé avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($setting,$id)
    {
        $foundSetting = $this->findSetting($setting);

        $data = Setting::where('type',$foundSetting['type'])->where('id',$id)->first();

        if(!$data) abort(404);

        return view('settings.edit', compact('foundSetting','data'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$setting,$id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        $foundSetting = $this->findSetting($setting);

        $data = Setting::where('type',$foundSetting['type'])->where('id',$id)->first();

        $validated['type'] = $foundSetting['type'];

        if($data->update($validated)) {
            return redirect()->to('settings/' . $foundSetting['setting'])->with([
                'success' => $foundSetting['name'] . ' editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($setting,$id)
    {
        $foundSetting = $this->findSetting($setting);

        $data = Setting::where('type',$foundSetting['type'])->where('id',$id)->first();

        if(!$data) abort(404);

        if($data->delete()) {
            return redirect()->to('settings/' . $foundSetting['setting'])->with([
                'success' => $foundSetting['name'] . ' supprimer avec succès'
            ]);
        }

    }
}

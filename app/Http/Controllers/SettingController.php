<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($setting)
    {

        $settings = [
            ["name" => "Années Scolaires","link" => "/settings/school-years","type" => "année scolaire"],
            ["name" => "Comment il a connu l'école","link" => "/settings/school-social","type" => "année scolaire"],
            ["name" => "Depenses","link" => "/settings/expenses","type" => "année scolaire"],
            ["name" => "Devise","link" => "/settings/currency"],
            ["name" => "Diplômes","link" => "/settings/diplomas"],
            ["name" => "Documents pédagogiques","link" => "/settings/educational-documents"],
            ["name" => "Etat Civil","link" => "/settings/marital-status","type" => "etat civil"],
            ["name" => "Fonctions","link" => "/settings/functions","type" => "fonction"],
            ["name" => "Langue","link" => "/settings/languages","type" => "langue"],
            ["name" => "Lien de Parenté","link" => "/settings/relationship","type" => "lien de parenté"],
            ["name" => "Nationnalités","link" => "/settings/nationalities","type" => "nationalite"],
            ["name" => "Natures des matières","link" => "/settings/nature-of-materials"],
            ["name" => "Niveaux de Branches","link" => "/settings/branch-levels","type" => "niveau de branche"],
            ["name" => "Niveaux de formations","link" => "/settings/training-levels"],
            ["name" => "Niveaux scolaires","link" => "/settings/school-levels","type" => "niveau de classe"],
            ["name" => "Pays","link" => "/settings/countries","type" => "pays"],
            ["name" => "Professions","link" => "/settings/professions","type" => "profession"],
            ["name" => "Recompenses","link" => "/settings/awards"],
            ["name" => "Religions","link" => "/settings/religions"],
            ["name" => "Sanctions","link" => "/settings/sanctions"],
            ["name" => "Thème Ouvrage","link" => "/settings/book-theme"],
            ["name" => "Types de branches","link" => "/settings/branch-types"],
            ["name" => "Types des documents","link" => "/settings/document-types"],
            ["name" => "Types de professeurs","link" => "/settings/types-of-teachers"],
            ["name" => "Types écoles","link" => "/settings/types-of-schools"],
            ["name" => "Types de salle","link" => "/settings/room-types"],
            ["name" => "Villes","link" => "/settings/cities","type" => "ville"],
        ];

        dd($setting);





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
        //
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
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

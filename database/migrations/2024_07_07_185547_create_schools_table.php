<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {

            $table->id(); # id
            $table->string('name',200); # Nom
            $table->string('name_abbr',50); # Nom abrégé
            $table->string('name_ar',200); # Nom Arabe
            $table->string('phone',15); # Telephone
            $table->string('phone_alt',15)->nullable(); # Teléphone 2
            $table->string('fax',15)->nullable(); # Fax
            $table->string('address'); # Adresse de l'école
            $table->string('address_ar'); # Adresse de l'école en Arabe
            $table->string('manager'); # Nom de Responsable
            $table->string('manager_ar'); # Nom de Responsable en Arabe
            $table->string('manager_phone',15); # Gsm Responsable
            $table->string('email'); # Email Responsable
            $table->string('site_url'); # Site web
            $table->string('delegation'); # Délégation
            $table->string('delegation_ar'); # Délégation En Arabe
            $table->string('bank_name'); # Banque
            $table->string('bank_account'); # Compte Bancaire
            $table->string('bank_agency'); #  Agence
            $table->string('country'); # Pays
            $table->string('state'); # Ville
            $table->string('postal_code',15); # Code Postal
            $table->string('logo')->nullable(); # Logo
            $table->string('header')->nullable(); # Entete
            $table->string('footer')->nullable(); # Pied de page
            $table->string('school_rules')->nullable(); # Réglement intérieur
            $table->string('longitude',20)->nullable(); # Longitude
            $table->string('latitude',20)->nullable(); # Latitude
            $table->string('cr_number')->nullable(); # Numéro RC
            $table->string('nssf_number'); # Numéro CNSS
            $table->string('legal_informations'); # Informations Légales
            $table->string('legal_informations_ar'); # Informations Légales En Arabe
            $table->string('academy'); # Academie
            $table->string('authorization_number'); # Numéro autorisation
            $table->date('authorization_date'); # Date autorisation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};

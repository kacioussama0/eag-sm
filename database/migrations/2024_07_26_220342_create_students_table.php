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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('number',30)->nullable(); # NumEtu
            $table->string('first_name',150); # NomEtu
            $table->string('last_name',100); # PrenomEtu
            $table->string('first_name_ar',150)->nullable(); # NomEtu En Arabe
            $table->string('last_name_ar',100)->nullable(); # PrenomEtu En Arabe
            $table->string('address',250)->nullable(); # AdresseEtu
            $table->string('address_ar',250)->nullable(); # AdresseEtu En Arabe
            $table->string('postal_code',10)->nullable(); # CodePostal
            $table->string('phone',20)->nullable(); # GSMetu
            $table->string('email',128)->nullable(); # EmailEtu
            $table->string('fix',20)->nullable(); # FixeEtu
            $table->enum('gender',['M','F']); # SexeEtu
            $table->date('date_of_birth')->nullable(); # datenaissance
            $table->string('photo')->nullable(); #
            $table->string('nic_number',100)->nullable(); # NumCIN
            $table->string('cne_number',100)->nullable(); # NumCNE
            $table->string('assurance_number',100)->nullable(); # nomAssurance
            $table->string('assurance_name',100)->nullable(); # numAssurance
            $table->date('registration_date')->nullable(); # dateinscription
            $table->boolean('status')->default(0);
            $table->boolean('scholarship_holder')->nullable()->default(0);
            $table->boolean('payment_voucher')->nullable()->default(0);
            $table->string('old_school')->nullable();
            $table->string('old_academy')->nullable();
            $table->string('old_delegation')->nullable();
            $table->string('old_state')->nullable();
            $table->longText('remarks')->nullable();
            $table->unsignedBigInteger('place_of_birth_id')->nullable();
            $table->unsignedBigInteger('country_of_birth_id')->nullable();
            $table->unsignedBigInteger('city_residence_id')->nullable();
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->unsignedBigInteger('class_request_id')->nullable();
            $table->unsignedBigInteger('branch_request_id')->nullable();
            $table->unsignedBigInteger('level_request_id')->nullable();
            $table->unsignedBigInteger('mother_language_id')->nullable();
            $table->unsignedBigInteger('home_language_id')->nullable();
            $table->foreign('class_request_id')->references('id')->on('classes');
            $table->foreign('level_request_id')->references('id')->on('levels');
            $table->foreign('branch_request_id')->references('id')->on('branches');
            $table->foreign('place_of_birth_id')->references('id')->on('settings');
            $table->foreign('country_of_birth_id')->references('id')->on('settings');
            $table->foreign('city_residence_id')->references('id')->on('settings');
            $table->foreign('nationality_id')->references('id')->on('settings');
            $table->foreign('country_id')->references('id')->on('settings');
            $table->foreign('currency_id')->references('id')->on('settings');
            $table->foreign('religion_id')->references('id')->on('settings');
            $table->foreign('mother_language_id')->references('id')->on('settings');
            $table->foreign('home_language_id')->references('id')->on('settings');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

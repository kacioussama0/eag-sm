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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number',50)->nullable();
            $table->string('pointing_id',50)->nullable();
            $table->string('nssf_number',50)->nullable();
            $table->string('first_name',150);
            $table->string('first_name_ar',150)->nullable();
            $table->string('last_name',100);
            $table->string('last_name_ar',100)->nullable();
            $table->string('address')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email',128)->nullable();
            $table->string('fix',128)->nullable();
            $table->enum('gender',['male','female']);
            $table->date('date_of_birth')->nullable();
            $table->string('nic_number',100)->nullable();
            $table->date('nic_date')->nullable();
            $table->unsignedInteger('children')->nullable();
            $table->date('recruitment_date')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('reason_departure')->nullable();
            $table->string('bank_name')->nullable(); # Banque
            $table->string('bank_account')->nullable(); # Compte Bancaire
            $table->string('bank_agency')->nullable(); #  Agence
            $table->double('salary')->nullable();
            $table->double('rate_hourly')->nullable();
            $table->string('postal_code',15)->nullable(); # Code Postal
            $table->string('paypal')->nullable(); # Code Postal
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('sub_service_id')->nullable();
            $table->unsignedBigInteger('function_id')->nullable();
            $table->unsignedBigInteger('marital_status_id')->nullable();
            $table->unsignedBigInteger('place_of_birth_id')->nullable();
            $table->unsignedBigInteger('city_residence_id')->nullable();
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('sub_service_id')->references('id')->on('sub_services');
            $table->foreign('function_id')->references('id')->on('settings');
            $table->foreign('marital_status_id')->references('id')->on('settings');
            $table->foreign('place_of_birth_id')->references('id')->on('settings');
            $table->foreign('city_residence_id')->references('id')->on('settings');
            $table->foreign('nationality_id')->references('id')->on('settings');
            $table->foreign('country_id')->references('id')->on('settings');
            $table->foreign('currency_id')->references('id')->on('settings');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};

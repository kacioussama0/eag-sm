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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',150);
            $table->string('last_name',100);
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('fix',20)->nullable();
            $table->string('first_name_ar')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('nic_number')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('function_id')->nullable();
            $table->foreign('function_id')->references('id')->on('settings');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};

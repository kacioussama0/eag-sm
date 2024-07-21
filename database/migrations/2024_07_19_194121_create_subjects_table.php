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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('langue_id');
            $table->unsignedBigInteger('type_room_id');
            $table->unsignedBigInteger('nature_subject_id');
            $table->foreign('langue_id')->references('id')->on('settings');
            $table->foreign('nature_subject_id')->references('id')->on('settings');
            $table->foreign('type_room_id')->references('id')->on('settings');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};

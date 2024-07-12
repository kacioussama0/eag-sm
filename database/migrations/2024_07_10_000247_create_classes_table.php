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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('code_class',20);
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')
                ->on('branches')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')
                ->on('levels')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('order')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};

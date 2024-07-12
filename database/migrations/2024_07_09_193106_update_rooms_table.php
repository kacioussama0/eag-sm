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
        Schema::table('rooms', function (Blueprint $table) {

         $table->foreign('type_room_id')->references('id')->on('settings')
             ->cascadeOnDelete()->cascadeOnUpdate();

         $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_type_room_id_foreign');
        });
    }
};

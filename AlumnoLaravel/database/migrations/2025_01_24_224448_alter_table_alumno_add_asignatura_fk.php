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
        Schema::table("alumno", callback: function (Blueprint $table){
            $table->foreignId("asignatura_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("alumno", function (Blueprint $table){
            $table->dropForeign("alumnos_asignatura_id");
            $table->dropColumn("asignatura_id");
        });
    }
};

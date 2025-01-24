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
        Schema::table("profesor", callback: function (Blueprint $table){
            $table->foreignId("asignatura_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("profesor", function (Blueprint $table){
            $table->dropForeign("profesor_asignatura_id");
            $table->dropColumn("asignatura_id");
        });
    }
};

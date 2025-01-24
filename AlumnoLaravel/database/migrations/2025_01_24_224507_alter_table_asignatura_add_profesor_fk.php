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
        Schema::table("asignatura", callback: function (Blueprint $table){
            $table->foreignId("profesor_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("asignatura", function (Blueprint $table){
            $table->dropForeign("asignatura_profesor_id");
            $table->dropColumn("profesor_id");
        });
    }
};

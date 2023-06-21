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
        Schema::table('recherches', function (Blueprint $table) {
            $table->unsignedBigInteger("chercheur_id");
            $table->foreign("chercheur_id")->references("id")->on("chercheurs");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_recherches', function (Blueprint $table) {
            //
        });
    }
};

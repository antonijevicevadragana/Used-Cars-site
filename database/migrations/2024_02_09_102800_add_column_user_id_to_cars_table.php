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
        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(true)->after('id');

            // Dodavanje stranog ključ na kolonu 'destination_id' koji referencira 'id' kolonu u tabeli 'destinations'
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']); // Ovako se brise strani ključ
            $table->dropColumn('user_id'); //nakon brisanja stranog kljuca se birse kolona
        });
    }
};

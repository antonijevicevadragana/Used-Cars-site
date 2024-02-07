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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brend');
            $table->string('model');
            $table->string('mileage');
            $table->string('engineDisplacement');
            $table->string('AvgFuelConsumption');
            $table->year('year');
            $table->string('category');
            $table->string('city');
            $table->string('fuel');
            $table->string('transmission');
            $table->string('NumberOfDoors'); //nece biti int zbog upisa 4/5 i sl.
            $table->integer('NumberOfSeats');
            $table->string('airCondition');
            $table->string('color');
            $table->string('registration');
            $table->string('demage');
            $table->string('fixPrice');
            $table->integer('price');
            $table->longText('descript'); 
            $table->string('cover_img'); 
            $table->timestamps();
             
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nyilvantartas', function (Blueprint $table) {
            $table->id('DolgozoID');
            $table->string('Keresztnev');
            $table->string('Vezeteknev');
            $table->date('Szuletesi_datum');
            $table->string('Anyja_neve')->nullable();
            $table->string('Tajszam', 11)->nullable();
            $table->string('Adoszam', 20)->nullable();
            $table->string('Bankszamlaszam', 24)->nullable();
            $table->string('Alapber');
            $table->string('Email')->nullable();
            $table->string('Telefonszam', 20)->nullable();
            $table->string('Munkakor')->nullable();
            $table->string('Qrcode')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('nyilvantartas');
    }
};
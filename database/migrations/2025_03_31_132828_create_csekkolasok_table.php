<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('csekkolasok', function (Blueprint $table) {
            $table->id('CsekkolasID');
            $table->unsignedBigInteger('az_id');
            $table->string('Vezeteknev');
            $table->string('Keresztnev');
            $table->string('Datum_Be');
            $table->string('Datum_Ki')->nullable();
            $table->string('Kezdido');
            $table->string('Vegido')->nullable();
            $table->float('Ora')->nullable();
            $table->integer('Ber')->nullable();
            $table->integer('Bonusz')->nullable();
            $table->integer('Vegosszeg')->nullable();
            $table->boolean('Szamfejtve')->default(false);
            $table->timestamps();
            $table->foreign('az_id')
                  ->references('DolgozoID')
                  ->on('nyilvantartas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('csekkolasok');
    }
};

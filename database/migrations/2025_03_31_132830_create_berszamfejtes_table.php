<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berszamfejtes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('DolgozoID');
            $table->string('vezeteknev');
            $table->string('keresztnev');
            $table->date('honap');
            $table->integer('ber');
            $table->timestamps();
            $table->foreign('DolgozoID')->references('DolgozoID')->on('nyilvantartas')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('berszamfejtes');
    }
};
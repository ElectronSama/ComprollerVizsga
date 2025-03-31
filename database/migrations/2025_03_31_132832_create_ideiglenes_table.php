<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ideiglenes', function (Blueprint $table) {
            $table->integer('DolgozoID')->primary();
            $table->string('Nev');
            $table->string('Datum_Be');
            $table->string('Datum_Ki');
        });
    }
    public function down()
    {
        Schema::dropIfExists('ideiglenes');
    }
};
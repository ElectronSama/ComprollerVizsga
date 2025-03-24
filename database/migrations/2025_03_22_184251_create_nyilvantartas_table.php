<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNyilvantartasTable extends Migration
{
    /**
     * A tábla létrehozása.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nyilvantartas', function (Blueprint $table) {
            $table->bigIncrements('DolgozoID'); // AUTO_INCREMENT primary key
            $table->string('Keresztnev');
            $table->string('Vezeteknev');
            $table->date('Szuletesi_datum');
            $table->string('Anyja_neve')->nullable();
            $table->string('Tajszam', 11)->nullable();
            $table->string('Adoszam', 20)->nullable();
            $table->string('Bankszamlaszam', 24)->nullable();
            $table->string('Alapber');
            $table->text('Cim')->nullable();
            $table->string('Allampolgarsag')->nullable();
            $table->text('Tartozkodasi_hely')->nullable();
            $table->string('Szemelyigazolvany_szam', 20)->nullable();
            $table->string('Email')->nullable();
            $table->string('Telefonszam', 20)->nullable();
            $table->string('Munkakor')->nullable();
            $table->text('Megjegyzes')->nullable();
            $table->string('Qrcode')->nullable();
            $table->timestamps(); // created_at, updated_ats
        });
    }

    /**
     * A tábla visszaállítása.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nyilvantartas');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolgozo extends Model
{
    use HasFactory;

    protected $table = 'nyilvantartas';
    protected $primaryKey = 'DolgozoID';
    protected $fillable = [
        'Keresztnev', 'Vezeteknev', 'Szuletesi_datum', 'Anyja_neve', 'Tajszam',
        'Adoszam', 'Bankszamlaszam', 'Alapber', 'Email', 'Telefonszam', 
        'Munkakor', 'Qrcode'
    ];

    public $timestamps = true;
}


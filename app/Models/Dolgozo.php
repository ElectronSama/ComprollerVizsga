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
        'Keresztnev', 'Vezeteknev', 'Nem', 'Szuletesi_datum', 'Szuletesi_hely', 
        'Anyja_neve', 'Tajszam', 'Adoszam', 'Bankszamlaszam', 'Alapber', 'Email', 'Telefonszam', 
        'Irsz', 'Telepules', 'Utca_ut', 'Hazszam', 'Allampolgarsag', 
        'Tartozkodasi_hely', 'Muszak', 'Munkakor', 'Megjegyzes', 'Qrcode'
    ];
    public $timestamps = true;
}

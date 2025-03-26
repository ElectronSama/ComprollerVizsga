<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolgozo extends Model
{
    use HasFactory;

    protected $table = 'nyilvantartas';
    protected $primaryKey = 'DolgozoID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'Vezeteknev', 'Keresztnev', 'Munkakor', 'Szuletesi_datum',
        'Anyja_neve', 'Tajszam', 'Adoszam', 'Bankszamlaszam',
        'Alapber', 'Email', 'Telefonszam', 'Qrcode'
    ];
}



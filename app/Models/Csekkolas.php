<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csekkolas extends Model
{
    use HasFactory;

    protected $table = 'csekkolasok';
    protected $primaryKey = 'CsekkolasID';
    protected $fillable = [
        'az_id',
        'Vezeteknev',
        'Keresztnev',
        'Datum_Be',
        'Datum_Ki',
        'Kezdido',
        'Vegido',
        'Bonusz',
        'Ber',
        'Vegosszeg',
        'Szamfejtve',
    ];
    public $timestamps = true;
}
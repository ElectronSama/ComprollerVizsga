<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csekkolas extends Model
{
    use HasFactory;

    protected $table = 'csekkolasok';
    protected $primaryKey = 'DolgozoID';
    protected $fillable = [
        'Vezeteknev', 'Keresztnev', 'Datum_Be', 'Datum_Ki', 'Bonusz', 'Ber', 'Vegosszeg'
    ];
    public $timestamps = true;
}
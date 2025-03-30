<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berszamfejtes extends Model
{
    protected $table = "berszamfejtes";

    protected $fillable = [
        'DolgozoID',
        'vezeteknev',
        'keresztnev',
        'honap',
        'ber',
    ];

    public $timestamps = true;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Esemeny extends Model
{
    use HasFactory;

    protected $table = 'esemenyek';
    protected $primaryKey = 'id';
    protected $fillable = [
        'datum', 'esemeny_neve'
    ];
    public $timestamps = true;
}

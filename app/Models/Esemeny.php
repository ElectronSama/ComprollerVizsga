<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

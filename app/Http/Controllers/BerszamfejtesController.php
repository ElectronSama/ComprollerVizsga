<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;
use App\Models\Berszamfejtes;
use App\Models\Csekkolas;
use Illuminate\Support\Facades\DB;

class BerszamfejtesController extends Controller
{public function keres(Request $request)
    {
        $keres = $request->input('query');
    
        // Dolgozók keresése (ha van keresési feltétel)
        $dolgozok = Dolgozo::when($keres, function ($query, $keres) {
            return $query->where('DolgozoID', 'like', "%$keres%")
                         ->orWhere('Vezeteknev', 'like', "%$keres%")
                         ->orWhere('Keresztnev', 'like', "%$keres%")
                         ->orWhere('Munkakor', 'like', "%$keres%");
        })->get();
    
        // Csekkolások és bérszámfejtések lekérése
        $osszescsekkolasok = DB::table('csekkolasok')
            ->where('Szamfejtve', 0)
            ->get();
            
        // Számítsuk ki a teljes összeget
        $csekkolasokosszeg = DB::table('csekkolasok')
            ->where('Szamfejtve', false)
            ->sum('Vegosszeg');
            
        $szamfejtesek = DB::table('berszamfejtes')->get();
    
        // Nézet visszaadása az adatokkal
        return view('berszamfejtes', compact('dolgozok', 'osszescsekkolasok', 'szamfejtesek', 'csekkolasokosszeg'));
    }
}

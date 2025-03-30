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
    
    public function create(Request $request)
    {
        // Ha POST kérést kapunk, az adatokat rögzítjük
        if ($request->isMethod('post')) {
            // Adat validálása
            $request->validate([
                'ber' => 'required|numeric',
            ]);
    
            try {
                DB::beginTransaction();
    
                // Lekérjük az első nem számfejtett csekkolást, hogy megkapjuk a dolgozó adatait
                $elsoNemSzamfejtettCsekkolas = DB::table('csekkolasok')
                    ->where('Szamfejtve', false)
                    ->first();
    
                if (!$elsoNemSzamfejtettCsekkolas) {
                    return redirect()->route('payroll-calculation')
                        ->with('error', 'Nincs számfejtendő csekkolás!');
                }
    
                // Rekord hozzáadása a berszamfejtes táblába
                Berszamfejtes::create([
                    'DolgozoID' => $elsoNemSzamfejtettCsekkolas->az_id,
                    'vezeteknev' => $elsoNemSzamfejtettCsekkolas->Vezeteknev,
                    'keresztnev' => $elsoNemSzamfejtettCsekkolas->Keresztnev,
                    'honap' => date('Y-m-d'), // Az aktuális dátum
                    'ber' => $request->ber,
                ]);
    
                // Csekkolások frissítése Szamfejtve = true értékre
                Csekkolas::where('Szamfejtve', false)
                         ->update(['Szamfejtve' => true]);
                DB::commit();
    
                return redirect()->route('payroll-calculation')
                               ->with('success', 'A számfejtés sikeresen létrejött és a csekkolások frissítve lettek!');
    
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('payroll-calculation')
                               ->with('error', 'Hiba történt a számfejtés során: ' . $e->getMessage());
            }
        }
    
        // GET kérelem esetén a formot jelenítjük meg
        return view('payroll-calculation.create');
    }
    
    
}

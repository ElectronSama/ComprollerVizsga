<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;
use App\Models\Berszamfejtes;
use App\Models\Csekkolas;
use Illuminate\Support\Facades\DB;

class BerszamfejtesController extends Controller
{
    public function keres(Request $request)
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
        if ($request->isMethod('post')) {
            $request->validate([
                'ber' => 'required|numeric',
                'selectedDolgozoID' => 'required|integer', // ezt is validáld!
            ]);
    
            try {
                DB::beginTransaction();
    
                // A beküldött dolgozó ID
                $dolgozoID = $request->input('selectedDolgozoID');
    
                // Lekérjük az első nem számfejtett csekkolást ettől a dolgozótól
                $elsoNemSzamfejtettCsekkolas = DB::table('csekkolasok')
                    ->where('Szamfejtve', false)
                    ->where('az_id', $dolgozoID)
                    ->first();
    
                if (!$elsoNemSzamfejtettCsekkolas) {
                    return redirect()->route('payroll-calculation')
                        ->with('error', 'Nincs számfejtendő csekkolás ehhez a dolgozóhoz!');
                }
    
                // Rekord létrehozása a berszamfejtes táblában
                Berszamfejtes::create([
                    'DolgozoID' => $elsoNemSzamfejtettCsekkolas->az_id,
                    'vezeteknev' => $elsoNemSzamfejtettCsekkolas->Vezeteknev,
                    'keresztnev' => $elsoNemSzamfejtettCsekkolas->Keresztnev,
                    'honap' => date('Y-m-d'),
                    'ber' => $request->ber,
                ]);
    
                // Csak ennek a dolgozónak a csekkolásait frissítjük
                Csekkolas::where('Szamfejtve', false)
                         ->where('az_id', $dolgozoID)
                         ->update(['Szamfejtve' => true]);
    
                DB::commit();
    
                return redirect()->route('payroll-calculation')
                    ->with('success', 'A dolgozó számfejtése sikeresen megtörtént!');
    
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('payroll-calculation')
                    ->with('error', 'Hiba történt a számfejtés során: ' . $e->getMessage());
            }
        }
    
        return view('payroll-calculation.create');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;
use DB;

class DolgozoController extends Controller
{
    public function post(Request $request)
    {
        // Validáció
        $request->validate([
            'Vezeteknev' => 'required',
            'Keresztnev' => 'required',
            'Munkakor' => 'required',
            'Szuletesi_datum' => 'required|date',
            'Anyja_neve' => 'nullable|string',
            'Tajszam' => 'nullable|string|max:11',
            'Adoszam' => 'nullable|string|max:20',
            'Bankszamlaszam' => 'nullable|string|max:24',
            'Alapber' => 'required|numeric',
            'Cim' => 'nullable|string',
            'Allampolgarsag' => 'nullable|string|max:100',
            'Tartozkodasi_hely' => 'nullable|string',
            'Szemelyigazolvany_szam' => 'nullable|string|max:20',
            'Email' => 'nullable|email',
            'Telefonszam' => 'nullable|string|max:20',
            'Qrcode' => 'nullable|string',
        ]);
    
        // Új dolgozó rögzítése
        $dolgozo = new Dolgozo();
        $dolgozo->Vezeteknev = $request->Vezeteknev;
        $dolgozo->Keresztnev = $request->Keresztnev;
        $dolgozo->Szuletesi_datum = $request->Szuletesi_datum;
        $dolgozo->Anyja_neve = $request->Anyja_neve;
        $dolgozo->Tajszam = $request->Tajszam;
        $dolgozo->Adoszam = $request->Adoszam;
        $dolgozo->Bankszamlaszam = $request->Bankszamlaszam;
        $dolgozo->Alapber = $request->Alapber;
        $dolgozo->Cim = $request->Cim;
        $dolgozo->Allampolgarsag = $request->Allampolgarsag;
        $dolgozo->Tartozkodasi_hely = $request->Tartozkodasi_hely;
        $dolgozo->Szemelyigazolvany_szam = $request->Szemelyigazolvany_szam;
        $dolgozo->Email = $request->Email;
        $dolgozo->Telefonszam = $request->Telefonszam;
        $dolgozo->Munkakor = $request->Munkakor;
        $dolgozo->Megjegyzes = $request->Megjegyzes;
        $dolgozo->Qrcode = $request->Qrcode;
    
        // Mentés az adatbázisba
        try {
            $dolgozo->save();
            return redirect('/dashboard')->with('success', 'Dolgozó sikeresen rögzítve!');
        } catch (\Exception $e) {
            // Hiba esetén vissza a formhoz
            return redirect()->back()->with('error', 'Hiba történt a dolgozó mentése közben: ' . $e->getMessage());
        }
    }
}
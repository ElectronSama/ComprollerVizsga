<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;
use DB;

class DolgozoController extends Controller
{

    public function destroy($id) // Dolgozó kitörlése id alapján.
    {
        $dolgozo = Dolgozo::find($id);

        if ($dolgozo) 
        {
            $dolgozo->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'A dolgozó nem található!'], 404);
    }

    public function show($id) // Dolgozó megjelenítése id alapján.
    {
        $dolgozo = Dolgozo::find($id);

        if ($dolgozo) 
        {
            return response()->json([
                'success' => true,
                'dolgozo' => $dolgozo,
            ]);
        } 
        else 
        {
            return response()->json([
                'success' => false,
                'message' => 'Dolgozó nem található.',
            ]);
        }
    }

    public function update(Request $request) // Dolgozó frissítése.
    {
        $dolgozo = Dolgozo::find($request->id); // id alapján.
        if (!$dolgozo) 
        {
            return response()->json(['success' => false, 'error' => 'Dolgozó nem található!']);
        }
    
        $dolgozo->Vezeteknev = $request->vezeteknev;
        $dolgozo->Keresztnev = $request->keresztnev;
        $dolgozo->Email = $request->email;
        $dolgozo->Telefonszam = $request->telefonszam;
        $dolgozo->Munkakor = $request->munkakor;
        $dolgozo->Alapber = $request->alapber;
        $dolgozo->Szuletesi_datum = $request->szuletesi_datum;
        $dolgozo->Anyja_neve = $request->anyja_neve;
        $dolgozo->Tajszam = $request->tajszam;
        $dolgozo->Adoszam = $request->adoszam;
        $dolgozo->Bankszamlaszam = $request->bankszamlaszam;
        $dolgozo->Qrcode = $request->qrcode;
        $dolgozo->Munkakor = $request->munkakor;
        $dolgozo->save();
    
        return response()->json(['success' => true]);
    }

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
        $dolgozo->Email = $request->Email;
        $dolgozo->Telefonszam = $request->Telefonszam;
        $dolgozo->Munkakor = $request->Munkakor;
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
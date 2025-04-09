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
        $validatedData = $request->validate([
            'Vezeteknev' => 'required|string|max:255',
            'Keresztnev' => 'required|string|max:255',
            'Munkakor' => 'required|string|max:255',
            'Szuletesi_datum' => 'required|date',
            'Anyja_neve' => 'required|string|max:255',
            'Tajszam' => 'required|string|max:9',
            'Adoszam' => 'required|string|max:11',
            'Bankszamlaszam' => 'required|string|max:24',
            'Alapber' => 'required|numeric|min:0',
            'Email' => 'required|email|max:255',
            'Telefonszam' => 'required|string|max:12',
            'Qrcode' => 'required|string',
        ]);
    
        try {
            Dolgozo::create($validatedData);
            return redirect('/dashboard')->with('success', 'Dolgozó sikeresen rögzítve!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Kiírja a konkrét SQL hibát
        }
        
    }
    
}

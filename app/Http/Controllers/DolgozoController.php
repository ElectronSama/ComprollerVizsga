<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;
use Illuminate\Support\Facades\DB;


class DolgozoController extends Controller
{
    public function destroy($id)
    {
        $dolgozo = Dolgozo::find($id);

        if ($dolgozo) 
        {
            $dolgozo->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'A dolgozó nem található!'], 404);
    }

    public function show($id)
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

    public function update(Request $request) 
    {
        $dolgozo = Dolgozo::find($request->id);
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
        $dolgozo->Cim = $request->cim;
        $dolgozo->Allampolgarsag = $request->allampolgarsag;
        $dolgozo->Szemelyigazolvany_szam = $request->email;
        $dolgozo->Telefonszam = $request->telefonszam;
        $dolgozo->Munkakor = $request->munkakor;
        $dolgozo->Megjegyzes = $request->megjegyzes;
        $dolgozo->Tartozkodasi_hely = $request->tartozkodas;
        $dolgozo->save();
    
        return response()->json(['success' => true]);
    } 
    public function search(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $dolgozok = Dolgozo::where('DolgozoID', 'like', '%' . $query . '%')
                                ->orWhere('Vezeteknev', 'like', '%' . $query . '%')
                                ->orWhere('Keresztnev', 'like', '%' . $query . '%')
                                ->orWhere('Munkakor', 'like', '%' . $query . '%')
                                ->get();
        } else {
            $dolgozok = Dolgozo::all();
        }
        return view('berszamfejtes', compact('dolgozok'));
    }
    public function getDolgozoCsekkolas($id)
    {
        // Adatok lekérdezése az adott dolgozóhoz
        $csekkolasok = DB::table('csekkolasok')
            ->where('DolgozoID', $id)
            ->select('DolgozoID', 'Vezeteknev', 'Keresztnev', 'Datum_Be', 'Datum_Ki', 'Bonusz', 'Ber', 'Vegosszeg')
            ->get();
        return response()->json($csekkolasok);
    }
}

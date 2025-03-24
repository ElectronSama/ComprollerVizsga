<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CsekkolasController extends Controller
{
    public function csekkol(Request $request)
    {
        $request->validate([
            'qr_data' => 'required|string'
        ]);

        $qr_data = $request->input('qr_data');

        // Ellenőrzés: QR-kód szerepel-e a nyilvántartásban
        $dolgozo = DB::table('nyilvantartas')
            ->where('Qrcode', $qr_data)
            ->first();

        if (!$dolgozo) {
            return response()->json(['status' => 'Érvénytelen QR-kód!'], 400);
        }

        $dolgozo_id = $dolgozo->DolgozoID;

        // Ellenőrzés: Van-e már nyitott belépés
        $existingEntry = DB::table('csekkolasok')
            ->where('DolgozoID', $dolgozo_id)
            ->whereNull('Datum_Ki')
            ->orderBy('Datum_Be', 'desc')
            ->first();

        if ($existingEntry) {
            // Kilépés rögzítése
            DB::table('csekkolasok')
                ->where('id', $existingEntry->id)
                ->update(['Datum_Ki' => now()]);

            return response()->json(['status' => 'Sikeres kilépés!']);
        } else {
            // Belépés rögzítése
            DB::table('csekkolasok')->insert([
                'DolgozoID' => $dolgozo->DolgozoID,
                'Vezeteknev' => $dolgozo->Vezeteknev,
                'Keresztnev' => $dolgozo->Keresztnev,
                'Datum_Be' => now()
            ]);

            return response()->json(['status' => 'Sikeres belépés!']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CsekkolasController extends Controller
{
    public function csekkolas(Request $keres)
    {
        $keres->validate([
            'qr_data' => 'required|string'
        ]);

        $qr_data = $keres->input('qr_data');

        // Ellenőrizzük, hogy a QR-kód szerepel-e az adatbázisban
        $dolgozo = DB::table('nyilvantartas')
            ->where('Qrcode', $qr_data)
            ->first();

        if (!$dolgozo) {
            return response()->json([
                'status' => 'Érvénytelen QR-kód!',
                'redirect' => url('/camera')], 400);
        }

        $dolgozo_id = $dolgozo->DolgozoID;

        // Megnézzük, hogy van-e már nyitott belépés
        $existingEntry = DB::table('csekkolasok')
            ->where('az_id', $dolgozo_id)
            ->whereNull('Datum_Ki')
            ->orderBy('Datum_Be', 'desc')
            ->first();

        try {
            if ($existingEntry) {
                // Ha van nyitott belépés, akkor most kilépés történik
                $ora = Carbon::parse($existingEntry->Kezdido)->diffInHours(Carbon::now());
                $ber = $dolgozo->Alapber * $ora;

                // Éjszakai bónusz számítása (ha 18:00 és 06:00 között dolgozott)
                $kezdIdoOra = Carbon::parse($existingEntry->Kezdido)->hour;
                $bonusz = ($kezdIdoOra >= 18 || $kezdIdoOra <= 6) ? ($ber * 0.3) : 0;

                $vegosszeg = $ber + $bonusz;

                DB::table('csekkolasok')
                    ->where('CsekkolasID', $existingEntry->CsekkolasID)
                    ->update([
                        'Datum_Ki' => Carbon::now()->format('Y-m-d'),
                        'Vegido' => Carbon::now()->format('H:i'),
                        'Ora' => $ora,
                        'Ber' => $ber,
                        'Bonusz' => $bonusz,
                        'Vegosszeg' => $vegosszeg,
                    ]);

                return redirect('/camera')->with('status', 'Sikeres kilépés!');
            } else {
                // Ha nincs nyitott belépés, akkor belépést rögzítünk
                DB::table('csekkolasok')->insert([
                    'az_id' => $dolgozo->DolgozoID,
                    'Vezeteknev' => $dolgozo->Vezeteknev,
                    'Keresztnev' => $dolgozo->Keresztnev,
                    'Datum_Be' => Carbon::now()->format('Y-m-d'), 
                    'Datum_Ki' => null,
                    'Kezdido' => Carbon::now()->format('H:i'),
                    'Vegido' => null,
                ]);

                return redirect('/camera')->with('status', 'Sikeres belépés!');
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'Hiba történt!', 'error' => $e->getMessage()], 500);
        }
    }
}

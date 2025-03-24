<?php

namespace App\Http\Controllers;

use App\Models\Dolgozo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeresesController extends Controller
{
    /**
     * Keresés dolgozók között.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function keres(Request $request)
    {
        $keres = $request->input('query');
        
        if ($keres) {
            $dolgozok = Dolgozo::where('DolgozoID', 'like', '%' . $keres . '%')
                                ->orWhere('Vezeteknev', 'like', '%' . $keres . '%')
                                ->orWhere('Keresztnev', 'like', '%' . $keres . '%')
                                ->orWhere('Munkakor', 'like', '%' . $keres . '%')
                                ->get();
        } else {
            $dolgozok = Dolgozo::all();
        }
    
        return view('berszamfejtes', compact('dolgozok'));
    }
    public function getDolgozoCsekkolas($id)
    {
        $csekkolasok = DB::table('csekkolasok')
            ->where('DolgozoID', $id)
            ->select('DolgozoID', 'Vezeteknev', 'Keresztnev', 'Datum_Be', 'Datum_Ki', 'Bonusz', 'Ber', 'Vegosszeg')
            ->get();
        return response()->json($csekkolasok);
    }
}

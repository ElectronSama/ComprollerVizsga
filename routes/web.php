<?php

use Carbon\Traits\Difference;
use Illuminate\Bus\UpdatedBatchJobCounts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolgozoController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Csekkolas;
use App\Models\Esemeny;
use Carbon\Carbon;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Hash;


// Főoldal //
Route::get('/', function () {
    return view('welcome');
});

// Oldalak //
Route::view('/contact', 'kapcsolat');
Route::view('/profile', 'profil');
Route::view('/dashboard', 'iranyitopult');
Route::view('/events', 'esemenyek');
Route::view('/worktime', 'munkaido');
Route::view('/payroll-calculation', 'berszamfejtes');
Route::view('/camera', 'kamera');
Route::view('/register', 'regisztracio');
Route::view('/error', 'hiba');
Route::get('/api/chart-data', [ChartController::class, 'getChartData']);
Route::get('/get-job-titles', [WorkController::class, 'getJobTitles']);
Route::get('/payroll-calculation/kereses', [DolgozoController::class, 'search'])->name('dolgozok.kereses');
Route::get('/api/dolgozo/{id}/csekkolas', [DolgozoController::class, 'getDolgozoCsekkolas']);


// Nyilvántartás lista //
Route::get('/registry', function () {
    $Dolgozok = DB::table('nyilvantartas')->get();
    return view('nyilvantartas', ['Dolgozok' => $Dolgozok]);
})->name('registry.index');

// Munkaidő lista //
Route::get('/worktime', function () {
    $Csekkolasok = DB::table('csekkolasok')->get();
    return view('munkaido', ['Csekkolasok' => $Csekkolasok]);
})->name('worktime.index');

// Bérszámfejtés //

Route::get('/payroll-calculation', function (Request $request) {
    // A keresési kulcs lekérése
    $query = $request->input('query');

    // Ha van keresési kulcs, akkor az adatokat több mező alapján szűrjük
    if ($query) {
        // Ha van keresési kulcs, keresünk a dolgozók között
        $dolgozok = DB::table('nyilvantartas')
            ->where('dolgozo_id', 'like', '%' . $query . '%')
            ->orWhere('vezeteknev', 'like', '%' . $query . '%')
            ->orWhere('keresztnev', 'like', '%' . $query . '%')
            ->orWhere('munkakor', 'like', '%' . $query . '%')
            ->get();
    } else {
        // Ha nincs keresési kulcs, akkor minden dolgozót visszaadunk
        $dolgozok = DB::table('nyilvantartas')->get();
    }

    // Az adatok átadása a nézetnek
    return view('berszamfejtes', ['dolgozok' => $dolgozok, 'query' => $query]);
});


// Nyilvántartás új dolgozó hozzáadása //
Route::post('/registry', function (Request $request) {
    $validatedData = $request->validate([
        'Keresztnev' => 'required|string|max:255',
        'Vezeteknev' => 'required|string|max:255',
        'Szuletesi_datum' => 'required|date',
        'Anyja_neve' => 'required|string|max:255',
        'Tajszam' => 'required|string|max:255',
        'Adoszam' => 'required|string|max:255',
        'Bankszamlaszam' => 'nullable|string|max:255',
        'Alapber' => 'nullable|string|max:255',
        'Cim' => 'required|string|max:255',
        'Allampolgarsag' => 'required|string|max:255',
        'Tartozkodasi_hely' => 'nullable|string|max:255',
        'Szemelyigazolvany_szam' => 'required|string|max:255',
        'Email' => 'required|email|max:255',
        'Telefonszam' => 'required|string|max:255',
        'Munkakor' => 'required|string|max:255',
        'Megjegyzes' => 'nullable|string|max:255',
        'Qrcode' => 'nullable|string|max:255'
    ]);

    // Állítsd be a Bankszamlaszam és Megjegyzés mezőt üres stringre, ha üres
    $validatedData['Bankszamlaszam'] = $validatedData['Bankszamlaszam'] ?? '';
    $validatedData['Tartozkodasi_hely'] = $validatedData['Tartozkodasi_hely'] ?? '';
    $validatedData['Megjegyzes'] = $validatedData['Megjegyzes'] ?? '';
    $validatedData['Qrcode'] = $validatedData['Qrcode'] ?? '';

    $validatedData['created_at'] = Carbon::now();
    $validatedData['updated_at'] = Carbon::now();

    DB::table('nyilvantartas')->insert($validatedData);

    return redirect()->route('registry.index')->with('success', 'Dolgozó sikeresen hozzáadva.');
})->name('registry.store');



// Irányítópult //
Route::get('/dashboard', function () {
    $Dolgozok = DB::table('nyilvantartas')->orderBy('DolgozoID', 'desc')->limit(5)->get();
    $Esemenyek = DB::table('esemenyek')->orderBy('id', 'desc')->limit(5)->get();
    $Osszesmunkakor = DB::table('nyilvantartas')->distinct()->count('Munkakor');
    $Dolgozokszama = DB::table('nyilvantartas')->count();
    return view('iranyitopult', ['Dolgozok' => $Dolgozok, 'Dolgozokszama' => $Dolgozokszama, 'Esemenyek' => $Esemenyek,'Osszesmunkakor' => $Osszesmunkakor]);
});

// Dolgozók kezelése //
Route::get('/dolgozok', [DolgozoController::class, 'index']);
Route::get('/dolgozok/{id}', [DolgozoController::class, 'show']);
Route::delete('/dolgozok/{id}', [DolgozoController::class, 'destroy'])->name('dolgozok.destroy');

// Admin jogosultság //
Route::post('/api/set-admin-session', function (Request $request) {
    if ($request->admin === true) {
        session(['isAdmin' => true]);
    }
    return response()->json(['message' => 'Session frissítve.']);
});

// Kijelentkezés //
Route::post('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');

Route::post('/dolgozok/update', [DolgozoController::class, 'update']);

// Csekkolás //
Route::post('/camera', function (Request $request) {
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
            ->update([
                'Datum_Ki' => now(),
                'Ora' => number_format((float)Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now())), 2),
                'Ber' => $dolgozo->Alapber ? (int)((float)$dolgozo->Alapber * Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now()))) : 0,
                'Bonusz' => ((Carbon::parse($existingEntry->Datum_Be)->format('H:i:s') >= '18:00:00' && Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now())) >= 4) || 
                            (Carbon::parse($existingEntry->Datum_Be)->format('H:i:s') <= '06:00:00' && Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now())) >= 4))
                    ? (int)($dolgozo->Alapber * Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now())) * 0.3) 
                    : 0,
                'Vegosszeg' => (int)($dolgozo->Alapber * Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now()))) + 
                              (((Carbon::parse($existingEntry->Datum_Be)->format('H:i:s') >= '18:00:00' && Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now())) >= 4) || 
                                (Carbon::parse($existingEntry->Datum_Be)->format('H:i:s') <= '06:00:00' && Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now())) >= 4))
                                ? (int)($dolgozo->Alapber * Carbon::parse($existingEntry->Datum_Be)->diffInHours(Carbon::parse(now())) * 0.3) 
                                : 0),
        ]);
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
        });



// Manuális csekkolás (érkezés vagy távozás rögzítése)
Route::post('/worktime', function (Request $request) {
    $validatedData = $request->validate([
        'DolgozoID' => 'required|integer',
        'Vezeteknev' => 'required|string|max:255',
        'Keresztnev' => 'required|string|max:255',
        'Datum_Be' => 'required|date',
        'Datum_Ki' => 'nullable|date'
    ]);

    // Megnézzük, hogy van-e már csekkolás az adott napon a dolgozónak
    $existingCheck = DB::table('csekkolasok')
        ->where('DolgozoID', $validatedData['DolgozoID'])
        ->whereDate('Datum_Be', date('Y-m-d', strtotime($validatedData['Datum_Be'])))
        ->first();

    if ($existingCheck) {
        // Ha már létezik bejegyzés és van megadva távozási időpont, frissítjük
        if (!empty($validatedData['Datum_Ki'])) {
            DB::table('csekkolasok')
                ->where('id', $existingCheck->id)
                ->update(['Datum_Ki' => $validatedData['Datum_Ki']]);

            return redirect()->route('worktime.index')
                ->with('success', 'Távozási időpont sikeresen frissítve.');
        } else {
            return redirect()->route('worktime.index')
                ->with('error', 'Már van rögzített érkezés erre a napra. Ha távozni szeretnél, add meg a távozási időt.');
        }
    } else {
        // Ha nincs ilyen rekord, új bejegyzés létrehozása
        DB::table('csekkolasok')->insert($validatedData);

        return redirect()->route('worktime.index')
            ->with('success', 'Munkaidő sikeresen rögzítve.');
    }
})->name('worktime.store');

// Profil készítése //
Route::post('/register', function (Request $request) {
    $validatedData = $request->validate([
        'felhasznalonev' => 'required|string|max:255',
        'szerep' => 'required|string|max:255',
        'jelszo' => 'required|string|max:255',
    ]);
    $existingCheck = DB::table('felhasznalok')
        ->where('felhasznalonev', $validatedData['felhasznalonev'])
        ->first();
        if ($existingCheck) {
            if (!empty($validatedData['felhasznalonev'])) {
                DB::table('felhasznalok')
                    ->where('id', $existingCheck->id)
                    ->update(['felhasznalonev' => $validatedData['felhasznalonev']]);
            } else {
                return redirect()->route('profile')
                    ->with('error', 'Már van ilyen felhasználó.');
            }
        } else {
            DB::table('felhasznalok')->insert($validatedData);
            return redirect()->route('profile')
                ->with('success', 'Felhasználó sikeresen létrehozva.');
        }
    })->name('register.store');

// Felhasználónév frissítése //
Route::post('/profile/username', function (Request $request) {
    $validatedData = $request->validate([
        'felhasznalonev'=> 'required|string|max:255',
        'jelszo' => 'required|string|max:255',
    ]);

    $validatedData['jelszo'] = Hash::make($validatedData['jelszo']);

    $existingCheck = DB::table('felhasznalok')
        ->where('felhasznalonev', $validatedData['felhasznalonev'])
        ->where('id', '!=', $request->id)
        ->first();

    if ($existingCheck) {
        return redirect()->route('profile')
            ->with('error', 'Már van ilyen felhasználó.');
    }

    DB::table('felhasznalok')
        ->where('id', $request->id)
        ->update([
            'felhasznalonev' => $validatedData['felhasznalonev'],
            'jelszo' => $validatedData['jelszo']
        ]);

    return redirect()->route('profile')
        ->with('success', 'Profil sikeresen frissítve.');
})->name('profile.store');

// Jelszó frissítése //
Route::post('/profile/password', function (Request $request) {
    $validatedData = $request->validate([
        'jelszo' => 'required|string|max:255',
    ]);
    $validatedData['jelszo'] = Hash::make($validatedData['jelszo']);

    DB::table('felhasznalok')
        ->where('id', $request->id)
        ->update([
            'jelszo' => $validatedData['jelszo']
        ]);

    return redirect()->route('profile')
        ->with('success', 'Jelszó sikeresen frissítve.');
})->name('profile.store');
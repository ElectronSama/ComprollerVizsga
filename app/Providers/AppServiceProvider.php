<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Dolgozo;
use DB;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Minden nézethez hozzáadjuk ezeket a változókat
        View::composer('*', function ($view) {
            $Dolgozokszama = Dolgozo::count();
            $Dolgozok = Dolgozo::all();
            $Osszesmunkakor = DB::table('nyilvantartas')->distinct()->count('Munkakor');
            $Esemenyek = DB::table('esemenyek')->get();
            $Csekkolasok = DB::table('csekkolasok')->get();

            $view->with([
                'Dolgozok' => $Dolgozok,
                'Dolgozokszama' => $Dolgozokszama,
                'Osszesmunkakor' => $Osszesmunkakor,
                'Esemenyek' => $Esemenyek,
                'Csekkolasok' => $Csekkolasok,
            ]);
        });
    }
}

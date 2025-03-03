<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;

class ChartController extends Controller
{
    public function getChartData()
    {
        // Az adatok összegyűjtése hónapokra bontva
        $data = Dolgozo::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year) // Csak az aktuális év adatait vesszük
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Hónapok nevei
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Hónapokhoz rendelni a dolgozók számát (ha nincs adat, akkor 0-t adunk hozzá)
        $yValues = [];
        for ($i = 1; $i <= 12; $i++) {
            $yValues[] = $data[$i] ?? 0;
        }

        // Kiszámolni a leg több dolgozót regisztráló hónapot
        $maxCount = max($yValues);
        $maxMonthIndex = array_search($maxCount, $yValues);
        $maxMonth = $months[$maxMonthIndex];

        return response()->json([
            'labels' => $months,
            'data' => $yValues,
            'maxMonth' => $maxMonth, // A hónap neve, ahol a leg több dolgozó regisztrált
            'maxCount' => $maxCount  // A regisztrált dolgozók maximális száma
        ]);
    }
}

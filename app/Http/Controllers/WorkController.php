<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;

class WorkController extends Controller
{
    public function getJobTitles() // Munkakör címeinek kikérése.
    {
        $jobTitles = Dolgozo::pluck('munkakor');
        return response()->json($jobTitles);
    }
}

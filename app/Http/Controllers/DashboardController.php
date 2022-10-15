<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $tot = DB::select(' select id_cabang, sum(total) as total from transaction group by id_cabang');
        // dd($tot);
        return view('dashboard', compact('tot'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SuplierController extends Controller
{
    public function index()
    {
        $data = DB::table('supliers')->paginate(10);

        return view('suplier.index', compact('data'));
    }
    public function proses_add_suplier(Request $request)
    {
        $data = suplier::create($request->all());
        Alert::success('Suplier Berhasil Di Tambah');
        return redirect()->route('suplier', compact('data'));
    }
}

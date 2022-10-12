<?php

namespace App\Http\Controllers;

use App\Models\satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SatuanController extends Controller
{
    public function index()
    {
        $data = DB::table('satuans')->paginate(10);
        return view('satuan.index', compact('data'));
    }
    public function proses_add_satuan(Request $request)
    {
        // $data = satuan::create($request->all());
        // Alert::success('Satuan Berhasil Di Tambah');
        $data = $request->only('id', 'nama_satuan', 'nama_asli');
        $test['token'] = time();
        $test['data'] = json_encode($data);
        // dd($test);
        satuan::insert($test);
        return redirect()->route('satuan', compact('data'));
    }
    public function search_satuan(Request $request)
    {
        $keywoard = $request->search;
        $data = satuan::where('nama_satuan', 'like', '%' . $keywoard . '%')->paginate(10);
        return view('satuan.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

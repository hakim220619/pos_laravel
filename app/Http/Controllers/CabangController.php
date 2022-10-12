<?php

namespace App\Http\Controllers;

use App\Models\cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabangController extends Controller
{
    public function index()
    {
        $data = DB::table('cabangs')->paginate(5);
        return view('cabang.index', compact('data'));
    }
    public function search_cabang(Request $request)
    {
        $keyword = $request->search;
        $data = cabang::where('nama_cabang', 'like', "%" . $keyword . "%")->paginate(5);
        return view('cabang.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function proses_add_cabang(Request $request)
    {
        $data = cabang::create($request->all());
        return redirect()->route('cabang', compact('data'));
    }
}

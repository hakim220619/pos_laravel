<?php

namespace App\Http\Controllers;

use App\Models\cabang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
        // $data = cabang::create($request->all());
        $data = DB::table('cabangs')->insert([
            'id_cabang' => $request->id_cabang,
            'nama_cabang' => $request->nama_cabang,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('cabang', compact('data'));
    }
    public function proses_edit_cabang(Request $request)
    {
        // dd($request->all());
        DB::table('cabangs')
            ->where("id", $request->id)
            ->update(['nama_cabang' => $request->nama_cabang, 'alamat' => $request->alamat]);
        alert()->success('Berhasil!!!', 'Cabang Berhasil DIUbah');
        return redirect()->route('cabang');
    }
    public function delete_cabang($id)
    {
        try {
            // dd($id);
            DB::table('cabangs')->where('id', $id)->delete();
            Alert::success('Cabang Berhasil DiHapus');
            return redirect()->route('cabang');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}

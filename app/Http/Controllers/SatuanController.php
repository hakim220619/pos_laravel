<?php

namespace App\Http\Controllers;

use App\Models\satuan;
use Exception;
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
        $data = satuan::create($request->all());
        Alert::success('Satuan Berhasil Di Tambah');
        return redirect()->route('satuan', compact('data'));
    }
    public function search_satuan(Request $request)
    {
        $keywoard = $request->search;
        $data = satuan::where('nama_satuan', 'like', '%' . $keywoard . '%')->paginate(10);
        return view('satuan.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function proses_edit_satuan(Request $request)
    {
        // dd($request->all());
        DB::table('satuans')
            ->where("id", $request->id)
            ->update(['nama_satuan' => $request->nama_satuan, 'nama_asli' => $request->nama_asli]);
        alert()->success('Berhasil!!!', 'Satuan Berhasil DI Ubah');
        return redirect()->route('satuan');
    }
    public function delete_satuan($id)
    {
        try {
            // dd($id);
            DB::table('satuans')->where('id', $id)->delete();
            Alert::success('Satuan Berhasil Di Hapus');
            return redirect()->route('satuan');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}

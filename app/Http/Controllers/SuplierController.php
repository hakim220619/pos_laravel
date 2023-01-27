<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Exception;
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
    public function proses_edit_suplier(Request $request)
    {
        // dd($request->all());
        DB::table('supliers')
            ->where("id", $request->id)
            ->update(['nama_suplier' => $request->nama_suplier, 'alamat_suplier' => $request->alamat_suplier, 'tlp' => $request->tlp]);
        alert()->success('Berhasil!!!', 'Suplier Berhasil dI Ubah');
        return redirect()->route('suplier');
    }
    public function delete_suplier($id)
    {
        try {
            // dd($id);
            DB::table('supliers')->where('id', $id)->delete();
            Alert::success('Suplier Berhasil di Hapus');
            return redirect()->route('suplier');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}

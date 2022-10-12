<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        $data = DB::table('kategoris')->paginate(10);
        return view('kategori.index', compact('data'));
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = Kategori::where('nama_kategori', 'like', "%" . $keyword . "%")->paginate(5);
        return view('kategori.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function proses_add_kategori(Request $request)
    {
        $data = Kategori::create($request->all());
        Alert::success('Kategori Berhasil Di Tambah');
        // dd($data);
        return redirect()->route('kategori', compact('data'));
    }
    public function proses_edit_kategori(Request $request)
    {
        // dd($request->all());
        DB::table('kategoris')
            ->where("id", $request->id)
            ->update(['nama_kategori' => $request->nama_kategori]);
        alert()->success('Berhasil!!!', 'Data Berhasil DI Ubah');
        return redirect()->route('kategori');
    }
    public function delete($id)
    {
        try {
            // dd($id);

            DB::table('kategoris')->where('id', $id)->delete();
            Alert::success('Kategori Berhasil Di Hapus');
            return redirect()->route('kategori');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}

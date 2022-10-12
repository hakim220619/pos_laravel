<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\cabang;
use App\Models\satuan;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{

    public function index()
    {
        // $access = DB::table('users')->get();
        // $get = $access['user_level'];
        // dd($get);
        $data = DB::table('products')->paginate(10);
        return view('product.index', compact('data'));
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = Product::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('pegawai.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function add_product()
    {
        $kategori = Kategori::select('id', 'nama_kategori')->get();
        $satuan = satuan::select('id', 'nama_satuan')->get();
        $cabang = DB::table('cabangs')->get();
        $suplier = DB::table('supliers')->get();
        // dd($cabang);
        return view('product.add_product', compact('kategori', 'satuan', 'cabang', 'suplier'));
    }
    public function proses_add_product(Request $request)
    {
        $data = Product::create($request->all());
        Alert::success('Product Berhasil Di Tambah');
        return redirect()->route('product', compact('data'));
    }
    public function selectkategori()
    {
        $kategori = Product::select('id', 'nama_kategori')->get();
        // dump($kategori);
        return view('pegawai.add_product', compact('kategori'));
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new ProductExport, 'Product-' . $date . '.xlsx');
    }
    public function exportcsv()
    {
        return Excel::download(new ProductExport, 'product.csv');
    }
}

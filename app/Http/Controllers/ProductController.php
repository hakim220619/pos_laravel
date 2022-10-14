<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\cabang;
use App\Models\satuan;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{

    public function index()
    {
        $kategori = Kategori::select('id', 'nama_kategori')->get();
        $satuan = satuan::select('id', 'nama_satuan')->get();
        $cabang = DB::table('cabangs')->get();
        $suplier = DB::table('supliers')->get();
        // dd($cabang);
        $data = DB::table('products')->paginate(10);
        return view('product.index', compact('data', 'kategori', 'satuan', 'cabang', 'suplier'));
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
    public function proses_edit_product(Request $request)
    {
        // dd($request->all());
        DB::table('products')->where('id', $request->id)->update([
            // 'id' => $request->id,
            'barcode' => $request->barcode,
            'kategori' => $request->nama_kategori,

            'harga_beli' => preg_replace("/[^0-9+\-Ee]/", "", $request->harga_beli),
            'harga_jual' => preg_replace("/[^0-9+\-Ee]/", "", $request->harga_jual),
            'profit' => preg_replace("/[^0-9+\-Ee]/", "", $request->profit),
            'stok' => $request->stok,
            'kode_penjualan' => $request->kode_penjualan,
            'kode_pembelian' => $request->kode_pembelian,
            'kategori' => $request->kategori,
            'id_cabang' => $request->id_cabang,
            'id_suplier' => $request->id_suplier,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
        ]);
        Alert::success('Product Berhasil Di Edit');
        return redirect()->route('product');
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
    public function delete_product($id)
    {
        try {
            // dd($id);

            DB::table('products')->where('id', $id)->delete();
            Alert::success('Product Berhasil Di Hapus');
            return redirect()->route('product');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }



    public function laporan_struck(Request $request)
    {
        $struck =  DB::select(DB::raw("select * from fix_detail_order where id_transaction = '$request->id_transaction' "));
        $total = DB::table('transaction')
            ->selectRaw('total, cash, cashback')
            ->where('id_transaction', $request->id_transaction)
            ->get();
        foreach ($total as $a) {
            $total_all = $a->total;
            $cash = $a->cash;
            $cashback = $a->cashback;
        }
        $user = DB::select('select name from users u left join transaction t on u.id=t.id_user where u.id = ' . $request->id_user . '');
        foreach ($user as $a) {
            $nama = $a->name;
        }
        return view('product.struck', compact('struck', 'total_all', 'cash', 'cashback', 'nama'));
    }
}

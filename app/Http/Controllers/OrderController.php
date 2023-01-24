<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Json;
use RealRashid\SweetAlert\Facades\Alert;


class OrderController extends Controller
{
    public function index()
    {
        $suplier = DB::table('supliers')->get();
        $id_cabang = Auth::user()->id_cabang;
        $name = Auth::user()->name;
        $id = Auth::user()->id;
        $user_level = Auth::user()->user_level;
        $data = DB::select("SELECT * FROM products WHERE id NOT IN (SELECT id_barang FROM `order`)");
        $order = DB::table('order')->get();
        return view('orders.index', compact('suplier', 'id_cabang', 'name', 'id', 'user_level', 'data', 'order'));
    }
    public function load_data()
    {
        $data = DB::table('order')->get();
        echo json_encode($data);
    }

    public function load_data_product()
    {
        $id_cabang = Auth::user()->id_cabang;
        $data = DB::select("SELECT * FROM products WHERE id_cabang = '$id_cabang' and id NOT IN (SELECT id_barang FROM `order`)");
        echo json_encode($data);
    }
    public function add_orders(request $request)
    {
        try {
            DB::table('order')->insert([
                'id_barang' => $request->id_barang,
                'nama_barang' => $request->nama_barang,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'satuan' => $request->satuan,
                'id_cabang' => $request->id_cabang,
                'id_user' => $request->id_user,
                'total' => $request->total,
            ]);
            $this->load_data();
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
    public function gettotal(Request $request)
    {
        try {
            $id_user = $request->id_user;
            $data = DB::table('order')->where('id_user', "$id_user")->sum('total');
            echo json_encode($data);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }

    public function add_orderdfix(Request $request)
    {
        try {
            $id_cabang = $request->id_cabang;
            $id_user = $request->id_user;
            $id_transaction = $request->id_transaction;
            $jumlah = preg_replace("/[^0-9+\-Ee]/", "", $request->jumlah);
            $cash = preg_replace("/[^0-9+\-Ee]/", "", $request->cash);
            $cashback = preg_replace("/[^0-9+\-Ee]/", "", $request->cashback);
            DB::table('transaction')->insert([
                'id_cabang' => $id_cabang,
                'id_user' => $id_user,
                'id_transaction' => $id_transaction,
                'total' => $jumlah,
                'cash' => $cash,
                'cashback' => $cashback,
            ]);
            $data = DB::table('order')->get();
            $getorder = [];
            foreach ($data as $a) {
                if (!empty($a)) {
                    $getorder[] = [
                        'id_transaction' => $id_transaction,
                        'id_barang' => $a->id_barang,
                        'id_cabang' => $a->id_cabang,
                        'id_user' => $a->id_user,
                        'nama_barang' => $a->nama_barang,
                        'kategori' => $a->kategori,
                        'harga' => $a->harga,
                        'jumlah' => $a->jumlah,
                        'total' => $a->total,
                        'satuan' => $a->satuan,
                    ];
                }
            }
            DB::table('fix_detail_order')->insert($getorder);
            $data1 = DB::table('order')->get();
            $getupdate = [];
            foreach ($data1 as $a) {
                if (!empty($a)) {
                    $getupdate[] = [
                        DB::update("UPDATE products SET stok = stok-'$a->jumlah' where id ='$a->id_barang'")
                    ];
                }
            }
            DB::table('order')->where('id_user', $id_user)->delete();
            $this->load_data();
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
    public function changejumlah(Request $request)
    {
        try {
            $id = $request->id;
            $id_barang = $request->id_barang;
            $jumlah_order = $request->jml_order;
            $total = $request->tot;
            $id_user = $request->id_user;
            DB::table('order')
                ->where('id', $id)
                ->update(['jumlah' => $jumlah_order, 'total' => $total]);
            $this->load_data();
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
    public function delete(Request $request)
    {
        DB::table('order')->where('id', $request['id'])->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product Berhasil diTambah',
        ]);
    }
    public function batal(Request $request)
    {
        try {
            DB::table('order')->where('id_user', $request['id_user'])->delete();
            return response()->json([
                'success' => true,
                'message' => 'Product Berhasil diTambah',
            ]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}

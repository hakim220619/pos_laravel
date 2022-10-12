<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $tabel = "products";
    public static function getProducts()
    {
        $records = DB::table('products')->select('id', 'nama_barang', 'kategori', 'harga_beli', 'harga_jual', 'profit', 'stok', 'satuan', 'id_cabang', 'id_suplier')->get();
        return $records;
    }
}

<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Nama Barang',
            'Kategori',
            'Harga Beli',
            'Harga Jual',
            'Profit',
            'Stok',
            'Satuan',
            'Cabang',
            'Suplier',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(Product::getProducts());
    }
}

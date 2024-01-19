<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'total_harga',
        'quantity',
        'harga',
    ];

    public function produk()
    {
        return $this->hasOne(ProdukModel::class, 'id_produk', 'id_produk');
    }
}

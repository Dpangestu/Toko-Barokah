<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_kategori',
        'nama_produk',
        'merk',
        'harga_beli',
        'diskon',
        'harga_jual',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
    }
}

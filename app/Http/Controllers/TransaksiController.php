<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('pages.toko.index', [
            'title' => 'Transaksi Toko',
            'active' => 'TransaksiT',
        ]);
    }

    public function create()
    {
        $produkList = ProdukModel::all();

        return view('pages.toko.create',  [
            'title' => 'Transaksi',
            'active' => 'TransaksiT',

            'produk' => $produkList
        ]);
    }
}
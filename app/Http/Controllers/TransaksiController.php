<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('pages.transaksi.index', [
            'title' => 'Transaksi',
            'active' => 'TransaksiT',
        ]);
    }
}
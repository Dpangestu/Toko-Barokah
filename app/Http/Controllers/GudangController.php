<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        return view('pages.gudang.index', [
            'title' => 'Gudang',
            'active' => 'TransaksiG',
        ]);
    }
}
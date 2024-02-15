<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Product;
use App\Models\Diskon;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = array(
            'data_transaksi' => Transaksi::all(),
        );

        return view('pages.transaksi.index', $data);
    }

    public function create()
    {
        $barang = Product::all();
        $data = array(
            'semuaBarang' => $barang,
        );

        return view('pages.transaksi.create', $data);
    }
}

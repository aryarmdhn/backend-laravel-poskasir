<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // get all
        $products = Product::all();
        // get per paginate 10
        // $products = Product::paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $products,
        ], 200);
    }
}

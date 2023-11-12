<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class CatalogController extends Controller
{
    public function index(Request $request) {
        $products = Products::all();

        return view("catalog", [
            "products" => $products
        ]);
    }
}

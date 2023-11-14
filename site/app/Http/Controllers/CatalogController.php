<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class CatalogController extends Controller
{
    public function index(Request $request) {
        $products = Products::all();

        return view("pages.catalog.catalog", [
            "products" => $products
        ]);
    }
}

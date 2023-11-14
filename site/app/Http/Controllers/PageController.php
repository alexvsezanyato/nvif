<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class PageController extends Controller
{
    public function index(Request $request) {
        $products = Products::all();

        return view("pages.main", [
            "products" => $products
        ]);
    }

    public function contacts() {
        return view("pages.contacts", [
            "hideSubmenu" => true
        ]);
    }
}

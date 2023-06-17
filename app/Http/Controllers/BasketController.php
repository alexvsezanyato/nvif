<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class BasketController extends Controller
{
    public function index(Request $request) {
        $basket = $request->session()->get("basket");

        if ($basket) $products = Products::find($basket);
        else $products = null;

        return view("basket", [
            "products" => $products,
        ]);
    }

    public function add(Request $request) {
        $productID = $request->post("product-id");

        if (!$productID) return false;

        $basket = $request->session()->get("basket");

        if (!$basket) $basket = [];

        if (!in_array($productID, $basket)) $basket[] = $productID;
        else return false;

        $request->session()->put("basket", $basket);

        return true;
    }

    public function remove(Request $request) {
        $productID = $request->post("product-id");
        if (!$productID) return false;

        $basket = $request->session()->get("basket");
        if (!$basket) return false;

        $index = array_search((string) $productID, $basket);
        if ($index === false) return false;

        unset($basket[$index]);

        $request->session()->put("basket", $basket);

        return true;
    }
}

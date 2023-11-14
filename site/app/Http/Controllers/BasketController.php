<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class BasketController extends Controller
{
    public function index(Request $request) {
        $basket = $request->session()->get("basket");
        $view = "pages.catalog.basket";

        if (!$basket) {
            return view($view, [
                "pageType" => "basket",
                "products" => [],
            ]);
        }

        $productIds = [];

        foreach ($basket as $basketItem) {
            $productIds[] = $basketItem["product-id"];
        }

        if ($productIds) $products = Products::find($productIds);
        else $products = [];

        return view($view, [
            "pageType" => "basket",
            "products" => $products,
        ]);
    }

    public function checkout(Request $request) {
        $products = $request->post("products");

        echo "<pre>";
        print_r($products);
        exit;
    }

    public function add(Request $request) {
        $productID = $request->post("product-id");
        if (!$productID) return $this->fail();

        $amount = $request->post("amount");
        if (!$amount) return $this->fail();

        $basket = $request->session()->get("basket");

        if (!$basket) $basket = [];

        $basket[$productID] = [
            "product-id" => $productID,
            "amount" => $amount,
        ];

        $request->session()->put("basket", $basket);
        return $this->success();
    }

    public function remove(Request $request) {
        $productID = $request->post("product-id");
        if (!$productID) return $this->fail();

        $basket = $request->session()->get("basket");
        if (!$basket) return $this->fail();

        if (!isset($basket[$productID])) return $this->fail();

        unset($basket[$productID]);
        $request->session()->put("basket", $basket);

        return $this->success();
    }

    private function fail() {
        return ["status" => false];
    }

    private function success() {
        $price = $this->getPrice();

        return [
            "status" => true,
            "price" => number_format($price, 0, ".", " "),
        ];
    }
}

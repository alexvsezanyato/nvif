<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $menu = null;

    public function __construct(Request $request) {
        $this->initMenu();
        $this->initSubmenu();
        $this->initBasketPrice();
    }

    private function initMenu() {
        $menu = Menu::all();

        View::share('menu', $menu);
    }

    private function initSubmenu() {
        $submenu = [];

        $submenu['categories'] = Categories::all();

        $submenu['catalog'] = [
            'name' => 'Каталог',
            'link' => '/catalog',
        ];

        View::share('submenu', $submenu);
    }

    private function initBasketPrice() {
        $price = $this->getPrice();
        View::share('price', $price);
    }

    protected function getPrice() {
        $basket = request()->session()->get('basket');

        if (!is_array($basket)) {
            return 0;
        }

        $indexedProducts = [];
        $productIds = [];

        foreach ($basket as $basketItem) {
            $indexedProducts[$basketItem["product-id"]] = $basketItem;
            $productIds[] = $basketItem["product-id"];
        }

        if (!$productIds) {
            return 0;
        }

        $products = Products::whereIn('id', $productIds)->get();

        $price = 0;

        foreach ($products as $product) {
            $amount = $indexedProducts[$product->id]["amount"];
            $price += (float) $product->price * $amount;
        }

        return $price;
    }
}

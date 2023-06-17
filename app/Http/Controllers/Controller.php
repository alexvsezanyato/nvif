<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Categories;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $menu = null;

    public function __construct() {
        $this->initMenu();
        $this->initSubmenu();
    }

    public function initMenu() {
        $menu = Menu::all();

        View::share('menu', $menu);
    }

    public function initSubmenu() {
        $submenu = [];

        $submenu['categories'] = Categories::all();

        $submenu['catalog'] = [
            'name' => 'Каталог',
            'link' => '/catalog',
        ];

        View::share('submenu', $submenu);
    }
}

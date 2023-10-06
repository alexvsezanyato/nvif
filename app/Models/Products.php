<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Products extends Model
{
    use HasFactory;

    public function isInCart() {
        $basket = request()->session()->get("basket");

        if (!$basket) return false;
        return isset($basket[$this->id]);
    }

    public function amount() {
        $basket = request()->session()->get("basket");
        if (!$basket) return 1;

        if (!isset($basket[$this->id])) return 1;

        return $basket[$this->id]["amount"];
    }
}

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
        return in_array((string) $this->id, $basket);
    }
}

<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Products;

class GetProductsByID
{
    use AsAction;

    public function handle(array $ids)
    {
        $products = [];

        foreach ($ids as $id) {
            $product = Products::where(["id" => $id])
                ->first()
                ->toArray();

            $products[$product["id"]] = $product;
        }

        return $products;
    }
}

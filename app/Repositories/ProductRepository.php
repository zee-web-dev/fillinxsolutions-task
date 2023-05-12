<?php
namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


class ProductRepository implements ProductRepositoryInterface
{
    public function getAll($category = null, $priceLessThan = null):Collection
    {
        return Product::category($category)
            ->priceLessThan($priceLessThan)
            ->get();
    }
}

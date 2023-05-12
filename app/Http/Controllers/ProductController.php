<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(private ProductRepositoryInterface $productRepository)
    {
    }


    public function index(Request $request)
    {
        $category = $request->query('category');
        $priceLessThan = $request->query('price');

        $products = $this->productRepository->getAll($category, $priceLessThan);

        $discountedProducts = $products->map(function ($product) {
            $discountedPrice = $product->price;

            if ($product->category === 'boots') {
                $discountedPrice = $product->price * 0.7;
            }

            if ($product->sku === '000003') {
                $discountedPrice = $product->price * 0.85;
            }

            $discountPercentage = ($product->price - $discountedPrice) / $product->price * 100;

            return [
                'sku' => $product->sku,
                'name' => $product->name,
                'category' => $product->category,
                'price' => [
                    'original' => $product->price,
                    'final' => $discountedPrice,
                    'discount_percentage' => $discountPercentage . '%',
                    'currency' => 'PKR'
                ]
            ];
        })->take(5);

        return response()->json($discountedProducts);
    }
}

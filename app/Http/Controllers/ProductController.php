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
        try {
            $category = $request->query('category');
            $priceLessThan = $request->query('price');

            $products = $this->productRepository->getAll($category, $priceLessThan);

            $discountedProducts = $products->map(function ($product) {
                $discountedPrice = $product->price;

                if ($product->sku === '000003') {
                    $discountedPrice = $product->category === 'boots' ? $product->price * 0.7 : $product->price * 0.85;
                } else {
                    $discountedPrice = $product->price * 0.7;
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
            });
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], $th->getCode());
        }

        return response()->json([
            'success' => true,
            'data' => $discountedProducts
        ]);
    }
}

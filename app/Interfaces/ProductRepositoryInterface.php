<?php
namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAll($category = null, $priceLessThan = null);
}

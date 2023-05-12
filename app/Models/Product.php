<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['sku', 'name', 'category', 'price'];

    public function scopeCategory($query, $category)
    {
        if ($category) {
            return $query->where('category', $category);
        }
        return $query;
    }

    public function scopePriceLessThan($query, $price)
    {
        if ($price) {
            return $query->where('price', '<=', $price);
        }
        return $query;
    }
}

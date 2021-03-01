<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'category_id',
            'market_id',
            'price',
            'image_path',
            'stock',
        ];

    public function market()
    {
        return $this->hasOne(Market::class,'market_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'name',
        'price',
        'cogs',
        'stock',
        'image_url',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function marketplaces()
    {
        return $this->hasMany(ProductMarketplace::class);
    }
}

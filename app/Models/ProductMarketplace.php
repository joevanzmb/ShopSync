<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMarketplace extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'connected_store_id',
        'marketplace_product_id',
        'marketplace_variant_id',
        'sync_status',
    ];

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function store()
    {
        return $this->belongsTo(ConnectedStore::class, 'connected_store_id');
    }
}

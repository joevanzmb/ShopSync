<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'connected_store_id',
        'customer_id',
        'order_number',
        'order_date',
        'customer_name',
        'customer_location',
        'courier_name',
        'tracking_number',
        'total_amount',
        'payment_method',
        'status',
        'sub_status',
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    public function store()
    {
        return $this->belongsTo(ConnectedStore::class, 'connected_store_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

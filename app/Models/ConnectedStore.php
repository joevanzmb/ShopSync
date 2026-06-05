<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectedStore extends Model
{
    protected $fillable = [
        'user_id',
        'platform',
        'shop_id',
        'store_name',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'status',
    ];

    protected $casts = [
        'token_expires_at' => 'datetime',
    ];
}

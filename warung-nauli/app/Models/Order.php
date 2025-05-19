<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'address',
        'phone',
        'status',
        'total_price',
    ];

    // Relasi: order milik satu user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: satu order punya banyak orderItems
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}

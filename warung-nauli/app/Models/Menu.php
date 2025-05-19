<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'is_available',
    ];

    // Relasi: satu menu bisa masuk ke banyak order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

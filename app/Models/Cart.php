<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'total',
        'cart_items_count',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsToOne(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}

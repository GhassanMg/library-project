<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'user_id' => 1,
            'total' => 5000,
            'cart_items_count' => 12,
        ]);

        CartItem::create([
            'cart_id' => 1,
            'book_id' => 1,
            'quantity' => 12,
            'price' => 12,
        ]);

        CartItem::create([
            'cart_id' => 1,
            'book_id' => 2,
            'quantity' => 10,
            'price' => 12,
        ]);
    }
}

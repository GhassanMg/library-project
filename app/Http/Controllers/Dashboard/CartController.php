<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Cart::getContent();
        return view('cart', compact('cartItems'));
    }
    public function get_user_cart($cart_id, $currency_id = 1)
    {
        if (isset($cart_id)) {
            $cart = Cart::where('id', $cart_id)->select(['id','user_id', 'total', 'cart_items_count'])->first();
            $cart_items = CartItem::where('cart_id',$cart_id)->get();
            $books = [];
            foreach($cart_items as $book){
                $tempbook = Book::where('id',$book->book_id)->first();
                $tempbook->setAttribute('quantity', $book->quantity);
                array_push($books,$tempbook);
            }
            $user = User::where('id',$cart->user_id)->first();
            return view('carts.index', compact('cart','cart_items','books','user'));
        } else {
            return 'cart_is_empty';
        }
    }

    public function addToCart(Request $request)
    {
        Cart::create([
            'user_id' => $request->user_id,
            'total' => $request->total,
            'cart_items_count' => $request->cart_items_count,
        ]);

    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}

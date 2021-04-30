<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart() {
        if(!isset($_COOKIE['cart_id']))
            setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];

        $productsCart = \Cart::session($cart_id)->getContent();
        $total = \Cart::session($cart_id)->getTotal();
        return view('home.cart', ['productsCart' => $productsCart, 'total' => $total]);
    }

    public function addToCart(Request $request) {
        $product = Product::where('id', $request->id)->first();

        if(!isset($_COOKIE['cart_id']))
            setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];

        \Cart::session($cart_id);

        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => array(
                'img' => $product->img,
            )
        ));

        return response()->json(['id' => $request->id]);
    }

    public function delete(Request $request) {
        $id_product = (int) $request->id;
        \Cart::session($_COOKIE['cart_id'])->remove($id_product);
        redirect()->route('cart');
    }
}

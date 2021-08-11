<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function sync(Request $request)
    {
        $cart = $request->input('cart');
        $total = $request->input('itemsTotal');
        session()->put('cart', $cart);
        session()->put('itemsTotal', $total);
        return response()->json(['message' => 'success']);
    }
}

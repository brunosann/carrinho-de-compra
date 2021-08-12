<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!session()->get('itemsTotal')) return redirect()
            ->route('home')
            ->with('message', 'Adicione um item ao carrinho.');
        return view('checkout');
    }
}

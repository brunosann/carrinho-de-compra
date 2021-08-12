@extends('layout')

@section('content')

@php
$total = session('cart') ? array_reduce(session('cart'), function ($acc, $item) {
return $acc + str_replace(',', '.',$item['price']) * str_replace(',', '.',$item['qt']) ;
}, 0) : '00,00'
@endphp

<main class="container mx-auto flex gap-4 sm:gap-8 flex-col sm:flex-row mt-4 sm:mt-8 px-4 sm:px-0">
  <section class="flex-1 bg-white rounded-lg p-4 sm:p-8">
    <h1 class="text-gray-700 text-3xl font-medium">Checkout</h1>
    <h2 class="text-gray-700 text-xl font-medium mt-4">Cadastre-se</h2>
    <p class="text-gray-700 font-medium text-sm mb-4">Tem uma conta ? <a href="#" class="text-blue-600">Login</a></p>
    <form action="" method="post" autocomplete="off">
      <div class="relative z-0 w-full mb-5">
        <input type="email" name="email" placeholder=" " autocomplete="off" required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-400" />
        <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-800">Email</label>
        <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
      </div>

      <div class="relative z-0 w-full mb-5">
        <input type="text" name="name" placeholder=" " autocomplete="off" required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-400" />
        <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-800">Nome Completo</label>
        <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
      </div>

      <div class="relative z-0 w-full mb-5">
        <input type="password" name="password" placeholder=" " required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-400" />
        <label for="password" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-800">Senha</label>
        <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
      </div>

      <div class="relative z-0 w-full mb-5">
        <input type="password" name="password_confirmation " placeholder=" " required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-400" />
        <label for="password_confirmation " class="absolute duration-300 top-3 -z-1 origin-0 text-gray-800">Confirme a
          senha</label>
        <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
      </div>

      <button id="button" type="submit"
        class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-600 hover:bg-blue-900 hover:shadow-lg focus:outline-none">
        Cadastrar
      </button>
    </form>
  </section>
  <section class="flex-1 bg-white rounded-lg p-4 sm:p-8 mb-4 sm:mb-0">
    <h2 class="text-gray-700 text-3xl font-medium">Carrinho</h2>
    <p class="text-gray-700 font-medium mt-4">
      Valor Total:
      <span id="checkout-total" class="float-right">R$ {{ $total }}</span>
    </p>
    <div id="checkout-items">
      @if (session('cart'))

      @foreach (session('cart') as $cartItem)
      <div class="flex justify-between mt-6">
        <div class="flex">
          <img class="h-20 w-20 object-cover rounded" data-image="" src="{{ $cartItem['image'] }}" alt="">
          <div class="mx-3">
            <h3 class="text-gray-600" data-name="">{{ $cartItem['name'] }}</h3>
            <div class="flex items-center mt-2" data-cart-product="{{ $cartItem['id'] }}">
              <button onclick="downItemCart(this)" class="py-1 text-gray-500 focus:outline-none focus:text-gray-600">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </button>
              <span class="text-gray-700 mx-2" data-quantity="">{{ $cartItem['qt'] }}</span>
              <button onclick="upItemCart(this)" class="py-1 text-gray-500 focus:outline-none focus:text-gray-600">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <p class="text-gray-600">R$ <span data-price="">{{ $cartItem['price'] }}</span></p>
      </div>
      @endforeach

      @endif

    </div>
  </section>
</main>

@endsection
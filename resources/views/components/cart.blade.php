@php
$total = session('cart') ? array_reduce(session('cart'), function ($acc, $item) {
return $acc + floatval($item['price']) * floatval($item['qt']);
}, 0) : '00,00'
@endphp

<aside id="cart"
    class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 overflow-y-auto bg-white border-l-2 border-gray-300">
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700">Seu Carrinho</h3>
        <button id="btn-close" class="text-gray-600 focus:outline-none">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div class="flex items-center justify-between">
        <h3 class="text-xl text-gray-700">Total</h3>
        <p class="text-gray-600 text-sm">R$ <span id="cart-total">{{ $total }}</span></p>
    </div>
    <hr class="my-3">

    <div id="cart-component" class="justify-between mt-6 hidden">
        <div class="flex">
            <img class="h-20 w-20 object-cover rounded" data-image="" src="" alt="">
            <div class="mx-3">
                <h3 class="text-sm text-gray-600" data-name=""></h3>
                <div class="flex items-center mt-2" data-cart-product="">
                    <button onclick="upItemCart(this)"
                        class="py-1 text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    <span class="text-gray-700 mx-2" data-quantity=""></span>
                    <button onclick="downItemCart(this)"
                        class="py-1 text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <p class="text-gray-600 text-sm">R$ <span data-price=""></span></p>
    </div>

    <div id="box-cart">
        @if (session('cart'))
        @foreach (session('cart') as $cartItem)
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" data-image="" src="{{ $cartItem['image'] }}" alt="">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600" data-name="">{{ $cartItem['name'] }}</h3>
                    <div class="flex items-center mt-2" data-cart-product="{{ $cartItem['id'] }}">
                        <button onclick="upItemCart(this)"
                            class="py-1 text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                        <span class="text-gray-700 mx-2" data-quantity="">{{ $cartItem['qt'] }}</span>
                        <button onclick="downItemCart(this)"
                            class="py-1 text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <p class="text-gray-600 text-sm">R$ <span data-price="">{{ $cartItem['price'] }}</span></p>
        </div>
        @endforeach
        @endif
    </div>

    <a href="#"
        class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
        <span>Chechout</span>
        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" stroke="currentColor">
            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
    </a>
</aside>
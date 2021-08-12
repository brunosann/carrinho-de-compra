@extends('layout')

@section('content')

@if (session('message'))
<div class="container mx-auto px-4 sm:px-0">
    <div class="bg-yellow-100 px-6 py-2 mt-4 sm:mt-8 rounded-md text-lg flex items-center">
        <svg viewBox="0 0 24 24" class="text-yellow-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M23.119,20,13.772,2.15h0a2,2,0,0,0-3.543,0L.881,20a2,2,0,0,0,1.772,2.928H21.347A2,2,0,0,0,23.119,20ZM11,8.423a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Zm1.05,11.51h-.028a1.528,1.528,0,0,1-1.522-1.47,1.476,1.476,0,0,1,1.448-1.53h.028A1.527,1.527,0,0,1,13.5,18.4,1.475,1.475,0,0,1,12.05,19.933Z">
            </path>
        </svg>
        <span class="text-yellow-700">
            {{ session('message') }}
        </span>
    </div>
</div>
@endif

<section class="container mx-auto my-4 sm:my-8 px-4 sm:px-0 flex gap-4 sm:gap-8 justify-center flex-wrap">
    @foreach ($products as $product)
    <article class="bg-white w-80 shadow-lg cursor-pointer rounded transform hover:scale-105 duration-300 ease-in-out">
        <div class="">
            <img src="{{ asset('imgs/'. $product->image) }}" alt="" class="rounded-t">
        </div>
        <div class="p-4 text-center">
            <h2 class="text-2xl uppercase">{{ $product->name }}</h2>
            <p class="font-semibold text-gray-700 text-lg my-2">R$
                <span>{{ number_format($product->price, 2, ',', '.')  }}</span> </p>
            <p>{{ $product->description }}</p>
            <button type="button" data-product="{{ $product->id }}"
                class="block bg-gray-300 py-2 px-2 text-gray-600 text-center rounded shadow-lg uppercase font-semibold mt-6 mx-auto hover:bg-gray-400 hover:text-white duration-300 ease-in-out">
                Adicionar ao Carrinho
            </button>
        </div>
    </article>
    @endforeach
</section>

@endsection
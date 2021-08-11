@extends('layout')

@section('content')

<section class="container mx-auto my-4 sm:my-8 flex gap-4 sm:gap-8 justify-center flex-wrap">
    @foreach ($products as $product)
    <article class="bg-white w-80 shadow-lg cursor-pointer rounded transform hover:scale-105 duration-300 ease-in-out">
        <div class="">
            <img src="{{ asset('imgs/'. $product->image) }}" alt="" class="rounded-t">
        </div>
        <div class="p-4 text-center">
            <h2 class="text-2xl uppercase">{{ $product->name }}</h2>
            <p class="font-semibold text-gray-700 text-lg my-2">R$ <span>{{ $product->price }}</span> </p>
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

@section('script')

<script src="{{ asset('js/app.js') }}"></script>

@endsection
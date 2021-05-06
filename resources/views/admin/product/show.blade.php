@extends('layout.admin')

@section('content')
<!-- Product -->
<main class="my-8 mt-10">
    <div class="container mx-auto px-6">
        <h1 class="text-center font-bold h-14 text-2xl my-10">{{ $product->name }}</h1>
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{ $img }}">
            </div>
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-lg">{{ $product -> name }}</h3>
                <span class="text-gray-500 mt-3">${{ $product->price }}</span>
                <hr class="my-3">
                <div class="mt-2">
                    <label class="text-gray-700 text-sm" for="count">Количество:</label>
                    <div class="flex items-center mt-1">
                        <button id="btnInc" class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span id="qty" class="text-gray-700 text-lg mx-2">1</span>
                        <button id="btnDeck" class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center mt-6">
                    <button id="btnBuy" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Купить сейчас</button>
                </div>
            </div>
        </div>
        <div class="mt-10 p-12 mx-auto">
            <hr class="mb-10">
            <p class="text-gray-700 text-base text-justify tracking-wide my-3">{{ $product->description }}</p>
            <hr class="mt-10">
        </div>


    </div>
</main>
<!-- end product -->
@endsection

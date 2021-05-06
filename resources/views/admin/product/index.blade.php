@extends('layout.admin')

@section('content')

    {{--            Success--}}

    @if ($message = session()->has('Success'))
        <div class="bg-green-100 p-4 rounded flex items-start text-green-600 my-4 shadow-lg max-w-xl mx-auto">
            <div class="text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/></svg>
            </div>
            <div class=" px-3">
                <h3 class="text-green-800 font-semibold tracking-wider mb-3">
                    Успешно
                </h3>
                <p class="py-2 text-green-700">
                    {{ session()->get('Success') }}
                </p>
            </div>
        </div>
    @endif
    <div class="bg-white rounded flex items-center w-2/3 mx-auto my-3 pl-3 shadow-sm border border-gray-200">
        <button @click="getImages()" class="outline-none focus:outline-none">
            <svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
        <input type="search" name="" id="" placeholder="search for products" class="w-full px-4 text-sm outline-none focus:outline-none bg-transparent">
        <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded" onclick="window.location.href = '{{ route('product.create') }}'">
            Добавить
        </button>
    </div>
    <div class="flex mx-auto w-full p-5">
        @foreach($products as $product)
        <div class="w-1/5 bg-white shadow-lg rounded-lg overflow-hidden mx-auto">
            <img class="w-full h-56 object-cover object-center" src="{{ Storage::disk('disk_image')->url('img/product_img/'.$product->img) }}">
            <div class="flex items-center text-white justify-center px-6 py-3 bg-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="mx-3 text-white text-center font-semibold text-lg">{{ $product->price }}</h1>
            </div>
            <div class="py-4 px-6">
                <h1 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h1>
                <p class="py-2 text-sm text-gray-700">{{ Str::limit($product->description, 60) }}</p>
            </div>
                <div class="flex item-center justify-center mt-2">
                    <div class="w-5 mr-5 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{ route('category.show', $product) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                    <div class="w-5 mr-5 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{ route('category.edit', $product) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>
                    </div>

                    <div class="w-5 mr-5 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                        <form action="{{ route('category.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <label for="btn-sub" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </label>
                            <button type="submit" id="btn-sub"></button>
                        </form>
                    </div>

                </div>
        </div>
        @endforeach
    </div>

@endsection

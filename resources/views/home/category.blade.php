@extends('layout.main')
@section('title', $name)
@section('content')

    <section class="bg-white py-8">
        <div class="container mx-auto flex justify-items-center items-center flex-wrap pt-4 pb-12 ">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        {{ $name }}
                    </a>

                </div>
            </nav>
            <!-- cart product -->
            @foreach($products as $product)
                @if(!isset($product->img))
                    $product->img = 'no_img';
                @endif
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <a href="/category/{{ $product->categories_id }}/{{ $product->article }}">
                        <img class="hover:grow hover:shadow-lg" src="{{ Storage::disk('disk_image')->url('img/product_img/'). $product->img }}">
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $product->name }}</p>
                        </div>
                        <p class="pt-1 text-gray-900">$ {{ $product->price }}</p>
                    </a>
                </div>
            @endforeach



        </div>

        <div>
            <ul class="flex pl-0 list-none rounded my-2 justify-center">
                {{ ($products -> links('paginations.index'))}}
            </ul>
        </div>
    </section>
    <!-- end cart category -->
@endsection

@extends('layout.main')
@section('title', 'Категории')
@section('content')

<section class="bg-white py-8">
    <div class="container mx-auto flex justify-items-center items-center flex-wrap pt-4 pb-12 ">
        <nav id="store" class="w-full z-30 top-0 px-6 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                    Категории
                </a>

            </div>
        </nav>
        <!-- cart category -->
        @foreach($categories as $category)
            <div class="w-full md:w-1/3 xl:w-1/3 p-6 flex flex-col">
                <a class="mx-auto" href="/category/{{ $category->alias }}">
                    <img class="hover:grow hover:shadow-lg" src="/images/categories_preview/{{ $category->preview_img }}">
                    <p class="text-center mt-4">{{ $category->name }}</p>
                </a>
            </div>
        @endforeach



    </div>

</section>
<!-- end cart category -->
@endsection

@extends('layout.main')
@section('title', 'Главная')

@section('content')


    <!-- cart product -->

    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Новые товары
                    </a>

                    <div class="flex items-center" id="store-nav-content">
                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </nav>

            @foreach($products as $product)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <a href="/category/{{ $product->categories_id }}/{{ $product->article }}">
                        <img class="hover:grow hover:shadow-lg" src="{{ Storage::disk('disk_image')->url('img/product_img/' . $product->img) }}">
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $product->name }}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <p class="pt-1 text-gray-900">$ {{ $product->price }}</p>
                    </a>
                </div>
            @endforeach

        </div>

    </section>


<!-- end cart product -->

    <!-- cart category -->
    <section class="bg-white py-8">

        <div class="container mx-auto flex justify-items-center items-center flex-wrap pt-4 pb-12 ">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Категории
                    </a>

                </div>
            </nav>

            @foreach($categories as $category)
                <div class="w-full md:w-1/3 xl:w-1/3 p-6 flex flex-col">
                    <a class="mx-auto" href="/category/{{ $category->alias }}">
                        <img class="hover:grow hover:shadow-lg" src="{{ Storage::disk('disk_image')->url('img/categories_preview/' . $category->preview_img) }}">
                    </a>
                </div>
            @endforeach

            <div class="container mt-5">
                <a href="/category">
                    <p class="text-center text-gray-500">Смотреть все ...</p>
                </a>
            </div>
        </div>

    </section>

    <!-- end cart category -->


    <!-- advantages -->


    <section class="max-w-8xl mx-auto container bg-white pt-16">
        <div>
            <div class="flex items-center flex-col px-4">
                <p class="uppercase text-lg text-center text-gray-600 leading-normal">В нескольких шагах</p>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-center leading-tight text-gray-800 lg:w-7/12 md:w-9/12 pt-4">Покупайте товары не выходя из дома в один клик</h2>
            </div>
            <div class="mt-20 flex flex-wrap justify-between px-4">
                <div class="flex sm:w-full md:w-5/12 pb-20">
                    <div class="w-20 h-20 relative mr-5">
                        <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                        <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg>
                        </div>
                    </div>
                    <div class="w-10/12">
                        <h4 class="text-lg font-bold leading-tight text-gray-800">Быстрая доставка</h4>
                        <p class="text-base text-gray-600 leading-normal pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet commodi eligendi incidunt, iste natus quod.</p>
                    </div>
                </div>
                <div class="flex sm:w-full md:w-5/12 pb-20">
                    <div class="w-20 h-20 relative mr-5">
                        <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                        <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="w-10/12">
                        <h4 class="text-lg font-bold leading-tight text-gray-800">Гарантия качества</h4>
                        <p class="text-base text-gray-600 leading-normal pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, autem culpa delectus dolores nemo nihil non numquam quis repellendus sapiente tempora, velit.</p>
                    </div>
                </div>
                <div class="flex sm:w-full md:w-5/12 pb-20">
                    <div class="w-20 h-20 relative mr-5">
                        <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                        <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                    <div class="w-10/12">
                        <h4 class="text-lg font-bold leading-tight text-gray-800">Деньги под защитой</h4>
                        <p class="text-base text-gray-600 leading-normal pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, deserunt ex fuga incidunt perferendis porro quidem similique tempora.</p>
                    </div>
                </div>
                <div class="flex sm:w-full md:w-5/12 pb-20">
                    <div class="w-20 h-20 relative mr-5">
                        <div class="absolute top-0 right-0 bg-indigo-100 rounded w-16 h-16 mt-2 mr-1"></div>
                        <div class="absolute text-white bottom-0 left-0 bg-indigo-700 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                    </div>
                    <div class="w-10/12">
                        <h4 class="text-lg font-bold leading-tight text-gray-800">Возврат в любой момент</h4>
                        <p class="text-base text-gray-600 leading-normal pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, architecto commodi deserunt doloremque dolorum esse excepturi fuga odio odit quod reiciendis vel veniam?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end advantages -->

    <!-- about -->
    <section class="bg-white py-8">
        <div class="container py-8 px-6 mx-auto">
            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8" href="#">
                О нас
            </a>
            <p class="mb-8 mt-3">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu consequat ac.</p>
        </div>
    </section>
    <!-- end about -->
@endsection

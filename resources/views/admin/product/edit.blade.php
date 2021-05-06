@extends('layout.admin')

@section('content')

    <div class="flex items-center bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto">
            {{--            Error--}}
            @if (count($errors) > 0)
                <div class="bg-gray-200 p-4 rounded flex items-start text-red-600 my-4 shadow-lg max-w-xl mx-auto">
                    <div class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg>
                    </div>
                    <div class=" px-3">
                        <h3 class="text-red-800 font-semibold tracking-wider mb-3">
                            Ошибка
                        </h3>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li class="my-2">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

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
            <div class="w-full md:w-5/6 sm:w-9/12 mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Продукт</h1>
                    <p class="text-gray-400 dark:text-gray-400">Укажите следующую информацию</p>
                </div>
                <div class="m-7">
                    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Название</label>
                            <input type="text" id="name" value="{{ $product->name }}" name="name" placeholder="Мобильные телефоны" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <div class="mb-6">
                            <label for="select" class="block mb-2 text-sm text-gray-600 dark:text-gray-100">Выберите категорию</label>
                            <select id="select" name="category_id" required class="w-full bg-white px-3 py-2 rounded-md border border-gray-300">
                                @foreach($categories as $category)
                                    @if($category->id == $product->categories_id)
                                        <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="article" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Артикул товара</label>
                            <input type="text" id="article" disabled value="{{ $product->article }}" placeholder="10000000" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <div class="mb-6">
                            <label for="price" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Цена $</label>
                            <input type="text" id="price" value="{{ $product->price }}" name="price" placeholder="Мобильные телефоны" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <div class="mb-6">
                            <label for="desc" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Описание</label>
                            <textarea rows="5" id="desc" name="desc" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, totam!" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required>{{$product->description}}</textarea>
                        </div>
                        <div class="mb-6">
                            <label for="file" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Изображение</label>
                            <div class="container my-5 flex justify-center mx-auto">
                                <img src="{{ $img }}" alt="">
                            </div>
                        </div>
                        <div class="mb-6 justify-center flex mx-auto">
                            <label class="w-1/3 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-500 hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Выбрать файл</span>
                                <input type='file' name="image" class="hidden" required />
                            </label>
                        </div>
                        <div class="mb-6">
                            <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Изменить</button>
                        </div>
                        <p class="text-base text-center text-gray-400" id="result">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

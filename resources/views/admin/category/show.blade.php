@extends('layout.admin')
@section('content')
    <section class="text-indigo-200 body-font p-5 bg-gray-800 mt-2 w-11/12 mx-auto">
        <div class="mx-auto flex px-5  md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                <div class="pt-10 px-2 sm:px-6">
                    <span class="inline-block py-1 px-2 rounded-full bg-green-600 text-white  text-xs font-bold tracking-widest mb-2">{{ $category->alias }}</span>
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">{{ $category->name }}</h1>
                    <p class="text-indigo-200 text-base pb-6">{{ $category->decs }}</p>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:w-1/3">
                <img class="object-cover object-center rounded" src="{{ $img }}" />
            </div>
        </div>
    </section>
@endsection

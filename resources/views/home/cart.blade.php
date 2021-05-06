@extends('layout.main')

@section('custom_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('custom_css_head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection

@section('title', 'Корзина')


@section('content')
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <h1 class="text-center text-2xl font-bold my-8">Корзина</h1>
                <table class="w-full text-sm lg:text-base p-5" cellspacing="0">
                    <thead>
                    <tr class="h-12 uppercase bg-gray-100">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Товар</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Qtd</span>
                            <span class="hidden lg:inline">Количество</span>
                        </th>
                        <th class="hidden text-right md:table-cell">Цена</th>
                        <th class="text-right">Итого</th>
                    </tr>
                    </thead>
                    <hr class="pb-6 mt-6">
                    <tbody>
                    @foreach($productsCart as $productCart)
                        <!-- Product -->
                        <tr>
                            <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                    <img src="{{ $productCart->attributes->img }}" class="w-20 rounded" alt="{{ $productCart->name }}">
                                </a>
                            </td>
                            <td>
                                <p class="mb-2 md:ml-4">{{ $productCart->name }}</p>
                                    <button id="delete" data-id="{{ $productCart->id }}" class="text-gray-700 md:ml-4">
                                        <small>Удалить</small>
                                    </button>
                            </td>
                            <td class="justify-center md:justify-end md:flex mt-6">
                                <div class="w-20 h-10">
                                    <div class="relative flex flex-row w-full h-8">
                                        <div class="custom-number-input h-10 w-32">
                                            {{ $productCart->quantity }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden text-right md:table-cell">
                              <span class="text-sm lg:text-base font-medium">
                                {{ $productCart->price }}$
                              </span>
                            </td>
                            <td class="text-right">
                              <span class="text-sm lg:text-base font-medium">
                                {{ $productCart->price * $productCart->quantity }}$
                              </span>
                            </td>
                        </tr>
                        <!-- end product -->
                    @endforeach
                    </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <div class="my-4 mt-6 mx-2 lg:flex justify-center">
                    <button class="bg-green-600 hover:bg-green-800 focus:outline-none focus:ring-2 focus:bg-green-800 focus:ring-opacity-50 p-3 px-8 rounded-xl text-white" onclick = "alert('По техническим причинам оплата невозможна')">
                        Купить {{ $total }}$
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function () {
            let btnsDel = $("button#delete");
            btnsDel.each(function (i, v) {
                console.log($(v));
                $(v).click(function (event) {
                    event.preventDefault();
                    deleteProduct(this);
                })
            })

        })

        function deleteProduct(elem) {
            $.ajax({
                url: "{{ route('deleteCart') }}",
                type: "POST",
                data: {
                    "id": parseInt($(elem).data('id')),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: () => {
                    location.reload();
                },
                error: () => {
                    alert('Ошибка');
                }
            });
        }
    </script>
@endsection

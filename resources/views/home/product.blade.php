@extends('layout.main')
@section('title', $product->name)
@section('custom_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <!-- Product -->
    <main class="my-8 mt-10">
        <div class="container mx-auto px-6">
            <h1 class="text-center font-bold h-14 text-2xl my-10">Товар</h1>
            <div class="md:flex md:items-center">
                <div class="w-full h-64 md:w-1/2 lg:h-96">
                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="/images/product_img/{{ $product->img }}" alt="{{ $product->name }}">
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
{{--                    <div class="mt-3">--}}
{{--                        <label class="text-gray-700 text-sm" for="count">Опции:</label>--}}
{{--                        <div class="flex items-center mt-1">--}}
{{--                            <button class="h-5 w-5 rounded-full bg-blue-600 focus:border-2 focus:border-blue-200 mr-2 focus:outline-none"></button>--}}
{{--                            <button class="h-5 w-5 rounded-full bg-green-600 mr-2 focus:outline-none"></button>--}}
{{--                            <button class="h-5 w-5 rounded-full bg-pink-600 mr-2 focus:outline-none"></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="flex items-center mt-6">
                        <button data-id="{{ $product->id }}" id="btnBuy" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Купить сейчас</button>
{{--                        <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">--}}
{{--                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
            <div class="mt-10 p-12 mx-auto">
                <hr class="mb-10">
                <p class="text-gray-700 text-base text-justify tracking-wide my-3">{{ $product->description }}</p>
                <hr class="mt-10">
            </div>
            <!-- Advantage -->

            <div class="mx-auto container pt-12 mt-3 px-4">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 lg:pb-10">
                    <div class="bg-gray-100 px-6 py-6 text-color f-f-l shadow-lg">
                        <h1 class="text-3xl font-bold w-1/2">Быстрая доставка</h1>
                        <div class="flex justify-end w-full items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <path
                                    d="M26 26.0001V37.1701L29.656 33.5141L32.486 36.3441L24 44.8281L15.514 36.3441L18.344 33.5141L22 37.1701V26.0001H26ZM24 4.00012C27.434 4.00029 30.7482 5.26235 33.3124 7.54636C35.8767 9.83037 37.5122 12.977 37.908 16.3881C40.3966 17.0668 42.5675 18.5983 44.0414 20.7152C45.5152 22.832 46.1983 25.3995 45.9713 27.9689C45.7442 30.5383 44.6214 32.9462 42.7992 34.7718C40.9769 36.5973 38.571 37.7244 36.002 37.9561L36 34.0001C36.0032 30.8544 34.771 27.8332 32.5687 25.587C30.3665 23.3408 27.3702 22.0492 24.2251 21.9902C21.0799 21.9312 18.0374 23.1096 15.7524 25.2716C13.4675 27.4337 12.1228 30.4065 12.008 33.5501L12 34.0001V37.9561C9.43093 37.7248 7.02484 36.5979 5.2023 34.7725C3.37976 32.9471 2.25669 30.5392 2.02938 27.9698C1.80207 25.4003 2.48499 22.8327 3.95877 20.7157C5.43255 18.5987 7.60345 17.0669 10.092 16.3881C10.4874 12.9769 12.1228 9.82994 14.6872 7.54585C17.2515 5.26176 20.5659 3.99985 24 4.00012Z"
                                    fill="url(#paint0_linear)"
                                ></path>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="24.0003" y1="4.00012" x2="24.0003" y2="44.8281" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F56565"></stop>
                                        <stop offset="1" stop-color="#D53F8C"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="bg-gray-100 px-6 py-6 text-color f-f-l shadow-lg">
                        <h1 class="text-3xl font-bold w-1/2">Гарантия качества</h1>
                        <div class="flex justify-end w-full items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <path
                                    d="M40 40C40 40.5304 39.7893 41.0391 39.4142 41.4142C39.0391 41.7892 38.5304 42 38 42H10C9.46957 42 8.96086 41.7892 8.58579 41.4142C8.21071 41.0391 8 40.5304 8 40V22H2L22.654 3.22396C23.0222 2.88892 23.5022 2.70325 24 2.70325C24.4978 2.70325 24.9778 2.88892 25.346 3.22396L46 22H40V40ZM15 26C15 28.3869 15.9482 30.6761 17.636 32.3639C19.3239 34.0518 21.6131 35 24 35C26.3869 35 28.6761 34.0518 30.364 32.3639C32.0518 30.6761 33 28.3869 33 26H29C29 27.326 28.4732 28.5978 27.5355 29.5355C26.5979 30.4732 25.3261 31 24 31C22.6739 31 21.4021 30.4732 20.4645 29.5355C19.5268 28.5978 19 27.326 19 26H15Z"
                                    fill="url(#paint0_linear)"
                                ></path>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="24" y1="2.70325" x2="24" y2="42" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F56565"></stop>
                                        <stop offset="1" stop-color="#D53F8C"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="bg-gray-100 px-6 py-6 text-color f-f-l shadow-lg">
                        <h1 class="text-3xl font-bold w-10/12">Возврат в любое время</h1>
                        <div class="flex justify-end w-full items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <path
                                    d="M38 12H22C21.4696 12 20.9609 12.2107 20.5858 12.5858C20.2107 12.9609 20 13.4696 20 14V40H8C7.46957 40 6.96086 39.7893 6.58579 39.4142C6.21071 39.0391 6 38.5304 6 38V6C6 5.46957 6.21071 4.96086 6.58579 4.58579C6.96086 4.21071 7.46957 4 8 4H36C36.5304 4 37.0391 4.21071 37.4142 4.58579C37.7893 4.96086 38 5.46957 38 6V12ZM26 16H42C42.5304 16 43.0391 16.2107 43.4142 16.5858C43.7893 16.9609 44 17.4696 44 18V42C44 42.5304 43.7893 43.0391 43.4142 43.4142C43.0391 43.7893 42.5304 44 42 44H26C25.4696 44 24.9609 43.7893 24.5858 43.4142C24.2107 43.0391 24 42.5304 24 42V18C24 17.4696 24.2107 16.9609 24.5858 16.5858C24.9609 16.2107 25.4696 16 26 16Z"
                                    fill="url(#paint0_linear)"
                                ></path>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="25" y1="4" x2="25" y2="44" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F56565"></stop>
                                        <stop offset="1" stop-color="#D53F8C"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="bg-gray-100 px-6 py-6 text-color f-f-l shadow-lg">
                        <h1 class="text-3xl font-bold w-9/12">Защита ваших денег</h1>
                        <div class="flex justify-end w-full items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <path d="M12.91 38L4 45V8C4 7.46957 4.21071 6.96086 4.58579 6.58579C4.96086 6.21071 5.46957 6 6 6H42C42.5304 6 43.0391 6.21071 43.4142 6.58579C43.7893 6.96086 44 7.46957 44 8V36C44 36.5304 43.7893 37.0391 43.4142 37.4142C43.0391 37.7893 42.5304 38 42 38H12.91ZM22.586 24.242L17.636 19.292L14.808 22.122L22.586 29.9L33.9 18.586L31.072 15.758L22.586 24.242Z" fill="url(#paint0_linear)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear" x1="24" y1="6" x2="24" y2="45" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F56565"></stop>
                                        <stop offset="1" stop-color="#D53F8C"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end Advantage -->

            <!-- more product -->
            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">Похожие товары</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach($activeOffers as $offer)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <a href="/category/{{ $offer->categories_id }}/{{ $offer->article }}">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('/images/product_img/{{ $offer->img }}')"></div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{ $offer->name }}</h3>
                                <span class="text-gray-500 mt-2">$ {{ $offer->price }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end more product -->
        </div>
    </main>
    <!-- end product -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('custom_js')
    <script src="/js/cart.js"></script>
@endsection
<script>
    let qty = $("#qty")[0];
    $(document).ready(function () {
        $("#btnBuy").click(function (event) {
            event.preventDefault();
            addToCart();

        })
    })

    function addToCart() {
        let id = $("#btnBuy").data('id');
        $.ajax({
            url: "{{ route('addToCart') }}",
            type: "POST",
            data: {
                "id": id,
                "qty": parseInt(qty.innerHTML),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: () => {
                location.href="{{ route('cart') }}";
            },
            error: () => {
                alert('Ошибка');
            }
        });
    }
</script>

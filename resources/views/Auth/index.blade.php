<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-600 work-sans leading-normal text-base tracking-normal">


<div class="flex items-center justify-center mt-40">
    <div class="w-full max-w-md">
        <form class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4">
        <!-- @csrf -->
            <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                Login
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-normal mb-2" for="username">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" v-model="form.email" type="email" required autofocus placeholder="Email"/>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-normal mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" v-model="form.password" type="password" placeholder="Password" name="password" required autocomplete="current-password"/>
            </div>
            <div class="flex items-center justify-between">
                <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">Sign In</button>
                <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020
        </p>
    </div>
</div>

</body>
</html>

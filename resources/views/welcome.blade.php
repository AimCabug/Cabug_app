<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-gray-600 h-screen m-0">
        <div class="flex justify-center items-center flex-col h-full">
            <div class="text-center">
                <div class="text-8xl font-light text-gray-800 mb-2">
                    WELCOME TO {{ strtoupper($name) }}
                </div>
                <div class="text-2xl font-light text-gray-600 mb-8">
                    Hello, {{ $name }}!
                </div>
                <div class="flex justify-center gap-5 mt-8">
                    <a href="/product-list" class="text-gray-600 px-6 py-2 font-semibold uppercase text-sm border-2 border-gray-600 rounded hover:text-gray-900 hover:border-gray-900 hover:bg-gray-100 transition-all duration-300">
                        Products
                    </a>
                    <a href="/test-service" class="text-gray-600 px-6 py-2 font-semibold uppercase text-sm border-2 border-gray-600 rounded hover:text-gray-900 hover:border-gray-900 hover:bg-gray-100 transition-all duration-300">
                        Users
                    </a>
                    <a href="/token" class="text-gray-600 px-6 py-2 font-semibold uppercase text-sm border-2 border-gray-600 rounded hover:text-gray-900 hover:border-gray-900 hover:bg-gray-100 transition-all duration-300">
                        Token
                    </a>
                </div>
            </div>
        </div>
        <x-layout>
            <x-slot:heading>
                <p>Welcom to {{ $name }}</p>
            </x-slot:heading>
        </x-layout>

    </body>
</html>
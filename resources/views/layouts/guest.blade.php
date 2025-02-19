<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Background Gradasi Lembut */
            body {
                background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);
                background-attachment: fixed;
            }

            /* Efek Blur dan Border Elegan */
            .card-container {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(15px);
                border: 1px solid rgba(99, 102, 241, 0.2); /* Warna border lembut */
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            /* Tombol Hover dengan Efek Lembut */
            .btn-stylish {
                transition: transform 0.2s, box-shadow 0.2s;
            }
            .btn-stylish:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 20px rgba(99, 102, 241, 0.3);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Logo -->
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-indigo-600" />
                </a>
            </div>

            <!-- Card Container -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 card-container rounded-lg">
                {{ $slot }}
            </div>
        </div>

    </body>
</html>
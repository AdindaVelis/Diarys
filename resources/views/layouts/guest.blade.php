<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Diaries') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Background Gradasi Lembut */
        body {
            background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);
            background-attachment: fixed;
            font-family: 'Quicksand', sans-serif;
        }

        /* Efek Blur dan Border Elegan */
        .card-container {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(99, 102, 241, 0.2);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Logo Tulisan Aesthetic */
        .logo-text {
            font-family: 'Pacifico', cursive;
            font-size: 2.2rem;
            font-weight: 700;
            color: #4F46E5;
            text-shadow: 2px 2px 5px rgba(79, 70, 229, 0.3);
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .logo-text:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        /* Tombol Log In */
        .btn-login {
            background: #4F46E5;
            color: white;
            font-weight: 600;
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease-in-out;
            display: block;
            text-align: center;
        }
        .btn-login:hover {
            background: #4338CA;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Logo (Tulisan Aesthetic) -->
        <div>
            <a href="/" class="logo-text">
                My Diaries
            </a>
        </div>

        <!-- Card Container -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 card-container rounded-lg">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
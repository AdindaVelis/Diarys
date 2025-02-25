<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Diaries') }}</title>

    <!-- Tailwind & Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Background Gradien Lembut */
        body {
            background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);
            background-attachment: fixed;
        }

        /* Navbar Transparan Modern */
        .navbar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Tombol Hover dengan Efek Halus */
        .btn-stylish {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-stylish:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        /* Efek Hover pada Register */
        .btn-register {
            background: white;
            color: #4F46E5;
            border: 2px solid #4F46E5;
            transition: all 0.3s ease-in-out;
        }
        .btn-register:hover {
            background: #4F46E5;
            color: white;
            box-shadow: 0 10px 15px rgba(79, 70, 229, 0.3);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col relative">


<!-- Hero Section -->
<section class="flex items-center justify-center flex-grow px-4 text-center">
    <div class="space-y-6">
        <h1 class="text-5xl font-bold text-gray-800 drop-shadow-md">
            📖 Capture Your <span class="text-blue-600">Moments</span>
        </h1>
        <p class="text-lg text-gray-600 max-w-xl mx-auto">
            A place to cherish your thoughts, experiences, and dreams.
        </p>

        @if(Auth::check())
            <p class="text-lg font-semibold">Welcome back, <span class="text-blue-600">{{ Auth::user()->name }}</span>!</p>
            <a href="{{ route('diaries.index') }}" 
               class="px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-lg font-semibold rounded-lg shadow-lg btn-stylish">
                Start Writing
            </a>
        @else
            <div class="flex space-x-4 justify-center">
                <a href="{{ route('login') }}" 
                   class="px-8 py-4 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-md btn-stylish">
                    Log In
                </a>
                <a href="{{ route('register') }}" 
                   class="px-8 py-4 btn-register text-lg font-semibold rounded-lg shadow-md">
                    Register
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Footer -->
<footer class="bg-blue-100 py-6 text-center text-gray-700">
    <p class="text-sm">&copy; {{ date('Y') }} My Diaries. All Rights Reserved.</p>
</footer>

</body>
</html>
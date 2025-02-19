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

        /* Efek Glitter Bintang */
        .glitter {
            position: absolute;
            width: 5px;
            height: 5px;
            background: radial-gradient(circle, #fff, rgba(255, 255, 255, 0.6));
            border-radius: 50%;
            opacity: 0;
            animation: sparkle 4s infinite ease-in-out;
        }

        /* Animasi Glitter */
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0.5); }
            50% { opacity: 1; transform: scale(1.2); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col relative">

<!-- Taburan Glitter -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const glitterCount = 40;
        const body = document.body;

        for (let i = 0; i < glitterCount; i++) {
            let glitter = document.createElement("div");
            glitter.classList.add("glitter");

            let x = Math.random() * window.innerWidth;
            let y = Math.random() * window.innerHeight;
            let delay = Math.random() * 4;

            glitter.style.left = ${x}px;
            glitter.style.top = ${y}px;
            glitter.style.animationDelay = ${delay}s;

            body.appendChild(glitter);
        }
    });
</script>

<!-- Navbar -->
<nav class="navbar fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ route('home') }}" class="text-3xl font-bold text-blue-600 hover:opacity-80 transition">
                ✨ My Diaries
            </a>
        </div>
    </div>
</nav>

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
                ✏ Start Writing
            </a>
        @else
            <div class="flex space-x-4 justify-center">
                <a href="{{ route('login') }}" 
                   class="px-8 py-4 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-md btn-stylish">
                    🔓 Log In
                </a>
                <a href="{{ route('register') }}" 
                   class="px-8 py-4 bg-white border-2 border-blue-600 text-blue-600 text-lg font-semibold rounded-lg shadow-md hover:bg-blue-50 transition">
                    ✍️ Register
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
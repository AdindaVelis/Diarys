<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Diaries') }}</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Logo My Diaries */
        .logo-text {
            font-family: 'Pacifico', cursive;
            font-size: 1.8rem;
            font-weight: bold;
            color: #4F46E5;
            text-decoration: none;
            transition: opacity 0.3s ease-in-out;
        }
        .logo-text:hover {
            opacity: 0.8;
        }

        /* Efek Hover Navigasi */
        .nav-link {
            transition: color 0.3s ease-in-out;
        }
        .nav-link:hover {
            color: #4F46E5;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            
            <!-- Logo (Disamakan dengan Welcome.blade) -->
            <a href="{{ route('dashboard') }}" class="logo-text">
                My Diaries
            </a>

            <!-- Menu Navigasi -->
            <div class="hidden sm:flex space-x-6">
                <a href="{{ route('dashboard') }}" class="nav-link text-gray-600 dark:text-gray-300">
                    📌 Dashboard
                </a>
                <a href="{{ route('diaries.index') }}" class="nav-link text-gray-600 dark:text-gray-300">
                    📖 Diaries
                </a>
            </div>

            <!-- User dan New Entry (Sejajar) -->
            <div class="flex items-center space-x-4">
                <!-- New Entry -->
                <a href="{{ route('diaries.create') }}" class="bg-sky-500 text-white font-semibold py-2 px-4 rounded-full hover:bg-sky-600 shadow-md transition">
                    ✍️ New Entry
                </a>

                <!-- Dropdown User -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-2 text-gray-600 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-400">
                        <span class="font-semibold">🌸 {{ Auth::user()->name }}</span>
                        <svg class="ml-1 h-5 w-5 fill-current transition-transform" :class="{'rotate-180': open, 'rotate-0': !open}" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white/90 dark:bg-gray-800/90 rounded-lg shadow-lg py-2 border border-gray-200 dark:border-gray-700 z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            ⚙️ Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                🚪 Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten dengan Padding-Top -->
    <div class="pt-20">
        @yield('content')
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Diaries') }}</title>

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 50;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Logo Styling (Sesuai navigation.blade.php) */
        .logo-text {
            font-size: 2rem;
            font-weight: 800;
            font-family: 'Pacifico', cursive; /* Pastikan font sama */
            color: #4F46E5;
            letter-spacing: -1px;
            text-transform: capitalize;
            transition: opacity 0.3s ease-in-out;
        }
        .logo-text:hover {
            opacity: 0.8;
        }

        /* Navbar Links */
        .nav-link {
            color: #4F46E5;
            font-weight: 600;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #4338CA;
        }

        /* Button Styling */
        .btn-new-entry {
            background: #4F46E5;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background 0.3s, transform 0.2s;
        }
        .btn-new-entry:hover {
            background: #4338CA;
            transform: translateY(-2px);
        }

        /* Welcome Message */
        .welcome-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #4F46E5;
            margin-top: 20px;
        }
    </style>

    <!-- Navbar -->
    <nav class="navbar py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            
            <!-- Logo (Sama dengan navigation.blade.php) -->
            <a href="{{ route('dashboard') }}" class="logo-text">
                My Diaries
            </a>

            <!-- Menu Navigasi -->
            <div class="hidden sm:flex space-x-6">
                <a href="{{ route('dashboard') }}" class="nav-link">📌 Dashboard</a>
                <a href="{{ route('diaries.index') }}" class="nav-link">📖 Diaries</a>
            </div>

            <!-- User & New Entry -->
            <div class="flex items-center space-x-4">
                

                <!-- User Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 font-semibold">
                        <span>🌸 {{ Auth::user()->name }}</span>
                        <svg class="h-5 w-5" :class="{'rotate-180': open, 'rotate-0': !open}" viewBox="0 0 20 20">
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

    <!-- Content Section -->
    <div class="pt-24 flex flex-col items-center justify-center min-h-screen">
        
        <!-- Welcome Text -->
        <h2 class="welcome-text">
            Welcome Back, {{ Auth::user()->name }}! ✨
        </h2>

        <!-- Card -->
        <div class="max-w-3xl mx-auto mt-8 bg-white bg-opacity-90 shadow-2xl rounded-3xl p-10 text-center border border-gray-200 backdrop-blur-md">
            
            <!-- Icon -->
            <div class="text-5xl text-indigo-500">📖</div>
            
            <h3 class="text-2xl font-extrabold text-gray-800 mt-4">My Personal Diary</h3>
            <p class="text-gray-600 mt-2 italic">A place to store your thoughts and beautiful memories.</p>

            <div class="mt-6">
                <p class="text-lg text-indigo-600 font-semibold">You're logged in! ⭐</p>
                <p class="text-sm text-gray-500 mt-2">Enjoy writing your diary entries and cherish your moments.</p>
            </div>

            <div class="mt-6">
                <a href="{{ url('/diaries') }}" 
                   class="bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-6 py-3 rounded-full shadow-xl transition transform hover:scale-105 flex items-center justify-center space-x-2">
                    ✏️ <span class="font-semibold">Start Writing</span>
                </a>
            </div>
        </div>

    </div>

</body>
</html>
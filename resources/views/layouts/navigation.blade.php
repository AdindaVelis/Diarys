<nav class="fixed top-0 left-0 w-full z-50 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        
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

            
            <!-- Logo (Sama dengan navigation.blade.php) -->
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

        <!-- User dan New Entry -->
        <div class="flex items-center space-x-4">
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
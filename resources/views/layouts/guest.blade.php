<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Diaries') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
        }

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

         /* Card Styling */
         .card-container {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(99, 102, 241, 0.2);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col justify-center items-center">
        
         <!-- Logo (Sama dengan navigation.blade.php) -->
         <a href="{{ route('dashboard') }}" class="logo-text">
                My Diaries
            </a>

        <!-- Card Container -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 card-container rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
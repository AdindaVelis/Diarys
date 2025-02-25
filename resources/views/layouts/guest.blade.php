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
        /* Background Gradient */
        body {
            background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);
            background-attachment: fixed;
            font-family: 'Quicksand', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Card Styling */
        .card-container {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(99, 102, 241, 0.2);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Logo Styling */
        .logo-text {
            font-size: 2rem;
            font-weight: 800;
            font-family: 'Pacifico', cursive;
            color: #4F46E5;
            letter-spacing: -1px;
            text-transform: capitalize;
            text-align: center;
            margin-bottom: 20px;
            display: block;
        }

        .logo-text:hover {
            opacity: 0.8;
        }

        /* Navbar Links */
        .nav-link {
            color: #4F46E5;
            font-weight: 600;
            transition: color 0.3s;
            text-decoration: none;
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
            display: inline-block;
            text-decoration: none;
            margin-top: 10px;
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
</head>
<body>

    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="logo-text">
        My Diaries
    </a>

    <!-- Card Container -->
    <div class="card-container">
        {{ $slot }}
    </div>

</body>
</html>
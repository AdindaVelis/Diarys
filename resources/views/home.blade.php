<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Diaries') }}</title>

    <!-- Tailwind & Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);
            background-attachment: fixed;
            scroll-behavior: smooth;
        }

        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(to right, #D4E0FC, #E0D4FC);
            color: #4F46E5;
        }

        .btn-gradient {
            background: linear-gradient(90deg, #4F46E5, #6D28D9);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.4);
        }

        .btn-soft {
            background: white;
            color: #4F46E5;
            border: 2px solid #4F46E5;
            transition: all 0.3s ease-in-out;
        }

        .btn-soft:hover {
            background: #4F46E5;
            color: white;
            box-shadow: 0 10px 15px rgba(79, 70, 229, 0.3);
        }

        .diary-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-left: 4px solid #6D28D9;
            transition: box-shadow 0.3s ease-in-out;
        }

        .diary-card:hover {
            box-shadow: 0 8px 16px rgba(79, 70, 229, 0.2);
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <div class="text-center space-y-6">
        <h1 class="text-6xl font-bold drop-shadow-lg">
            📖 Capture Your <span class="text-indigo-500">Moments</span>
        </h1>
        <p class="text-lg opacity-90">
            A place to cherish your thoughts, experiences, and dreams.
        </p>

        <div class="flex flex-wrap justify-center space-x-4">
            @if(Auth::check())
                <a href="#diary-section" 
                   class="px-8 py-4 text-white text-lg font-semibold rounded-lg shadow-lg btn-gradient">
                    ✍ View Diaries
                </a>
                <a href="{{ route('diaries.create') }}" 
                   class="px-8 py-4 bg-green-500 text-white text-lg font-semibold rounded-lg shadow-lg hover:bg-green-600">
                    📝 New Entry
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="px-8 py-4 bg-indigo-600 text-white text-lg font-semibold rounded-lg shadow-lg hover:bg-indigo-700">
                    Log In
                </a>
                <a href="{{ route('register') }}" 
                   class="px-8 py-4 btn-soft text-lg font-semibold rounded-lg shadow-md">
                    Register
                </a>
            @endif
        </div>
    </div>
</section>

<!-- Daftar Diary -->
@if(Auth::check())
    <section id="diary-section" class="py-16 px-6">
        <div class="max-w-5xl mx-auto space-y-8">
            <h2 class="text-3xl font-bold text-gray-800 text-center">📜 Your Diaries</h2>

            @forelse ($diaries as $diary)
                <div class="diary-card shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-indigo-600">{{ $diary->title }}</h3>
                    <p class="text-gray-700 italic">
                        {{ Str::limit($diary->description, 80) }}
                    </p>
                    <button onclick="showModal({{ $diary->id }})" 
                            class="text-indigo-500 underline text-sm font-semibold hover:text-indigo-700">
                        💌 Read More
                    </button>

                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('diaries.edit', $diary->id) }}" 
                           class="bg-indigo-400 hover:bg-indigo-500 text-white px-4 py-2 rounded-full shadow-md">
                            ✏ Edit
                        </a>
                        <form action="{{ route('diaries.destroy', $diary->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this diary?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-full shadow-md">
                                🗑 Delete
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $diary->id }}" class="fixed inset-0 bg-gray-900 bg-opacity-30 flex items-center justify-center hidden">
                    <div class="bg-white p-6 rounded-xl shadow-lg max-w-lg border border-indigo-300">
                        <h3 class="text-xl font-bold text-indigo-600">{{ $diary->title }}</h3>
                        <p class="text-gray-700 mt-4">{{ $diary->description }}</p>
                        <button onclick="closeModal({{ $diary->id }})" 
                                class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-full">
                            ❌ Close
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 italic">You haven't written anything yet. Start writing today!</p>
            @endforelse
        </div>
    </section>
@endif

<!-- Footer -->
<footer class="bg-white py-6 text-center text-gray-600 shadow-inner">
    <p class="text-sm">&copy; {{ date('Y') }} My Diaries. All Rights Reserved.</p>
</footer>

<!-- JavaScript Modal -->
<script>
    function showModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>

</body>
</html>
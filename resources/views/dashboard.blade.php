<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-indigo-600 dark:text-indigo-300 leading-tight text-center">
            Welcome Back, {{ Auth::user()->name }}! 🎉
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-200 via-white to-purple-200 min-h-screen flex items-center justify-center">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white bg-opacity-90 shadow-2xl rounded-3xl p-10 text-center border border-gray-200 backdrop-blur-md">
                
                <!-- Icon Diary -->
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
    </div>
</x-app-layout>
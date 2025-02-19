<x-app-layout>
    <div class="pt-20 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            @forelse ($diaries as $diary)
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-sky-300 hover:shadow-xl transition">
                    <div class="flex space-x-4">
                        <!-- Gambar -->
                        <div class="w-40 h-32 rounded-lg overflow-hidden shadow-md border border-gray-200">
                            @if ($diary->image)
                                <img src="{{ Storage::url($diary->image) }}" alt="{{ $diary->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                           <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                    <span class="text-gray-400 italic">No Image</span>
                                </div>
                            @endif
                        </div>

                        <!-- Detail -->
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-sky-600">{{ $diary->title }}</h3>
                            <p class="text-gray-600 line-clamp-2 italic">
                                {{ Str::limit($diary->description, 80) }}
                            </p>

                            <button onclick="showModal({{ $diary->id }})" 
                                    class="text-sky-500 underline text-sm font-semibold hover:text-sky-700 transition">
                                💌 Read More
                            </button>

                            <p class="text-gray-500 text-sm mt-2">By <strong>{{ $diary->user->name }}</strong></p>

                            <!-- Buttons -->
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('diaries.edit', $diary->id) }}" 
                                   class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded-full shadow-md hover:shadow-lg transition">
                                    ✏ Edit
                                </a>
                                <form action="{{ route('diaries.destroy', $diary->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this diary?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-full shadow-md hover:shadow-lg transition">
                                        🗑 Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $diary->id }}" class="fixed inset-0 bg-gray-900 bg-opacity-30 flex items-center justify-center hidden">
                    <div class="bg-white p-6 rounded-xl shadow-lg max-w-lg border border-sky-300">
                        <h3 class="text-xl font-bold text-sky-600">{{ $diary->title }}</h3>
                        <p class="text-gray-700 mt-4">{{ $diary->description }}</p>
                        <button onclick="closeModal({{ $diary->id }})" 
                                class="mt-4 bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-full">
                            ❌ Close
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-center text-sky-500 italic py-6">
                    ☁️ No diary entries yet. Start writing your beautiful stories! ✨
                </p>
            @endforelse

            <!-- Pagination -->
            @if ($diaries->hasPages())
                <div class="flex flex-col items-center mt-8 space-y-2">
                    <span class="text-sm text-gray-600">
                        Menampilkan <span class="font-semibold text-gray-900">{{ $diaries->firstItem() }}</span> -
                        <span class="font-semibold text-gray-900">{{ $diaries->lastItem() }}</span> dari 
                        <span class="font-semibold text-gray-900">{{ $diaries->total() }}</span> entri
                    </span>

                    <div class="flex items-center space-x-2">
                        @if ($diaries->onFirstPage())
                            <span class="flex items-center px-4 py-2 text-gray-400 bg-gray-200 rounded-full cursor-not-allowed">
                                ⬅️ Prev
                            </span>
                        @else
                            <a href="{{ $diaries->previousPageUrl() }}" 
                               class="flex items-center px-4 py-2 text-white bg-sky-500 rounded-full shadow-md hover:bg-sky-600 transition">
                                ⬅️ Prev
                            </a>
                        @endif

                        @if ($diaries->hasMorePages())
                            <a href="{{ $diaries->nextPageUrl() }}" 
                               class="flex items-center px-4 py-2 text-white bg-sky-500 rounded-full shadow-md hover:bg-sky-600 transition">
                                Next ➡️
                            </a>
                        @else
                            <span class="flex items-center px-4 py-2 text-gray-400 bg-gray-200 rounded-full cursor-not-allowed">
                                Next ➡️
                            </span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<!-- JavaScript Modal -->
<script>
    function showModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>
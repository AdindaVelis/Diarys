<x-app-layout>
    <div class="pt-20 min-h-screen flex flex-col items-center" 
         style="background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);">
        
        <div class="max-w-5xl w-full px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Tombol New Entry -->
            <div class="flex justify-end">
                <a href="{{ route('diaries.create') }}" 
                   class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-3 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition">
                    📝 New Entry
                </a>
            </div>

            @forelse ($diaries as $diary)
                <div class="bg-white bg-opacity-85 shadow-xl rounded-2xl p-6 border-l-4 border-indigo-300 backdrop-blur-lg hover:shadow-2xl transition">
                    <div class="flex space-x-4">
                        
                        <!-- Gambar -->
                        <div class="w-40 h-32 rounded-lg overflow-hidden shadow-md border border-gray-300">
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
                            <h3 class="text-xl font-bold text-indigo-600">{{ $diary->title }}</h3>
                            <p class="text-gray-700 line-clamp-2 italic">
                                {{ Str::limit($diary->description, 80) }}
                            </p>

                            <button onclick="showModal({{ $diary->id }})" 
                                    class="text-indigo-500 underline text-sm font-semibold hover:text-indigo-700 transition">
                                💌 Read More
                            </button>

                            <p class="text-gray-500 text-sm mt-2">By <strong>{{ $diary->user->name }}</strong></p>

                            <!-- Hanya Pemilik yang Bisa Edit & Hapus -->
                            @if (Auth::id() === $diary->user_id)
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('diaries.edit', $diary->id) }}" 
                                       class="bg-indigo-400 hover:bg-indigo-500 text-white px-4 py-2 rounded-full shadow-md hover:shadow-lg transition">
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
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $diary->id }}" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center hidden">
                    <div class="bg-white p-6 rounded-xl shadow-lg max-w-lg border border-indigo-300 max-h-screen overflow-auto relative">
                        <h3 class="text-xl font-bold text-indigo-600">{{ $diary->title }}</h3>
                        <p class="text-gray-700 mt-4">{{ $diary->description }}</p>
                        
                        <!-- Tombol Cetak -->
                        <button onclick="printDiary({{ $diary->id }})"
                                class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full">
                            🖨 Print
                        </button>

                        <button onclick="closeModal({{ $diary->id }})" 
                                class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-full">
                            ❌ Close
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-center text-indigo-500 italic py-6">
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
                               class="flex items-center px-4 py-2 text-white bg-indigo-500 rounded-full shadow-md hover:bg-indigo-600 transition">
                                ⬅️ Prev
                            </a>
                        @endif

                        @if ($diaries->hasMorePages())
                            <a href="{{ $diaries->nextPageUrl() }}" 
                               class="flex items-center px-4 py-2 text-white bg-indigo-500 rounded-full shadow-md hover:bg-indigo-600 transition">
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

<!-- JavaScript Modal & Print -->
<script>
    function showModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }

    function printDiary(id) {
        let modal = document.getElementById('modal-' + id);
        let title = modal.querySelector('h3').innerText;
        let description = modal.querySelector('p').innerText;

        let printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write('<html><head><title>Cetak Diary</title></head><body>');
        printWindow.document.write('<h1>' + title + '</h1>');
        printWindow.document.write('<p>' + description + '</p>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
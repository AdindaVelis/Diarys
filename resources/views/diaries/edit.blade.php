<x-app-layout>
    <div class="py-12 mt-16 bg-gradient-to-br from-sky-50 via-white to-sky-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-sky-300">

                <form class="space-y-6" method="POST" action="/diaries/{{ $diary->id }}" enctype="multipart/form-data">
                    @csrf 
                    @method('PATCH')

                    <!-- Title -->
                    <div>
                        <label for="title" class="block mb-2 text-sm font-bold text-sky-600">Title</label>
                        <input type="text" id="title" name="title" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-3 shadow-sm" 
                               placeholder="Title" required value="{{ $diary->title }}" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block mb-2 text-sm font-bold text-sky-600">Description</label>
                        <textarea id="description" name="description" 
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-3 shadow-sm" 
                                  placeholder="Write your story..." required rows="4">{{ $diary->description }}</textarea>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block mb-2 text-sm font-bold text-sky-600">Image</label>

                        <!-- Preview Gambar -->
                        @if ($diary->image)
                            <img src="{{ Storage::url($diary->image) }}" 
                                 alt="{{ $diary->title }}" 
                                 class="w-44 h-32 rounded-lg shadow-md border-2 border-sky-300 mb-4 object-cover">
                        @else
                            <div class="w-44 h-32 flex items-center justify-center bg-sky-100 rounded-lg shadow-md border-2 border-sky-300 mb-4">
                                <span class="text-sky-500 italic">No Image</span>
                            </div>
                        @endif
                        
                        <input type="file" id="image" name="image" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-3 shadow-sm" />
                    </div>

                    <!-- Button Update -->
                    <button type="submit" 
                            class="text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300 font-semibold rounded-full text-sm w-full sm:w-auto px-6 py-3 shadow-md hover:shadow-lg transition-transform transform hover:scale-105">
                        🔄 Update
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
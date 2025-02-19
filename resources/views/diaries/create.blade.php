<x-app-layout>
    <div class="py-12 mt-16 bg-gradient-to-br from-sky-50 via-white to-gray-100 min-h-screen flex justify-center items-center">
        <div class="max-w-lg w-full bg-white shadow-xl rounded-2xl p-8 border-2 border-sky-300">
            <h2 class="text-2xl font-extrabold text-sky-600 text-center mb-6">
                📖 Tulis Kenangan Indahmu ✨
            </h2>

            <form method="POST" action="{{ route('createDiaries') }}" enctype="multipart/form-data">
                @csrf 
                
                <!-- Title -->
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-semibold text-sky-600">📌 Judul Diary</label>
                    <input type="text" id="title" name="title"
                           class="bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" 
                           placeholder="Masukkan judul..." required />
                </div>

                <!-- Description -->
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-semibold text-sky-600">📝 Deskripsi</label>
                    <textarea id="description" name="description"
                              class="bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 h-32 resize-none" 
                              placeholder="Tuliskan isi diary..." required></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-semibold text-sky-600">📷 Tambahkan Gambar</label>
                    <input type="file" id="image" name="image"
                           class="bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" 
                           required />
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full px-5 py-3 text-white bg-sky-500 font-semibold rounded-full shadow-md hover:bg-sky-600 hover:shadow-lg hover:scale-105 transform transition">
                    💾 Simpan Diary
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="py-12 mt-16 min-h-screen flex justify-center items-center" 
         style="background: linear-gradient(to bottom right, #D4E0FC, #FFFFFF, #E0D4FC);">
        
        <div class="max-w-lg w-full bg-white bg-opacity-85 shadow-xl rounded-2xl p-8 border border-indigo-300 backdrop-blur-lg">
            <h2 class="text-2xl font-extrabold text-indigo-600 text-center mb-6">
                Tulis Kenangan Indahmu
            </h2>

            <form method="POST" action="{{ route('createDiaries') }}" enctype="multipart/form-data">
                @csrf 
                
                <!-- Title -->
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-semibold text-indigo-600">🏷️ Judul</label>
                    <input type="text" id="title" name="title"
                           class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" 
                           placeholder="Masukkan judul..." required />
                </div>

                <!-- Description -->
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-semibold text-indigo-600">🖊️ Isi Catatan</label>
                    <textarea id="description" name="description"
                              class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 h-32 resize-none" 
                              placeholder="Tuliskan isi diary..." required></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-semibold text-indigo-600">🖼️ Tambahkan Foto</label>
                    <input type="file" id="image" name="image"
                           class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" 
                           required />
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full px-5 py-3 text-white bg-indigo-500 font-semibold rounded-full shadow-md hover:bg-indigo-600 hover:shadow-lg hover:scale-105 transform transition">
                    📂 Simpan Kenanganmu
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
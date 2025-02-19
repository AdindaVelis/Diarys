<section class="bg-gradient-to-br from-sky-50 via-white to-gray-100 shadow-xl rounded-2xl p-8 max-w-4xl mx-auto mt-20 border-2 border-sky-300">
    <header>
        <h2 class="text-3xl font-extrabold text-red-600 flex items-center gap-2">
            🚨 Delete Account
        </h2>
        <p class="mt-1 text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button 
        x-data="" 
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" 
        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 mt-6">
        ❌ Delete Account
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-red-600">⚠️ Confirm Account Deletion</h2>

            <p class="mt-1 text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <div class="mt-6 space-y-2">
                <label for="password" class="block text-lg font-semibold text-sky-600">🔑 Password</label>
                <input id="password" name="password" type="password" 
                       class="w-full px-4 py-2 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 shadow-sm" 
                       placeholder="Enter your password">
                @error('password') 
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mt-6 flex justify-end gap-4">
                <button type="button" x-on:click="$dispatch('close')" 
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    ❎ Cancel
                </button>

                <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    🚨 Delete Account
                </button>
            </div>
        </form>
    </x-modal>
</section>
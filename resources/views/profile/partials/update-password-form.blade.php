<section class="bg-gradient-to-br from-sky-50 via-white to-gray-100 shadow-xl rounded-2xl p-8 max-w-4xl mx-auto mt-20 border-2 border-sky-300">
    <header>
        <h2 class="text-3xl font-extrabold text-sky-600 flex items-center gap-2">
            🔒 Update Password
        </h2>
        <p class="mt-1 text-gray-600">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password Field -->
        <div class="space-y-2">
            <label for="current_password" class="block text-lg font-semibold text-sky-600">🔑 Current Password</label>
            <input id="current_password" name="current_password" type="password" 
                   class="w-full px-4 py-2 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 shadow-sm" 
                   autocomplete="current-password">
            @error('current_password') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <!-- New Password Field -->
        <div class="space-y-2">
            <label for="password" class="block text-lg font-semibold text-sky-600">🔒 New Password</label>
            <input id="password" name="password" type="password" 
                   class="w-full px-4 py-2 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 shadow-sm" 
                   autocomplete="new-password">
            @error('password') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Confirm Password Field -->
        <div class="space-y-2">
            <label for="password_confirmation" class="block text-lg font-semibold text-sky-600">🔑 Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" 
                   class="w-full px-4 py-2 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 shadow-sm" 
                   autocomplete="new-password">
            @error('password_confirmation') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <button type="submit" 
                    class="bg-sky-500 hover:bg-sky-600 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                🔄 Save Changes
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition 
                   x-init="setTimeout(() => show = false, 2000)" 
                   class="text-sm text-green-600 font-medium">
                    ✅ Saved successfully.
                </p>
            @endif
        </div>
    </form>
</section>
<section class="bg-gradient-to-br from-sky-50 via-white to-gray-100 shadow-xl rounded-2xl p-8 max-w-4xl mx-auto mt-20 border-2 border-sky-300">
    <header>
        <h2 class="text-3xl font-extrabold text-sky-600 flex items-center gap-2">
            👤 Profile Information
        </h2>
        <p class="mt-1 text-gray-600">Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div class="space-y-2">
            <label for="name" class="block text-lg font-semibold text-sky-600">📛 Name</label>
            <input id="name" name="name" type="text" 
                   class="w-full px-4 py-2 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 shadow-sm" 
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Email Field -->
        <div class="space-y-2">
            <label for="email" class="block text-lg font-semibold text-sky-600">📧 Email</label>
            <input id="email" name="email" type="email" 
                   class="w-full px-4 py-2 bg-sky-50 border border-sky-300 text-sky-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 shadow-sm" 
                   value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email') 
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-sm text-gray-800">
                        Your email address is unverified. 
                        <button form="send-verification" class="text-sky-500 underline hover:text-sky-700">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-green-600 font-medium">A new verification link has been sent to your email.</p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <button type="submit" 
                    class="bg-sky-500 hover:bg-sky-600 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                💾 Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition 
                   x-init="setTimeout(() => show = false, 2000)" 
                   class="text-sm text-green-600 font-medium">
                    ✅ Saved successfully.
                </p>
            @endif
        </div>
    </form>
</section>
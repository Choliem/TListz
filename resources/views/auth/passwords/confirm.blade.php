<x-layout>
    <x-slot:title>
        <div class="text-center">Setting</div>
    </x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Confirm Your Password</h2>

            <p class="text-sm text-center text-gray-600 mb-4">{{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input id="password" type="password"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6 text-center">
                    <button type="submit"
                        class="w-full p-3 bg-black text-white rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-black">
                        {{ __('Confirm Password') }}
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-black hover:underline">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-layout>

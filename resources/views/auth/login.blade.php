<x-layout>
    <x-slot:title>
        <div class="text-center">
            Login Page
        </div>
    </x-slot:title>

    <div class="flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input id="email" type="email"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('email') border-red-500 @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input id="password" type="password"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                            class="form-checkbox text-black h-4 w-4">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Remember Me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-black hover:underline">Forgot
                            your password?</a>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="w-full p-3 bg-black text-white rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-black">Login</button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                        class="text-black hover:underline">Register</a></p>
            </div>
        </div>
    </div>
</x-layout>

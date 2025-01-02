<x-layout>
    <x-slot:title>
        <div class="text-center">Reset Password</div>
    </x-slot:title>
    <div class="flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            @if (session('status'))
                <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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

                <div class="mb-6 text-center">
                    <button type="submit"
                        class="w-full p-3 bg-black text-white rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-black">Send
                        Password Reset Link</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Remember your password? <a href="{{ route('login') }}"
                        class="text-black hover:underline">Login</a></p>
            </div>
        </div>
    </div>
</x-layout>

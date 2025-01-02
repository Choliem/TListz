<x-layout>
    <x-slot:title>
        <div class="text-center">Setting</div>
    </x-slot:title>

    <div class="flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Reset Your Password</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input id="email" type="email"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('email') border-red-500 @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">New Password</label>
                    <input id="password" type="password"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-600">Confirm
                        Password</label>
                    <input id="password-confirm" type="password"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mb-4 text-center">
                    <button type="submit"
                        class="w-full p-3 bg-black text-white rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-black">Reset
                        Password</button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Remember your password? <a href="{{ route('login') }}"
                        class="text-black hover:underline">Login</a></p>
            </div>
        </div>
    </div>
</x-layout>

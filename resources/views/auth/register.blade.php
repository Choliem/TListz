<x-layout>
    <x-slot:title>
        <div class="text-center">Create an Account</div>
    </x-slot:title>

    <div class="flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Full Name</label>
                    <input id="name" type="text"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('name') border-red-500 @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                    <input id="username" type="text"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('username') border-red-500 @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="username">
                    @error('username')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input id="email" type="email"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('email') border-red-500 @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
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
                        class="w-full p-3 bg-black text-white rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-black">Register</button>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}"
                            class="text-black hover:underline">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
</x-layout>

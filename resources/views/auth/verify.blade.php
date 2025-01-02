<x-layout>
    <x-slot:title>
        <div class="text-center">Verify Your Email Address</div>
    </x-slot:title>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
            <div class="mb-4 text-center text-sm text-gray-600">
                {{ __('Before proceeding, please check your email for a verification link.') }}
            </div>

            @if (session('resent'))
                <div class="alert alert-success mb-4 p-3 text-center text-green-700 bg-green-100 rounded-lg">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <div class="text-center text-sm text-gray-600 mb-6">
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline text-black hover:underline focus:outline-none focus:ring-2 focus:ring-black">
                        {{ __('click here to request another') }}
                    </button>.
                </form>
            </div>

            <div class="text-center">
                <a href="{{ route('home') }}" class="text-sm text-black hover:underline">
                    {{ __('Back to Home') }}
                </a>
            </div>
        </div>
    </div>
</x-layout>

<x-layout>
    <x-slot:title>
        <div>{{ $title ?? 'My Page' }}</div>
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="px-4 mx-auto max-w-screen-xl lg:px-6 mt-4">
                <a href="/posts"
                    class="inline-flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-800">
                    &laquo; Back to All Posts
                </a>
                @auth
                    <div class="px-4 mx-auto max-w-screen-xl lg:px-6 mt-4">
                        Username pengguna yang sedang login adalah: {{ auth()->user()->username }}
                    </div>
                @else
                    <p>Tidak ada pengguna yang sedang login.</p>
                @endauth
            </div>
        </div>
    </div>
</x-layout>

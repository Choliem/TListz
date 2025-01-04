<x-layout>
    <x-slot:title>
        <div class="text-center">{{ $title ?? 'Edit Post' }}</div>
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @if (session('success'))
                <div id="success-popup" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto animate__animated animate__fadeInDown">
                        <div class="text-center text-green-700 text-xl font-semibold mb-4">
                            {{ session('success') }}
                        </div>
                        <button onclick="closePopup()"
                            class="w-full py-3 px-4 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Close
                        </button>
                    </div>
                </div>
                <script>
                    function closePopup() {
                        document.getElementById('success-popup').style.display = 'none';
                    }
                </script>
            @endif

            <form action="{{ route('post.update', $post->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                </div>
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Content:</label>
                    <textarea id="body" name="body"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>{{ $post->body }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
                    <select id="category" name="category"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" {{ $category->name == $post->category->name ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Update Post
                </button>
            </form>
        </div>
    </div>
</x-layout>

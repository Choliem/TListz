<x-layout>
    <x-slot:title>
        <div>{{ $title ?? 'Home Page' }}</div>
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

            <!-- Your home page content here -->
        </div>
    </div>
</x-layout>

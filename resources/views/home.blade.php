<x-layout>
    <x-slot:title>
        <div>
            <h1 class=" text-center text-4xl md:text-6xl font-extrabold mb-4 animate__animated animate__fadeInDown">
                Welcome to <span class="text-yellow-400">Tier List Maker</span>
            </h1>
        </div>
    </x-slot:title>

    <div>
        @guest
            <div class="text-center px-6">
                <div class="text-lg md:text-xl max-w-3xl mx-auto m-6 animate__animated animate__fadeInUp">
                    <p>You can make your own tier list and post it.</p>
                    <p>Or browse to someone post looking to their opinions.</p>
                </div>
                <div class="space-x-4">
                    <a href="{{ route('register') }}"
                        class="inline-block px-6 py-3 bg-yellow-400 text-black font-semibold text-lg rounded-lg shadow hover:bg-yellow-500 transform transition-transform hover:scale-105 focus:ring-4 focus:ring-yellow-300 focus:ring-offset-2">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}"
                        class="inline-block px-6 py-3 bg-black text-white font-semibold text-lg rounded-lg shadow hover:bg-gray-800 transform transition-transform hover:scale-105 focus:ring-4 focus:ring-black focus:ring-offset-2">
                        Login
                    </a>
                </div>
            </div>
        @endguest

        @auth
            <div
                class="flex flex-col items-center justify-center space-y-6 py-12 px-6 bg-gradient-to-r from-yellow-400 via-gray-500 to-black text-white rounded-lg shadow-lg transform transition-transform hover:scale-105 animate__animated animate__fadeInUp">
                <h1 class="text-3xl font-bold md:text-4xl">Welcome Back, {{ Auth::user()->name }}!</h1>
                <p class="text-lg md:text-xl text-center max-w-2xl">
                    Dive into your personalized tier lists or explore new posts from the community.
                </p>
                {{-- <div class="flex space-x-4">
                    <a href="{{ route('your-tier-lists') }}"
                        class="px-6 py-3 bg-green-500 text-lg font-semibold rounded-lg shadow hover:bg-green-600 transform transition-transform hover:scale-110 focus:ring-4 focus:ring-green-300">
                        My Tier Lists
                    </a>
                    <a href="{{ route('browse-posts') }}"
                        class="px-6 py-3 bg-blue-500 text-lg font-semibold rounded-lg shadow hover:bg-blue-600 transform transition-transform hover:scale-110 focus:ring-4 focus:ring-blue-300">
                        Explore Posts
                    </a>
                </div> --}}
            </div>
        @endauth



        <!-- Features Section -->
        <div class="mt-8 px-6 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-white text-indigo-800 rounded-lg shadow-lg p-6 text-center transition-transform hover:scale-105 animate__animated animate__fadeInUp">
                    <svg class="w-16 h-16 mx-auto mb-4 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 24 24">" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
                    </svg>

                    <h3 class="text-xl font-semibold mb-2">Most Liked</h3>
                    <p>Browse the most liked Tier List post ever.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white text-indigo-800 rounded-lg shadow-lg p-6 text-center transition-transform hover:scale-105 animate__animated animate__fadeInUp">
                    <svg class="w-16 h-16 mx-auto mb-4 text-yellow-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                    </svg>

                    <h3 class="text-xl font-semibold mb-2">Most Commented</h3>
                    <p>Browse the most commented Tier List post ever.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white text-indigo-800 rounded-lg shadow-lg p-6 text-center transition-transform hover:scale-105 animate__animated animate__fadeInUp">
                    <svg class="w-16 h-16 mx-auto mb-4 text-yellow-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M6 5a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L15.249 6H19a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v-5a3 3 0 0 0-3-3h-3.22l-1.14-1.682A3 3 0 0 0 9.157 6H6V5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L12.249 10H3V9Zm0 3v7a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-7H3Z"
                            clip-rule="evenodd" />
                    </svg>

                    <h3 class="text-xl font-semibold mb-2">Best Categories</h3>
                    <p>Browse the best Category with the most Tier List posts.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

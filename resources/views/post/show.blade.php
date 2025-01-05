<x-layout>
    <x-slot:title>
        {{ $title ?? 'Default Title' }}
    </x-slot:title>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-xs text-blue-600 hover:underline">&laquo; Back To All
                        Posts</a>

                    {{-- Tombol Edit Post --}}
                    <div class="px-4 mx-auto max-w-screen-xl lg:px-6">
                        @auth
                            @if (auth()->user()->name === $post->author->name)
                                <div class="flex justify-center mb-4">
                                    <a href="{{ route('post.edit', $post->slug) }}"
                                        class="flex items-center gap-2 py-2 px-4 text-sm font-medium text-white bg-gradient-to-r from-yellow-500 to-yellow-700 hover:from-yellow-600 hover:to-yellow-800 rounded-lg shadow-lg transform transition-transform hover:scale-105 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800 sm:gap-3 sm:px-6 sm:text-base">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <span class="hidden sm:inline">Edit Post</span>
                                    </a>
                                </div>

                                {{-- Tombol Delete Post --}}
                                <div class="flex justify-center mb-4">
                                    <button onclick="showPopup()"
                                        class="flex items-center gap-2 py-2 px-4 text-sm font-medium text-white bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 rounded-lg shadow-lg transform transition-transform hover:scale-105 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800 sm:gap-3 sm:px-6 sm:text-base">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <span class="hidden sm:inline">Delete Post</span>
                                    </button>
                                </div>

                                {{-- Confirmation Pop-up --}}
                                <div id="confirmation-popup"
                                    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
                                    <div
                                        class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto animate__animated animate__fadeInDown">
                                        <div class="text-center text-red-700 text-xl font-semibold mb-4">
                                            Are you sure you want to delete the "{{ $post->title }}" post?
                                        </div>
                                        <div class="flex justify-center gap-4">
                                            <button onclick="deletePost()"
                                                class="w-full py-3 px-4 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                Delete
                                            </button>
                                            <button onclick="closePopup()"
                                                class="w-full py-3 px-4 bg-gray-600 text-white font-semibold rounded-md shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function showPopup() {
                                        document.getElementById('confirmation-popup').style.display = 'flex';
                                    }

                                    function closePopup() {
                                        document.getElementById('confirmation-popup').style.display = 'none';
                                    }

                                    function deletePost() {
                                        document.getElementById('delete-post-form').submit();
                                    }
                                </script>

                                {{-- Hidden Delete Form --}}
                                <form id="delete-post-form" action="{{ route('post.delete', $post->slug) }}" method="POST"
                                    class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        @endauth
                    </div>

                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">
                                    {{ $post->created_at->diffForHumans() }}</time></p>
                                <a href="/posts?category={{ $post->category->slug }}">
                                    <span
                                        class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>
                </header>


                <section>
                    <div class="container mx-auto">
                        {{-- Judul --}}
                        <h1 class="text-3xl font-bold mb-5">{{ $post->title }}</h1>
                        {{-- Text - Body --}}
                        <p>{{ $post->body }}</p>

                        <!-- Tier List Container -->
                        <div id="tier-list" class="tier-list">
                            @foreach ($post->tiers as $tier)
                                <div class="tier-row">
                                    <div class="tier-label">{{ $tier->name }}</div>
                                    <div class="tier-items" id="{{ Str::slug($tier->name) }}-tier">
                                        @foreach ($tier->items as $item)
                                            <div class="tier-item" id="item-{{ $item->id }}">{{ $item->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </main>

    <style>
        .tier-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .tier-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
            padding: 15px;
            border-radius: 12px;
            background-color: #a2a0a5;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .tier-row.hovered {
            background-color: rgba(150, 150, 150, 0.3);
            transition: background-color 0.3s;
        }

        .tier-label {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            background-color: #f7f7f7;
            display: inline-block;
            /* Allows the box to adjust to the content */
        }

        .tier-items {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            overflow: hidden;
        }

        .tier-item {
            padding: 10px;
            background-color: #e5e7eb;
            border-radius: 5px;
            display: inline-block;
            /* Allows the box to adjust to the content */
        }

        .tier-item.hidden {
            display: none;
        }
    </style>

</x-layout>

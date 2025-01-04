<x-layout>
    <x-slot:title>
        <div class="text-center">{{ $title ?? 'Default Title' }}</div>
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @if (session('success'))
                <div id="success-popup"
                    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                    <div
                        class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto animate__animated animate__fadeInDown">
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
                            <option value="{{ $category->name }}"
                                {{ $category->name == $post->category->name ? 'selected' : '' }}>
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


            <section>
                <div class="pt-8 container mx-auto">
                    {{-- Tlist --}}
                    <h3 class="text-3xl font-bold mb-5">Tier List</h3>

                    <!-- Tier List Container -->
                    <div id="tier-list" class="tier-list">
                        @foreach ($post->tiers as $tier)
                            <div class="tier-row">
                                <div class="tier-label">{{ $tier->name }} Tier</div>
                                <div class="tier-items" id="{{ Str::slug($tier->name) }}-tier">
                                    @foreach ($tier->items as $item)
                                        <div class="tier-item" id="item-{{ $item->id }}" draggable="true">
                                            {{ $item->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add Tier Button -->
                    <div class="flex my-4"> <button id="add-tier-btn"
                            class="flex items-center gap-2 py-2 px-4 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 rounded-lg shadow-lg transform transition-transform hover:scale-105 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 sm:gap-3 sm:px-6 sm:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="hidden sm:inline">Add Tier</span>
                        </button>
                    </div>

                    <!-- Items to Drag -->
                    <div class="mt-10">
                        <h2 class="text-2xl font-bold mb-5">Items</h2>
                        <div class="flex gap-3 flex-wrap" id="items-container">
                            @foreach ($post->tiers->flatMap->items as $item)
                                @if (is_null($item->tier_id))
                                    <div class="tier-item" id="item-{{ $item->id }}" draggable="true">
                                        {{ $item->name }}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

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
                    cursor: grab;
                    display: inline-block;
                    /* Allows the box to adjust to the content */
                }

                .tier-item:active {
                    cursor: grabbing;
                }

                .tier-item.hidden {
                    display: none;
                }

                #items-container {
                    background-color: #ffffff;
                    padding: 15px;
                    border-radius: 10px;
                    border: 1px dashed #000000;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const items = document.querySelectorAll('.tier-item');
                    const rows = document.querySelectorAll('.tier-row');
                    const itemsContainer = document.getElementById('items-container');
                    const tierList = document.getElementById('tier-list');
                    const addTierBtn = document.getElementById('add-tier-btn');

                    let draggedItem = null; // Track the dragged item

                    // Allow dragging items
                    items.forEach(item => {
                        item.addEventListener('dragstart', (e) => {
                            draggedItem = item;
                            setTimeout(() => item.classList.add('hidden'),
                                0); // Hide the item while dragging
                        });

                        item.addEventListener('dragend', () => {
                            draggedItem = null;
                            items.forEach(item => item.classList.remove('hidden'));
                        });
                    });

                    // Allow rows to accept items
                    rows.forEach(row => {
                        row.addEventListener('dragover', (e) => {
                            e.preventDefault(); // Allow dropping
                            row.classList.add('hovered');
                        });

                        row.addEventListener('dragleave', () => {
                            row.classList.remove('hovered');
                        });

                        row.addEventListener('drop', (e) => {
                            e.preventDefault();
                            row.classList.remove('hovered');

                            if (draggedItem) {
                                // Insert the item after the tier-label
                                const label = row.querySelector('.tier-label');
                                row.insertBefore(draggedItem, label.nextSibling);
                            }
                        });
                    });

                    // Allow items to be dragged back to the items container
                    itemsContainer.addEventListener('dragover', (e) => {
                        e.preventDefault(); // Allow dropping in the items container
                    });

                    itemsContainer.addEventListener('drop', (e) => {
                        e.preventDefault();
                        if (draggedItem) {
                            itemsContainer.appendChild(draggedItem); // Move the item back to the items container
                        }
                    });

                    // This ensures that the items are draggable in both the container and tier rows
                    itemsContainer.addEventListener('dragenter', (e) => {
                        if (draggedItem) {
                            e.preventDefault(); // Ensure we allow dragging even when the container is empty
                        }
                    });

                    // Add a new tier row
                    addTierBtn.addEventListener('click', () => {
                        const tierCount = tierList.childElementCount + 1; // Count the existing tiers
                        const newRow = document.createElement('div');
                        newRow.classList.add('tier-row');

                        const newLabel = document.createElement('div');
                        newLabel.classList.add('tier-label');
                        newLabel.textContent = `Tier ${tierCount}`;

                        const newItemsContainer = document.createElement('div');
                        newItemsContainer.classList.add('tier-items');

                        newRow.appendChild(newLabel);
                        newRow.appendChild(newItemsContainer);
                        tierList.appendChild(newRow);

                        // Add drag and drop event listeners to the new row
                        newRow.addEventListener('dragover', (e) => {
                            e.preventDefault(); // Allow dropping
                            newRow.classList.add('hovered');
                        });

                        newRow.addEventListener('dragleave', () => {
                            newRow.classList.remove('hovered');
                        });

                        newRow.addEventListener('drop', (e) => {
                            e.preventDefault();
                            newRow.classList.remove('hovered');

                            if (draggedItem) {
                                // Insert the item after the tier-label
                                newRow.insertBefore(draggedItem, newLabel.nextSibling);
                            }
                        });

                        // Send an AJAX request to save the new tier
                        fetch('/tiers', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content')
                                },
                                body: JSON.stringify({
                                    name: `Tier ${tierCount}`,
                                    rank: tierCount,
                                    post_id: '{{ $post->id }}'
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Tier added successfully:', data);
                            })
                            .catch(error => {
                                console.error('Error adding tier:', error);
                            });
                    });
                });
            </script>
        </div>
    </div>
</x-layout>

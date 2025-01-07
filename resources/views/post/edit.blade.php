<x-layout>
    <x-slot:title>
        <div class="text-center">{{ $title ?? 'Default Title' }}</div>
    </x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="pb-4"><a href="/posts/{{ $post['slug'] }}"
                    class="font-medium text-xs text-blue-600 hover:underline">&laquo; Back To My
                    Post</a></div>
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

            <form action="{{ route('post.update', $post->slug) }}" method="POST"> @csrf @method('PUT')

                {{-- Title Input --}}
                <div class="mb-4"> <label for="title"
                        class="block text-sm font-medium text-gray-700">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                </div>

                {{-- Text Input --}}
                <div class="mb-4"> <label for="body"
                        class="block text-sm font-medium text-gray-700">Content:</label>
                    <textarea id="body" name="body"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>{{ $post->body }}</textarea>
                </div>

                {{-- Category Input --}}
                <div class="mb-4"> <label for="category"
                        class="block text-sm font-medium text-gray-700">Category:</label> <select id="category"
                        name="category"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}"
                                {{ $category->name == $post->category->name ? 'selected' : '' }}> {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="deleted_tiers" id="deleted-tiers">

                <div class="pt-8 container mx-auto">
                    <h3 class="text-3xl font-bold mb-5">Tier List</h3>
                    <div id="tier-list" class="tier-list">
                        @foreach ($post->tiers as $tier)
                            <div class="tier-row" data-tier-id="{{ $tier->id }}">
                                <div class="flex gap-2 mt-2"> <button type="button"
                                        class="delete-tier-btn py-2 px-2 text-white font-semibold rounded-md shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg> </button> </div>
                                <div class="tier-label"> <input type="text" name="tiers[{{ $tier->id }}][name]"
                                        value="{{ $tier->name }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                <div class="tier-items" id="{{ Str::slug($tier->name) }}-tier">
                                    @foreach ($tier->items as $item)
                                        <div class="tier-item" id="item-{{ $item->id }}" draggable="true">
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                                class="tier-item-image" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add Tier Button -->
                    <div class="flex my-4">
                        <button id="add-tier-btn"
                            class="flex items-center gap-2 py-2 px-4 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 rounded-lg shadow-lg transform transition-transform hover:scale-105 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 sm:gap-3 sm:px-6 sm:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="hidden sm:inline">Add Tier</span>
                        </button>
                    </div>

                    <!-- Items to Drag -->
                    <div class="pt-8 container mx-auto">
                        <h3 class="text-3xl font-bold mb-5 flex items-center justify-between"> Items <button
                                type="button" id="add-item-btn"
                                class="ml-4 py-2 px-4 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 rounded-lg shadow-lg transform transition-transform hover:scale-105 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 sm:gap-3 sm:px-6 sm:text-base">
                                Add Item </button> </h3>
                        <div class="flex gap-3 flex-wrap" id="items-container">
                            @foreach ($unassignedItems as $item)
                                <div class="tier-item" id="item-{{ $item->id }}" draggable="true">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                        class="tier-item-image" />
                                </div>
                            @endforeach
                        </div>
                    </div>


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

                        .tier-item-image {
                            max-width: 100%;
                            max-height: 100px;
                            border-radius: 5px;
                            object-fit: cover;
                        }
                    </style>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            // DOM Elements
                            const itemsContainer = document.getElementById('items-container');
                            const tierList = document.getElementById('tier-list');
                            const addTierBtn = document.getElementById('add-tier-btn');
                            const addItemBtn = document.getElementById('add-item-btn');
                            const addItemPopup = document.getElementById('add-item-popup');
                            const addItemForm = document.getElementById('add-item-form');
                            const submitItemBtn = document.getElementById('submit-item-btn');
                            const cancelItemBtn = document.getElementById('cancel-item-btn');
                            let draggedItem = null; // Track the dragged item

                            // ===== DRAG AND DROP FUNCTIONALITY =====
                            function enableDragAndDrop() {
                                const items = document.querySelectorAll('.tier-item');
                                const rows = document.querySelectorAll('.tier-row');

                                // Allow dragging items
                                items.forEach(item => {
                                    item.addEventListener('dragstart', () => {
                                        draggedItem = item;
                                        setTimeout(() => item.classList.add('hidden'),
                                            0); // Hide item while dragging
                                    });

                                    item.addEventListener('dragend', () => {
                                        draggedItem = null;
                                        items.forEach(item => item.classList.remove('hidden'));
                                    });
                                });

                                // Allow rows to accept items
                                rows.forEach(row => {
                                    row.addEventListener('dragover', (e) => {
                                        e.preventDefault();
                                        row.classList.add('hovered');
                                    });

                                    row.addEventListener('dragleave', () => {
                                        row.classList.remove('hovered');
                                    });

                                    row.addEventListener('drop', (e) => {
                                        e.preventDefault();
                                        row.classList.remove('hovered');

                                        if (draggedItem) {
                                            const tierId = row.getAttribute('data-tier-id'); // Get tier ID from row
                                            row.appendChild(draggedItem); // Move the dragged item to the new tier
                                            saveItemToTier(draggedItem, tierId);
                                        }
                                    });
                                });

                                // Allow items to be dragged back to the items container
                                itemsContainer.addEventListener('dragover', (e) => e.preventDefault());
                                itemsContainer.addEventListener('drop', (e) => {
                                    e.preventDefault();
                                    if (draggedItem) {
                                        itemsContainer.appendChild(draggedItem); // Move item back to container
                                        saveItemToTier(draggedItem, null); // Update to 'null' tier (container)
                                    }
                                });
                            }

                            // Save item placement to the server (via AJAX)
                            function saveItemToTier(item, tierId) {
                                const itemId = item.getAttribute('id').replace('item-', ''); // Extract item ID
                                console.log('Item ID:', itemId); // Ensure this outputs a valid ID

                                fetch(`/items/${itemId}/assign-tier`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                'content')
                                        },
                                        body: JSON.stringify({
                                            tier_id: tierId
                                        })
                                    })
                                    .then(response => {
                                        if (response.ok) {
                                            console.log(
                                                `Item ${itemId} successfully assigned to tier ${tierId || 'Items Container'}.`
                                            );
                                        } else {
                                            console.error('Failed to assign item:', response.statusText);
                                        }
                                    })
                                    .catch(error => console.error('Error saving item placement:', error));
                            }


                            // ===== ADD TIER FUNCTIONALITY =====
                            function addNewTier() {
                                const tierCount = tierList.childElementCount + 1; // Count existing tiers
                                const newRow = document.createElement('div');
                                newRow.classList.add('tier-row');
                                newRow.setAttribute('data-tier-id', tierCount); // Assign a unique ID or fetched ID for the tier

                                const newLabel = document.createElement('div');
                                newLabel.classList.add('tier-label');
                                newLabel.innerHTML = `
            <input type="text" name="tiers[${tierCount}][name]"
            value="Tier ${tierCount}"
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        `;

                                const newItemsContainer = document.createElement('div');
                                newItemsContainer.classList.add('tier-items');

                                newRow.appendChild(newLabel);
                                newRow.appendChild(newItemsContainer);
                                tierList.appendChild(newRow);

                                // Add drag and drop event listeners to the new row
                                enableDragAndDrop();

                                // Save the new tier to the server
                                fetch('/tiers', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                'content')
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
                                        newRow.setAttribute('data-tier-id', data.id); // Update with the tier ID from the server
                                    })
                                    .catch(error => console.error('Error adding tier:', error));
                            }

                            // ===== ITEM POP-UP FORM FUNCTIONALITY =====
                            function handleAddItemPopup() {
                                // Show pop-up form
                                addItemBtn.addEventListener('click', () => {
                                    addItemPopup.classList.remove('hidden');
                                });

                                // Hide pop-up form
                                cancelItemBtn.addEventListener('click', () => {
                                    addItemPopup.classList.add('hidden');
                                });

                                // Submit new item
                                submitItemBtn.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    const formData = new FormData(addItemForm);
                                    const itemData = {
                                        name: formData.get('name'),
                                        image: formData.get('image'),
                                        description: formData.get('description'),
                                        tier_id: formData.get('tier_id') || null, // Allow null if no tier selected
                                        post_id: formData.get('post_id') // Ensure post_id is set
                                    };

                                    fetch('/items', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                    .getAttribute('content')
                                            },
                                            body: JSON.stringify(itemData)
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log('Item added successfully:', data);

                                            // Create new item element
                                            const newItem = document.createElement('div');
                                            newItem.classList.add('tier-item');
                                            newItem.setAttribute('id', `item-${data.id}`);
                                            newItem.setAttribute('draggable', 'true');
                                            newItem.textContent = itemData.name;

                                            // Append item to the correct container
                                            if (!itemData.tier_id) {
                                                itemsContainer.appendChild(newItem); // Add to container if no tier ID
                                            } else {
                                                const tierItemsContainer = document.querySelector(
                                                    `#tier-${itemData.tier_id}-items`);
                                                if (tierItemsContainer) {
                                                    tierItemsContainer.appendChild(newItem);
                                                }
                                            }

                                            // Reset and hide the form
                                            addItemForm.reset();
                                            addItemPopup.classList.add('hidden');

                                            // Re-enable drag and drop functionality
                                            enableDragAndDrop();
                                        })
                                        .catch(error => console.error('Error adding item:', error));
                                });
                            }

                            // ===== INITIALIZATION =====
                            enableDragAndDrop();
                            addTierBtn.addEventListener('click', addNewTier);
                            handleAddItemPopup();
                        });
                        document.getElementById('tier-list').addEventListener('click', (e) => {
                            const button = e.target.closest('.delete-tier-btn');
                            if (button) {
                                const tierRow = button.closest('.tier-row');
                                const tierId = tierRow.getAttribute('data-tier-id');

                                // Send an AJAX request to delete the tier
                                fetch(`/tiers/${tierId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                'content')
                                        }
                                    })
                                    .then(response => {
                                        if (response.ok) {
                                            console.log('Tier deleted successfully');
                                            tierRow.remove();
                                        } else {
                                            console.error('Error deleting tier:', response.statusText);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error deleting tier:', error);
                                    });
                            }
                        });
                    </script>

                    {{-- Update Post --}}
                    <div class="pt-10 pb-4"> <button type="submit"
                            class="w-full py-4 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Update Post </button>
                    </div>
            </form>

            <!-- Add Item Pop-up Form Container -->
            <div id="add-item-popup"
                class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                    <!-- Add Item Form -->
                    <form id="add-item-form">
                        <div class="mb-4">
                            <label for="item-name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" id="item-name" name="name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="item-image" class="block text-sm font-medium text-gray-700">Image:</label>
                            <input type="text" id="item-image" name="image"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="item-description"
                                class="block text-sm font-medium text-gray-700">Description:</label>
                            <textarea id="item-description" name="description"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="item-tier" class="block text-sm font-medium text-gray-700">Tier:</label>
                            <select id="item-tier" name="tier_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">None</option>
                                @foreach ($post->tiers as $tier)
                                    <option value="{{ $tier->id }}">{{ $tier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="button" id="submit-item-btn"
                            class="w-full py-3 px-4 bg-green-600 text-white font-semibold rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Add
                            Item</button>
                        <button type="button" id="cancel-item-btn"
                            class="w-full py-3 px-4 mt-2 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-layout>

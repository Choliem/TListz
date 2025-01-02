<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>

    


    <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-xs text-blue-600 hover:underline">&laquo; Back To All
                        Posts</a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="<?php echo e($post->author->name); ?>">
                            <div>
                                <a href="/posts?author=<?php echo e($post->author->username); ?>" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white"><?php echo e($post->author->name); ?></a>
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">
                                    <?php echo e($post->created_at->diffForHumans()); ?></time></p>
                                <a href="/posts?category=<?php echo e($post->category->slug); ?>">
                                    <span
                                        class="bg-<?php echo e($post->category->color); ?>-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        
                                        <?php echo e($post->category->name); ?>

                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>

                    
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        <?php echo e($post->title); ?>

                </header>
                <p><?php echo e($post->body); ?></p>





                
                <section>
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
                            width: 100px;
                            text-align: center;
                            padding: 10px;
                            border-radius: 5px;
                            background-color: #f7f7f7;
                        }

                        .tier-items {
                            display: flex;
                            gap: 10px;
                            flex-wrap: wrap;
                        }

                        .tier-item {
                            padding: 10px;
                            background-color: #e5e7eb;
                            border-radius: 5px;
                            cursor: grab;
                        }

                        .tier-item:active {
                            cursor: grabbing;
                        }

                        .tier-item.hidden {
                            display: none;
                        }
                    </style>

                    <div class="container mx-auto">
                        <h1 class="text-3xl font-bold mb-5">Tier List Maker</h1>

                        <!-- Tier List Container -->
                        <div class="tier-list">
                            <!-- Tier Row Example -->
                            <div class="tier-row">
                                <div class="tier-label">S Tier</div>
                                <div class="tier-items" id="s-tier">
                                    <!-- Items will be dragged here -->
                                </div>
                            </div>
                            <div class="tier-row">
                                <div class="tier-label">A Tier</div>
                                <div class="tier-items" id="a-tier">
                                    <!-- Items will be dragged here -->
                                </div>
                            </div>
                            <div class="tier-row">
                                <div class="tier-label">B Tier</div>
                                <div class="tier-items" id="b-tier">
                                    <!-- Items will be dragged here -->
                                </div>
                            </div>
                            <div class="tier-row">
                                <div class="tier-label">C Tier</div>
                                <div class="tier-items" id="c-tier">
                                    <!-- Items will be dragged here -->
                                </div>
                            </div>
                            <div class="tier-row">
                                <div class="tier-label">D Tier</div>
                                <div class="tier-items" id="d-tier">
                                    <!-- Items will be dragged here -->
                                </div>
                            </div>
                        </div>

                        <!-- Items to Drag -->
                        <div class="mt-10">
                            <h2 class="text-2xl font-bold mb-5">Items</h2>
                            <div class="flex gap-3 flex-wrap" id="items-container">
                                <div class="tier-item" id="item-1" draggable="true">Item 1</div>
                                <div class="tier-item" id="item-2" draggable="true">Item 2</div>
                                <div class="tier-item" id="item-3" draggable="true">Item 3</div>
                                <div class="tier-item" id="item-4" draggable="true">Item 4</div>
                                <div class="tier-item" id="item-5" draggable="true">Item 5</div>
                            </div>

                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const items = document.querySelectorAll('.tier-item');
                            const rows = document.querySelectorAll('.tier-row');

                            let draggedItem = null; // Track the dragged item

                            items.forEach(item => {
                                // Start dragging
                                item.addEventListener('dragstart', (e) => {
                                    draggedItem = item;
                                    setTimeout(() => item.classList.add('hidden'),
                                        0); // Hide the item while dragging
                                });

                                // End dragging
                                item.addEventListener('dragend', () => {
                                    draggedItem = null;
                                    items.forEach(item => item.classList.remove('hidden'));
                                });
                            });

                            rows.forEach(row => {
                                // Dragging over a row
                                row.addEventListener('dragover', (e) => {
                                    e.preventDefault(); // Allow dropping
                                    row.classList.add('hovered');
                                });

                                // Leaving the row area
                                row.addEventListener('dragleave', () => {
                                    row.classList.remove('hovered');
                                });

                                // Dropping the item
                                row.addEventListener('drop', (e) => {
                                    e.preventDefault();
                                    row.classList.remove('hovered');

                                    if (draggedItem) {
                                        // Insert the item after the tier-label
                                        const label = row.querySelector('.tier-label');
                                        row.insertBefore(draggedItem, label
                                            .nextSibling); // Insert item next to the label
                                    }
                                });
                            });
                        });
                    </script>


                </section>





















                
                
                
            </article>
        </div>
    </main>

    

    

    

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php /**PATH D:\PROGRAMMING\Laragon\laragon\www\laravel11-herd-2ndtest\resources\views/post.blade.php ENDPATH**/ ?>
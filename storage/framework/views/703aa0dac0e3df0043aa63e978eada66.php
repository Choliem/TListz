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

        <article class="py-8 max-w-screen-md">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900"><?php echo e($post['title']); ?></h2>
            <div>
                By
                <a href="/authors/<?php echo e($post->author->username); ?>" class="hover:underline text-base text-gray-500"><?php echo e($post->author->name); ?></a>
                in
                <a href="/categories/<?php echo e($post->category->slug); ?>" class="hover:underline text-base text-gray-500"><?php echo e($post->category->name); ?></a> | <?php echo e($post->created_at->diffForHumans()); ?>

            </div>
            <p class="my-4 font-light"> <?php echo e($post['body']); ?> </p>
            <a href="/posts" class="font-medium text-blue-500 hover:underline">Back To Post &laquo;</a>
        </article>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?><?php /**PATH D:\PROGRAMMING\Laravel HERD\HERD\Herd\laravel11-herd-2ndtest\resources\views/post.blade.php ENDPATH**/ ?>
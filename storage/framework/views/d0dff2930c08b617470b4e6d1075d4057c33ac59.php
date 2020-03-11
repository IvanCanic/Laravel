<?php $__env->startSection('content'); ?>

<section class="posts-section">


    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


    <div class="post">
    
        <div class="post-header">
            <a href=/posts/<?php echo e($post->id); ?>><h2><?php echo e($post->title); ?></h2></a>
            <p class="text">Posted by <a href=/posts/author/<?php echo e($post->user->id); ?> ><?php echo e($post->user->name); ?></a> on <?php echo e($post->created_at); ?> | <?php echo e($post->comments->count()); ?> comments </p> 
        </div>

        <div class="post-body">
            <p><?php echo e($post->description); ?></p>
        </div>

        <div class="post-footer">
            <p class="text">Posted in <a href=/posts/<?php echo e($post->category); ?> ><?php echo e($post->category); ?></a> |</p> 
        </div>
    
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($posts->links()); ?>


</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lsapp\resources\views/posts/category.blade.php ENDPATH**/ ?>
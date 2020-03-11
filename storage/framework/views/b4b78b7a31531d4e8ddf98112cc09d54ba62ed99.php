<?php $__env->startSection('content'); ?>

<section class="posts-section">


    <div class="post">
    
        <div class="post-header">
            <h2><?php echo e($post->title); ?></h2>
            <p class="text">Posted by <a href=/posts/author/<?php echo e($post->user->id); ?> ><?php echo e($post->user->name); ?></a> on <?php echo e($post->created_at); ?> | <?php echo e($post->comments->count()); ?> comments </p> 
        </div>

        <div class="post-body">
            <p><?php echo e($post->description); ?></p>
        </div>

        <div class="post-footer">
            <p class="text">Posted in <a href=/posts/<?php echo e($post->category); ?> ><?php echo e($post->category); ?></a> |</p>

            <div class="btn-container">

                    <?php if(auth()->guard()->check()): ?>

                    <a class="btn-edit" href=<?php echo e($post->id); ?>/edit class="edit-post" >Edit your post</a>
                    <form action=<?php echo e($post->id); ?> method="POST">

                    <?php echo csrf_field(); ?> 

                    <?php echo method_field('DELETE'); ?>

                        <input type="submit" value="Delete your post">

                    </form>

                    <?php endif; ?>


            </div>

            
        </div>
    
    </div>

    <div class="comments">
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="comment">
            <h5>Posted by <?php echo e($comment->nickname); ?> on <span><?php echo e($comment->created_at); ?></span></h5>
            
            <p><?php echo e($comment->comment); ?></p>
        </div>
         
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="make-comment">
        <form action=/posts/comment/<?php echo e($post->id); ?> method="POST">

        <?php echo csrf_field(); ?>
        
            <div class="f">
                <label for="nickname">Nickname</label>
                <input type="text" name="nickname" id="nickname" value=<?php echo e(old('nickname')); ?>>
                <?php $__errorArgs = ['nickname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="errorfield"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="f">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10"><?php echo e(old('comment')); ?></textarea>
                <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="errorfield"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="f">
                <input type="submit" id="submite-comment" value="Make a comment...">
            </div>

        </form>
    </div>

    <a class="back-button" href="/posts">Back to the posts</a>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lsapp\resources\views/posts/show.blade.php ENDPATH**/ ?>
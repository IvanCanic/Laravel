<?php $__env->startSection('content'); ?>


<section id="createpost">

    <Form action="/posts/create" method="POST">

    <?php echo csrf_field(); ?>

        <div class="f">
            <label for="title" >Title</label>
            <input type="text" name="title" id="title" autocomplete="off" value=<?php echo e(old('title')); ?> >
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="errorfield"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="f">
            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="movie">Movie</option>
                <option value="tvshow">Tv Show</option>
        </select>
        </div>
        <div class="f">
            <label for="description">Post body</label>
            <textarea name="description" id="description" cols="30" rows="10"><?php echo e(old('description')); ?></textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="errorfield"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="f">
            <input type="submit" value="Create your post">
        </div>
       
    </Form>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lsapp\resources\views/posts/create.blade.php ENDPATH**/ ?>
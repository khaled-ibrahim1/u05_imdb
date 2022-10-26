<?php if(session()->has('success')): ?>
<div class="alert alert-<?php echo e(session('color')); ?> m-0 alert-dismissible fade show" role="alert" x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show">
    <?php echo e(session('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?><?php /**PATH C:\xampp1\htdocs\IMDB-clone-main - kopia\resources\views/components/flash.blade.php ENDPATH**/ ?>
<div class="btn-group mb-2">
    <button type="button" class="btn btn-dark btn-lg dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo e(isset($currentCategory) ? ucwords($currentCategory->name) : 'Genre'); ?>

    </button>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="/?<?php echo e(http_build_query(request()->except('category', 'page'))); ?>" :active="request()->routeIs('home')">All</a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a class="dropdown-item" href="/?category=<?php echo e($category->slug); ?>&<?php echo e(http_build_query(request()->except('category', 'page'))); ?>" :active='request()->is("categories/{$category->slug}")'><?php echo e(ucwords($category->name)); ?>

            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div><?php /**PATH C:\xampp1\htdocs\IMDB-clone-main - kopia\resources\views/components/category-dropdown.blade.php ENDPATH**/ ?>
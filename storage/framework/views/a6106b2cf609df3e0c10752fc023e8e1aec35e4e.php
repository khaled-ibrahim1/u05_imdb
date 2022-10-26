<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

  <!-- DROPDOWN FOR CATEGORIES -->
  <div class="container ">
    <div class="d-flex flex-column flex-md-row align-items-center mt-4">
      <?php if (isset($component)) { $__componentOriginal4f66722947691db01920253e9e2edd1fa3282e1d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryDropdown::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('category-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CategoryDropdown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f66722947691db01920253e9e2edd1fa3282e1d)): ?>
<?php $component = $__componentOriginal4f66722947691db01920253e9e2edd1fa3282e1d; ?>
<?php unset($__componentOriginal4f66722947691db01920253e9e2edd1fa3282e1d); ?>
<?php endif; ?>
      <!-- SEARCH BAR -->
      <div class="w-100 mb-2">
        <form class="d-flex" method="GET" action="/">
          <?php if(request('category')): ?>
          <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
          <?php endif; ?>
          <input type="search" name="search" class="form-control fs-5 pt-2 pb-2" placeholder="Search..." aria-label="Search" value="<?php echo e(request('search')); ?>" type="submit" style="border-radius: 5px 0px 0px 5px">
          <button class="btn btn-dark" type="submit" style="border-radius: 0px 5px 5px 0px">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- GRID FOR POSTERS -->
  <div class="container">
    <div class="row text-center mt-4">
      <?php if($movies->count()): ?>
      <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-6 col-md-5-justify-content-center offset-md-0 offset-lg-0 col-lg-3 brightness">
        <a class="text-decoration-none" href="/movies/<?php echo e($movie->slug); ?>">
          <div class="fade-in">
            <img src="<?php echo e($movie->photo_poster); ?>" class="img-fluid rounded" alt="<?php echo e($movie->title); ?>">
            <p class="fs-4 mb-0 link-dark"><?php echo e($movie->title); ?></p>
            <p class="link-dark"><?php echo e($movie->year); ?></p>
          </div>
        </a>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php echo e($movies->links()); ?> <!-- RENDER THE PAGINATIONS LINKS -->
      <?php else: ?>
      <p>No movies. Please check back later.</p>
      <?php endif; ?>
    </div>
  </div>
  </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\xampp1\htdocs\IMDB-clone-main - kopia\resources\views/movies/index.blade.php ENDPATH**/ ?>
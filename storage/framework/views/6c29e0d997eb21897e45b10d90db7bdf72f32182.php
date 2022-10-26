<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if($lists->count()): ?>
    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container">
        <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
            <span style="background: rgb(255, 255, 255); padding-right: 14px;">Your movielist: <?php echo e(ucwords($list->title)); ?></span>
        </h2>
    </div>

    <!-- GRID FOR POSTERS -->
    <div class="container">
        <div class="row text-center">
            <?php if($list->movies->count()): ?>
            <?php $__currentLoopData = $list->movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-md-5-justify-content-center offset-md-0 offset-lg-0 col-lg-3 brightness my-4 position-relative">
                <a class="text-decoration-none" href="/movies/<?php echo e($movie->slug); ?>">
                    <div class="fade-in">
                        <img src="<?php echo e($movie->photo_poster); ?>" class="img-fluid rounded" alt="<?php echo e($movie->title); ?>">
                        <h5 class="my-2 pb-3 link-dark"><?php echo e($movie->title); ?></p>
                            <small class="text-muted position-absolute bottom-0 start-0 ms-3"><?php echo e($movie->pivot->created_at->diffForHumans()); ?></small>
                            <form class="position-absolute top-0 end-0 me-3 mt-1" method="POST" action="/lists/delete">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                                <input type="hidden" name="mlist_id" value="<?php echo e($list->id); ?>">
                                <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center">
                                    <ion-icon class="" style="padding-top: 0.8px;" name="close-outline"></ion-icon>
                                </button>
                            </form>

                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <p>No movies added to your Movielist.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="container">
        <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
            <span style="background: rgb(255, 255, 255); padding-right: 14px;">No created movielists</span>
        </h2>
        <p class="text-center mt-5">Go to <a class="link-dark"href="/lists/settings">settings</a> to create new movielists.</p>
    </div>
    <?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\xampp1\htdocs\IMDB-clone-main - kopia\resources\views/lists/index.blade.php ENDPATH**/ ?>
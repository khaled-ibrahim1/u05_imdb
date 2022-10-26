<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin-navbar','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <section>
        <div class="container">
            <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
                <span style="background: rgb(255, 255, 255); padding-right: 14px;">Manage Comments</span>
            </h2>
        </div>

        <?php if($comments->count()): ?>
        <div class="pt-5 pb-5">
            <div class="container-lg table-responsive-lg">


                <table class="table mx-auto w-auto table-striped custab">
                    <thead>
                        <tr>
                            <th>
                                User
                            </th>
                            <th>
                                Movie
                            </th>
                            <th>
                                Comment
                            </th>
                            <th>
                                Created at
                            </th>
                            <th>
                                Status
                            </th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="align-middle">
                                <?php echo e($comment->user->username); ?>


                            </td>
                            <td class="align-middle">
                                <?php echo e($comment->movie->title); ?>


                            </td>

                            <td class="align-middle overflow-auto" style="max-width: 500px;">
                                <?php echo e($comment->body); ?>


                            </td>
                            <td class="align-middle">
                                <?php echo e($comment->created_at->diffForHumans()); ?>

                            </td>
                            <?php if($comment->approved == true): ?>
                            <td class="align-middle">
                                <span class="status-btn px-3 pb-1 leading-5 font-semibold inline-flex text-xs">Approved</span>
                            </td>
                            <?php else: ?>
                            <td class="align-middle">
                                <span class="status-btn pb-1 px-3 leading-5 font-semibold inline-flex text-xs bg-warning">Waiting</span>
                            </td>
                            <?php endif; ?>
                            <td class="align-middle">

                                <form class="form-check form-check-inline" action="/admin/dashboard/comments/<?php echo e($comment->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input class="btn btn-success" type="submit" value="Approve">


                                </form>
                            </td>
                            <td class="align-middle">

                                <form method="POST" action="/admin/dashboard/comments/<?php echo e($comment->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>
        </div>
        <?php else: ?>
        <div class="container">
            <p class="mt-5 text-center"><strong>No comments. Please check back later.</strong></p>
        </div>
        <?php endif; ?>



    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\xampp1\htdocs\IMDB-clone-main - kopia\resources\views/admin/approvalComments.blade.php ENDPATH**/ ?>
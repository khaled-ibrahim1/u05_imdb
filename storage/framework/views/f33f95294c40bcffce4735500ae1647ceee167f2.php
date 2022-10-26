<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="fade-in" style="background-image: linear-gradient(to right, rgb(0, 0, 0), rgba(2, 2, 2, 0.75)), background-size: cover;">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-4 m-0 p-0">
                    <div class="fade-in"><img src="<?php echo e($movie->photo_poster); ?>" class="img-fluid p-2 rounded" alt="<?php echo e($movie->title); ?>"></div>
                </div>
                <div class="col d-flex flex-column text-white justify-content-center pt-2 pt-lg-0">
                    <h2 class="font-weight-bold"><?php echo e($movie->title); ?> <span class="text-muted small">(<?php echo e($movie->year); ?>)</span></h2>
                    <ul class="list-inline">
                        <li class="list-inline-item text-muted"><?php echo e(ucwords($movie->category->name)); ?></li>
                    </ul>
                    <h5 class="font-weight-bold pt-3">Overview</h5>
                    <p><?php echo e($movie->body); ?></p>

                    <div class="d-flex">
                        <?php if(auth()->guard()->check()): ?>
                        <?php if($watchlist->where('movie_id', $movie->id)->count()): ?>
                        <form method="POST" action="/movie/watchlist/delete">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                            <button class="btn btn-outline-warning d-flex align-items-center me-4" type="submit">
                                <ion-icon name="checkmark-outline" class="me-2"></ion-icon> Added to Watchlist
                            </button>
                        </form>
                        <?php else: ?>
                        
                        <form method="POST" action="/movie/<?php echo e($movie->slug); ?>/add">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                            <button class="btn btn-warning btn-md d-flex align-items-center me-4" type="submit">
                                <ion-icon name="add-outline" class="me-2"></ion-icon> Add to Watchlist
                            </button>
                        </form>
                        <?php endif; ?>
                        <?php else: ?>
                        <a href="/login" class="text-reset text-decoration-none">
                            <button class="btn btn-warning btn-md d-flex align-items-center me-4" type="submit">
                                <ion-icon name="add-outline" class="me-2"></ion-icon> Add to Watchlist
                            </button>
                        </a>
                        <?php endif; ?>
                     


                        <?php if($lists): ?>
                        <div class="dropdown">
                            <button class="btn btn-light d-flex align-items-center dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <ion-icon name="add-outline" class="me-2"></ion-icon> Add to List
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <form method="POST" action="/lists/<?php echo e($movie->slug); ?>/add">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="mlist_id" value="<?php echo e($list->id); ?>">
                                    <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                                    <li class="nav-item">
                                        <button class="dropdown-item" type="submit"><?php echo e($list->title); ?></button>
                                    </li>
                                </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php else: ?>
                        <a href="/lists/settings/create" class="text-reset text-decoration-none">
                            <button class="btn btn-light btn-md d-flex align-items-center">
                                <ion-icon name="add-outline" class="me-2"></ion-icon> Create New Movielist
                            </button>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- RECOMMENDED MOVIES AND TRAILER -->
    <?php if(!$categories->isEmpty()): ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-7">
                <h6 class="text-dark pt-4" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;"><span style="background: rgb(255, 255, 255); padding-right: 14px;">Recommended <?php echo e(ucwords($movie->category->name)); ?> Movies</span></h6>
                <div class="row text-center">
                    <?php $__currentLoopData = $categories->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="container-movie col-6 col-md-3 col-lg-3">
                        <a class="text-decoration-none" href="/movies/<?php echo e($category->slug); ?>">
                            <div class="fade-in brightness"><img src="<?php echo e($category->photo_poster); ?>" class="img-fluid movie-recs-poster rounded" alt="<?php echo e($category->name); ?>">
                                <h6 class="text-dark mt-2"><?php echo e($category->title); ?></h6>
                                <p class="text-dark"><?php echo e($category->year); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col">
                <h6 class="text-dark pt-4" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;"><span style="background: rgb(255, 255, 255); padding-right: 14px;">Trailer</span></h6>
                <div class="mb-3 d-flex justify-content-center"><iframe width="400" height="225" class="rounded" allowfullscreen src="<?php if($movie->trailer_url == 1): ?> https://www.youtube.com/embed/nO1BJMrIJ54 <?php else: ?> <?php echo e($movie->trailer_url); ?> <?php endif; ?>" title="YouTube video player"></iframe></div>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <!-- REVIEW MOVIE SECTION   -->
    <div class="container">
        <h6 class="text-dark pt-4" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
            <span style="background: rgb(255, 255, 255); padding-right: 14px;">Reviews</span>
        </h6>


        <div class="my-5 d-flex flex-column align-items-center">

            <?php if(auth()->guard()->check()): ?>
            <div class="border border-gray-400 p-4 rounded w-100">
                <form method="POST" action="/movies/<?php echo e($movie->slug); ?>/comments">
                    <?php echo csrf_field(); ?>

                    <header class="d-flex align-items-center ">
                        <img class="rounded-circle" src="https://i.pravatar.cc/60?u=<?php echo e(auth()->id()); ?>" alt="profile picture" width="40" height="40">
                        <h4 class="ms-4">Leave a review!</h4>
                    </header>

                    <select name="stars" class="form-select mt-3" aria-label="Default select example" required>
                        <option value="0" selected>Rate <?php echo e($movie->title); ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <div class="mt-3">
                        <textarea class="text-sm form-control" name="body" rows="5" placeholder="Write your review!" required></textarea>

                        <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="d-flex justify-content-end mt-3 pt-3 border-top border-gray-400">
                        <button class="btn btn-dark text-uppercase py-1 px-5" type="submit">Post </button>
                    </div>
                </form>
            </div>
            <?php else: ?>
            <p class="fw-bold">
                <a class="link-dark" href="/register">Register</a> or <a class="link-dark" href="/login">log in</a> to leave a comment.
            </p>
            <?php endif; ?>



            <!-- COMMENTS SECTION   -->
            <?php $__currentLoopData = $movie->comments->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($comment->approved == 1): ?>
            <div class="border border-gray-400 p-4 rounded bg-light mt-3 w-100">
                <article class="d-flex ">
                    <div>
                        <img class="rounded-circle" src="https://i.pravatar.cc/60?u=<?php echo e($comment->user_id); ?>" alt="" width="60" height="60">
                    </div>
                    <div class="ms-4">
                        <header class="mb-2">
                            <h5 class="fw-bold"><?php echo e(ucwords($comment->user->username)); ?></h5>
                            <?php if($comment->stars == 0): ?>
                            <p class="badge bg-dark text-wrap">
                                Rated: <ion-icon name="star"></ion-icon> No rating
                            </p>
                            <?php else: ?>
                            <p class="badge bg-warning text-wrap">
                                Rated: <ion-icon name="star"></ion-icon> <?php echo e($comment->stars); ?>/5
                            </p>
                            <?php endif; ?>
                        </header>
                        <div style="word-break: break-all;">
                            <p class="fs-6 overflow-auto" style="max-height: 100px;"><?php echo e($comment->body); ?></p>
                        </div>
                        <div class="mt-3 pt-3 border-top border-gray-400">
                            <p class="fs-6 text-muted">Posted
                                <time><?php echo e($comment->created_at->diffForHumans()); ?></time>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\xampp1\htdocs\IMDB-clone-main - kopia\resources\views/movies/show.blade.php ENDPATH**/ ?>
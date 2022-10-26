<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>u05 imdb clone</title>
    <link rel="icon" type="image/x-icon" sizes="16x16" href="/public/img/imdb.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/app.css')); ?>">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">u05 imdb clone </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('/', 'admin/dashboard/users/create') ? 'active' : ''); ?>" href="/">Movies</a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('watchlist') ? 'active' : ''); ?>" href="/watchlist">Watchlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('lists') ? 'active' : ''); ?>" href="/lists">Movielists</a>
                    </li>
                    <?php endif; ?>
                </ul>

                <div class="d-flex">
                    <?php if(auth()->guard()->check()): ?>
                    <!-- Checks if the user is sign in or a guest -->
                    <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome <?php echo e(auth()->user()->name); ?>!
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <li><a class="dropdown-item" href="/admin/dashboard">Admin</a></li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item">
                                <a class="dropdown-item" href="/lists/settings">Settings</a>
                            </li>
                            <?php endif; ?>
                            <form method="POST" action="/logout">
                                <?php echo csrf_field(); ?>
                                <li><button class="dropdown-item" type="submit">Log Out</button></li>
                            </form>
                        </ul>
                    </div>
                    <?php else: ?>
                    <a href="/login" class="btn btn-outline-dark">Login</a>
                    <a href="/register" class="btn btn-dark ms-2">Signup</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash'); ?>
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
    <!-- NAVBAR -->



    <main>

        <?php echo e($slot); ?>


    </main>

    <!-- FOOTER -->
    <footer class="bg-primary mt-auto">
        <div class="text-center text-white py-5">
            © 2022 Copyright: u05imdbclone
        </div>
    </footer>
    <!-- FOOTER -->

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\xampp1\htdocs\IMDB-clone-main - kopia\resources\views/components/layout.blade.php ENDPATH**/ ?>
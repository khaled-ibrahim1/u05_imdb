<div class="container-fliud bg-secondary">
    <div class="container h-100 pt-4 d-flex flex-wrap justify-content-between">
        <div class="" style="margin-bottom:10px;">
            <a href="/admin/dashboard/" class="text-decoration-none">
                <h1 class="text-light fs-1">
                    <ion-icon name="construct" class="fs-2"></ion-icon> Admin Dashboard
                </h1>
            </a>
        </div>

        <div class="d-flex" style="margin-bottom:5px;">
            <p><a class="btn btn-light btn-outline-dark me-2 {{ request()->is('admin/dashboard/movies', 'admin/dashboard/movies/*') ? 'active' : '' }}" href="/admin/dashboard/movies">Movies</a></p>
            <p><a class="btn btn-light btn-outline-dark me-2 {{ request()->is('admin/dashboard/users', 'admin/dashboard/users/*') ? 'active' : '' }}" href="/admin/dashboard/users">Users</a></p>
            <p><a class="btn btn-light btn-outline-dark me-2 {{ request()->is('admin/dashboard/comments') ? 'active' : '' }}" href="/admin/dashboard/comments">Comments</a></p>
        </div>
    </div>
</div>
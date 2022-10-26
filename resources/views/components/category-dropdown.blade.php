<div class="btn-group mb-2">
    <button type="button" class="btn btn-dark btn-lg dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false">
        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Genre' }}
    </button>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->routeIs('home')">All</a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        @foreach ($categories as $category)
        <li>
            <a class="dropdown-item" href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}" :active='request()->is("categories/{$category->slug}")'>{{ ucwords($category->name) }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
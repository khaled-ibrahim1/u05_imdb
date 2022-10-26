<x-layout>
    <div class="container">
        <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
            <span style="background: rgb(255, 255, 255); padding-right: 14px;">Your Watchlist</span>
        </h2>
    </div>

    <div class="container">
        <div class="row text-center">
            @if($watchlists->count())
            @foreach ($watchlists as $watchlist)
            <div class="col-6 col-md-5-justify-content-center offset-md-0 offset-lg-0 col-lg-3 brightness my-4 position-relative">
                <a class="text-decoration-none" href="/movies/{{ $watchlist->movie->slug }}">
                    <div class="fade-in">
                        <img src="{{ $watchlist->movie->photo_poster }}" class="img-fluid rounded" alt="{{ $watchlist->movie->title }}">
                        <h5 class="my-2 pb-3 link-dark">{{ $watchlist->movie->title }}</p>
                            <small class="text-muted position-absolute bottom-0 start-0 ms-3">{{ $watchlist->created_at->diffForHumans() }}</small>
                            <form class="position-absolute top-0 end-0 me-3 mt-1" method="POST" action="/movie/watchlist/delete">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $watchlist->id }}">
                                <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center">
                                    <ion-icon class="" style="padding-top: 0.8px;" name="close-outline"></ion-icon>
                                </button>
                            </form>

                    </div>
                </a>
            </div>
            @endforeach
            {{ $watchlists->links() }}
            @else
            <p class="my-4">No movies added. Please check back later.</p>
            @endif
        </div>
    </div>
    </div>
</x-layout>
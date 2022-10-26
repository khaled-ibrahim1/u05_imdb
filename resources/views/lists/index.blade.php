<x-layout>
    @if($lists->count())
    @foreach($lists as $list)
    <div class="container">
        <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
            <span style="background: rgb(255, 255, 255); padding-right: 14px;">Your list: {{ ucwords($list->title) }}</span>
        </h2>
    </div>

    <!-- GRID FOR POSTERS -->
    <div class="container">
        <div class="row text-center">
            @if($list->movies->count())
            @foreach($list->movies as $movie)
            <div class="col-6 col-md-5-justify-content-center offset-md-0 offset-lg-0 col-lg-3 brightness my-4 position-relative">
                <a class="text-decoration-none" href="/movies/{{ $movie->slug }}">
                    <div class="fade-in">
                        <img src="{{ $movie->photo_poster }}" class="img-fluid rounded" alt="{{ $movie->title }}">
                        <h5 class="my-2 pb-3 link-dark">{{ $movie->title }}</p>
                            <small class="text-muted position-absolute bottom-0 start-0 ms-3">{{ $movie->pivot->created_at->diffForHumans() }}</small>
                            <form class="position-absolute top-0 end-0 me-3 mt-1" method="POST" action="/lists/delete">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                <input type="hidden" name="mlist_id" value="{{ $list->id }}">
                                <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center">
                                    <ion-icon class="" style="padding-top: 0.8px;" name="close-outline"></ion-icon>
                                </button>
                            </form>

                    </div>
                </a>
            </div>
            @endforeach
            @else
            <p>No movies added to your list.</p>
            @endif
        </div>
    </div>
    @endforeach
    @else
    <div class="container">
        <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
            <span style="background: rgb(255, 255, 255); padding-right: 14px;">No created lists</span>
        </h2>
        <p class="text-center mt-5">Go to <a class="link-dark"href="/lists/settings">settings</a> to create new lists.</p>
    </div>
    @endif

</x-layout>
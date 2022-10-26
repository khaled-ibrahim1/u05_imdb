<x-layout>
    <x-admin-navbar />

    <section>
        <div class="container">
            <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
                <span style="background: rgb(255, 255, 255); padding-right: 14px;">Manage Comments</span>
            </h2>
        </div>

        @if($comments->count())
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
                        @foreach($comments as $comment)
                        <tr>
                            <td class="align-middle">
                                {{ $comment->user->username}}

                            </td>
                            <td class="align-middle">
                                {{ $comment->movie->title }}

                            </td>

                            <td class="align-middle overflow-auto" style="max-width: 500px;">
                                {{ $comment->body }}

                            </td>
                            <td class="align-middle">
                                {{ $comment->created_at->diffForHumans() }}
                            </td>
                            @if ($comment->approved == true)
                            <td class="align-middle">
                                <span class="status-btn px-3 pb-1 leading-5 font-semibold inline-flex text-xs">Approved</span>
                            </td>
                            @else
                            <td class="align-middle">
                                <span class="status-btn pb-1 px-3 leading-5 font-semibold inline-flex text-xs bg-warning">Waiting</span>
                            </td>
                            @endif
                            <td class="align-middle">

                                <form class="form-check form-check-inline" action="/admin/dashboard/comments/{{ $comment->id }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input class="btn btn-success" type="submit" value="Approve">


                                </form>
                            </td>
                            <td class="align-middle">

                                <form method="POST" action="/admin/dashboard/comments/{{ $comment->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        @else
        <div class="container">
            <p class="mt-5 text-center"><strong>No comments. Please check back later.</strong></p>
        </div>
        @endif
    </section>
</x-layout>
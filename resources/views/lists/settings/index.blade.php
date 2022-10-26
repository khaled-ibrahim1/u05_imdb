<x-layout>
    <section>
        <div class="container">
            <h2 class="text-dark pt-5" style="width: 100%; border-bottom: 1px solid rgb(214, 214, 214); line-height: 0.1em; margin: 10px 0px 30px;">
                <span style="background: rgb(255, 255, 255); padding-right: 14px;">Lists</span>
            </h2>
        </div>
        <div class="pt-5 pb-5">
            <div class="container-xxl">
                <div class="row d-flex justify-content-start h-100">
                    <div class="column-admin col-12 col-md-9 col-lg-7 col-xl-6">

                        <aside>
                            <ul class="list-unstyled">

                                <li>
                                    <a class="btn btn-secondary me-3 custom" href="/lists/settings">All Lists</a>

                                </li>
                                <li class="mt-2">
                                    <a class="btn btn-secondary me-3 custom" href="/lists/settings/create">New List</a>
                                </li>
                            </ul>
                        </aside>
                    </div>

                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card bg-light" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <!-- Table -->
                                @if(!$lists->isEmpty())
                                <table class="table w-100 table-striped custab">
                                    @foreach($lists as $list)
                                    <tr>
                                        <td class="align-middle overflow-auto" style="max-width: 100px;">
                                            <p>{{ $list->title }}</p>
                                        </td>
                                        <td class="text-center">
                                            <div class="container d-flex justify-content-end p-2 gap-3">
                                                <a class='btn btn-info btn-xs' href="/lists/settings/{{ $list->id }}/edit">Edit</a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $list->id }}">
                                                    Delete
                                                </button>
                                                <!-- Button trigger modal end-->

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $list->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the list: <br><strong class="text-danger">{{ $list->title }}</strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <form method="POST" action="/lists/settings/{{ $list->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal end-->

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                @else
                                <p>
                                    No lists. Please add a list!
                                </p>
                                @endif
                                {{ $lists->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</x-layout>
@include('assets.header')

@include('assets.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="fa fa-check"></i></i></div>
            <div class="alert-body">
                <div class="alert-title"><strong>Success</strong></div>
                {{ session('success') }}
            </div>
        </div>
        @endif
        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('users/create') }}" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('users/'. $item->id .'/edit') }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}"><i class="fa fa-trash"></i></button>

                                        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $item->id }}" data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are You Sure?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{url('users', $item->id)}}" method="POST" class="pt-3">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary"> Yes</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item">
                                    {{ $users->links() }}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('assets.footer')
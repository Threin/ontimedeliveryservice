@extends('layouts.adminLayout')


@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>User Management</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">User Management</li>
            <li class="breadcrumb-item active">Active Users</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-info d-flex flex-row align-items-center">
                <h3 class="card-title">User Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-primary mr-2" href="{{route('admin.users.edit', $user->id)}}">Edit</a>
                                    {{-- <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                    document.getElementById('delete-user-form-{{$user->id}}').submit()">Delete</button> --}}
                                    {{-- <form id="delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy', $user->id)}}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                    </form> --}}
                                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#ModalDelete{{$user->id}}">{{ __('Delete') }}</a>


                                </td>
                                 @include('admin.users.partials.delete')
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
    <script>


    $(function () {
        $("#users").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf"]
        }).buttons().container().appendTo('#users_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush


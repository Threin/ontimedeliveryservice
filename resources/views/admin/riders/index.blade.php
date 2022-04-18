@extends('layouts.adminLayout')


@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Rider Management</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Rider Management</li>
            <li class="breadcrumb-item active">Active Riders</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-info d-flex flex-row align-items-center">
                <h3 class="card-title">Rides Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>IsActive</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $riders as $rider )
                            <tr>
                                <td>{{ $rider->id }}</td>
                                <td>{{ $rider->rider_name }}</td>
                                <td>{{ $rider->rider_contactNumber }}</td>
                                <td>{{ $rider->rider_address }}</td>
                                <td>{{ $rider->rider_email }}</td>
                                <td>{{ $rider->rider_status }}</td>
                                <td>{{ $rider->rider_isActive }}</td>


                                <td>
                                    <a class="btn btn-sm btn-primary mr-2" href="{{route('admin.riders.edit', $rider->id)}}">Edit</a>

                                    {{-- <form id="delete-user-form-{{$rider->id}}" action="{{route('admin.riders.destroy', $rider->id)}}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                    </form> --}}
                                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#ModalDelete{{$rider->id}}">{{ __('Delete') }}</a>
                                     @include('admin.riders.partials.delete')
                                </td>

                                {{-- <form action="{{route('admin.riders.destroy', $rider->id)}}" method="POST" enctype="multipart/form-data">
                                    @method("DELETE")
                                    @csrf


                                    <div class="modal fade" id="ModalDelete{{$rider->id}}" tabindex="1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{__('Rider Delete')}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure you want to delete <b> {{$rider->name}} </b>?</div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                                                    <button type="Submit" class="btn gray btn-outline-danger" >{{__('Delete')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script>


    $(function () {
        $("#users").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": []
        }).buttons().container().appendTo('#users_wrapper .col-md-6:eq(0)');
    });

</script>

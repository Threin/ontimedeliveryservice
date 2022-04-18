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
            <li class="breadcrumb-item active">Add Users</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                      @include('admin.users.partials.form',['create'=>true])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

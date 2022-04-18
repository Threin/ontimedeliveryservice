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
            <li class="breadcrumb-item active">Add Rider</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Rider') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.riders.store') }}">
                      @include('admin.riders.partials.form',['create'=>true])
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

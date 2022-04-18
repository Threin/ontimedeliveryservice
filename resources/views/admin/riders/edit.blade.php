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
            <li class="breadcrumb-item active">Edit Rider</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Rider') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.riders.update',$rider->id)}}">
                    @method('PATCH')
                      @include('admin.riders.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

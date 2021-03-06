@extends('layouts.adminLayout')


@section('content')

@push('styles')
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
@endpush
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Permit Monitoring</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Permit Monitoring</li>
            <li class="breadcrumb-item active">Delivered Permits</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-info d-flex flex-row align-items-center">
                <h3 class="card-title">List of Delivered Permits</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="permitForm" method="POST" action="">
                @csrf

                @if(isset($permits))

                    <table id="permits" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>BIN</th>
                                <th>BIN</th>

                                <th>Taxpayer's Name</th>
                                <th>Trade Name</th>
                                <th>Address</th>

                                <th>Status</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $permits as $permit )


                                <tr>
                                    <td>{{ $permit->permit_bin }}</td>
                                    <td>{{ $permit->permit_bin }}</td>
                                    <td>{{ $permit->permit_taxPayersName }}</td>
                                    <td>{{ $permit->permit_tradeName }}</td>
                                    <td>{{ $permit->permit_address }}</td>
                                    <td>{{ $permit->permit_status }}</td>
                                    {{-- <td>

                                        <a class="btn btn-sm btn-danger float-right" href="#" data-toggle="modal" data-target="#ModalDelete{{$permit->id}}">{{ __('Remove') }}</a>
                                    </td>

                                    @include('shared.permits.partials.delete') --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {!! $permits->render() !!} @endif

                </form>
            </div>

        </div>
    </div>
</div>



@endsection

@push('scripts')
<script src="{{asset('js/dataTables.checkboxes.min.js')}}"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript" src="{{asset ('js/jquery.printPage.js')}}"></script>
<script>

    $(document).ready(function(){

        var table = $('#permits').DataTable({
        'paging': false,
        'deferRender': true,
        "responsive": true, "lengthChange": false, "autoWidth": false,
            'order': [[1, 'asc']]
        })
    })




</script>
@endpush

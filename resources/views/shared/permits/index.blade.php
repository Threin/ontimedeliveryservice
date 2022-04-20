@extends('layouts.adminLayout')


@section('content')

@push('styles')
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
@endpush
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Label Management</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Label Management</li>
            <li class="breadcrumb-item active">Permits Selection</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-info d-flex flex-row align-items-center">
                <h3 class="card-title">Please Select Permits For Printing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="permitForm" method="POST" action="{{route('permits.select_for_printing')}}">
                @csrf
                    {{-- <pre id="view-rows"></pre> --}}
                     {{-- <button class="btn btn-danger">View Selected</button> --}}
            @if(isset($permits))
                    <div class="container">
                            <form id="searchFrm" method="POST"  role="search" >
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="searchInput"   placeholder="Search permits">
                                    <span class="input-group-btn">
                                        <button type="submit" formaction="{{url('/search')}}" class="btn btn-default" >
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                    </div>

                    <table id="permits" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>BIN</th>
                                <th>BIN</th>

                                {{-- <th>Taxpayer's Name</th> --}}
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
                                    {{-- <td>{{ $permit->permit_taxPayersName }}</td> --}}
                                    <td>{{ $permit->permit_tradeName }}</td>
                                    <td>{{ $permit->permit_address }}</td>
                                    <td>{{ $permit->permit_status }}</td>
                                    {{-- <td>
                                        <a class="btn btn-sm btn-primary float-right mr-2" href="{{route('admin.riders.edit', $permit->id)}}">Edit</a>

                                        <a class="btn btn-sm btn-danger float-right" href="#" data-toggle="modal" data-target="#ModalDelete{{$permit->id}}">{{ __('Delete') }}</a>
                                    </td> --}}


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {!! $permits->render() !!} @endif
                </form>
            </div>
            <div class="card-footer">
                {{-- <p><b>Selected Permits</b></p> --}}
                <p>
                    <pre id="view-rows" style="display: none;"></pre>
                </p>
                <hr>
                <button class="btn btn-danger" form="permitForm">Proceed to Printing</button>
            </div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script src="{{asset('js/dataTables.checkboxes.min.js')}}"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script>

    /*
    $(function () {
        $("#permits").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf"]
        }).buttons().container().appendTo('#permits_wrapper .col-md-6:eq(0)');
    });
    */
    $(document).ready(function(){
        var table = $('#permits').DataTable({
            'filter': false,
            'reponsive': true,
            'autoWidth': true,
            'paging': false,
            'deferRender': true,
            'columnDefs': [
                {
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },
            'order': [[1, 'asc']],


        })
        $('#permitForm').on('submit',function(event){
            var form = this;
            var rowsel = table.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                $(form).append(
                    $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                )
            });
            //$('input[name="id\[\]"]', form).remove();
            $('#view-rows').text(rowsel.join(','));
            $('#view-form').text($(form).serialize());
            //event.preventDefault();
        })
    })



</script>
@endpush

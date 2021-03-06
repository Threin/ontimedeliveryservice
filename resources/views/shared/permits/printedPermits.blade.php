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
            <li class="breadcrumb-item active">Printed Permits</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-info d-flex flex-row align-items-center">
                <h3 class="card-title">List of Printed Permits</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{-- <form id="permitForm" method="POST" action="">
                @csrf --}}
                    {{-- <pre id="view-rows"></pre> --}}
                     {{-- <button class="btn btn-danger">View Selected</button> --}}
                @if(isset($permits))
                    <div class="container mb-2">

                            <form method="POST"  action="{{route('permits.searchPrinted')}}" role="search" >
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="searchInput"   placeholder="Search BIN here..">
                                    <span class="input-group-btn">
                                        <button type="submit"  class="btn btn-warning mr-2" data-toggle="tooltip" title="search" >
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                    <span class="input-group-btn">
                                        {{-- <button type="submit" formaction="{{url('/permits')}}" class="btn btn-default" >
                                            <span class="fa fa-sync"></span>
                                        </button> --}}
                                         <a href="{{ url('/permits/list-printed') }}" class="btn btn-primary" data-toggle="tooltip" title="refresh table"><span class="fa fa-sync"></span></a>

                                    </span>
                                </div>
                            </form>
                             @if(isset($q))
                            <p> The Search results for your query <b> {!! $q !!} </b> </p>
                            @endif

                    </div>

                    <table id="permits" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>QrCode</th>
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
                                    <td>{!! QrCode::size(50)->generate($permit->permit_bin); !!}</td>
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
                
                {{-- </form> --}}
            </div>
            {{-- <div class="card-footer">
                <p><b>Selected Permits</b></p>
                <p>
                    <pre id="view-rows"></pre>
                </p>
                <hr>
                 <a href="{{ url('/permits/prntpreview/') }}" class="btnprn btn btn-primary"  ><i class="fas fa-print"></i> Print All</a>

                <button class="btn btn-info" formaction="{{url('/permits/mark-printed/')}}" form="permitForm"><i class="fas fa-check"></i> Mark Selected as Printed</button>
            </div> --}}
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script src="{{asset('js/dataTables.checkboxes.min.js')}}"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript" src="{{asset ('js/jquery.printPage.js')}}"></script>
<script>

 /*
    $(function () {
        $("#permits").DataTable({
        'paging': false,
        'deferRender': true,
        "responsive": true, "lengthChange": false, "autoWidth": false,
       
        "buttons": ["copy", "excel", "pdf"]
        }).buttons().container().appendTo('#permits_wrapper .col-md-6:eq(0)');
        
    });
    */

    var table = $('#permits').DataTable({
            'filter': false,
            'reponsive': true,
            'autoWidth': true,
            'paging': false,
            'deferRender': true,
            /*
            'columnDefs': [
                {
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            */
            'select': {
                'style': 'multi'
            },
            'order': [[1, 'asc']],


        })
    

  



</script>
@endpush

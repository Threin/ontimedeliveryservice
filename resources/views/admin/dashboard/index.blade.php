@extends('layouts.adminLayout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row mb-4">

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-navy">
                USERS OVERVIEW
            </div>
            <div class="card-body">
                    {{-- @widget('overview_order_status') --}}
                    <div class="row">
                        <div class="col">
                        <!-- small box -->
                            <div class="small-box bg-white">
                                <div class="inner">
                                <h3><span id="numberOfOrder">{{$usersCount}}</span></h3>
                                <p>NO. OF USERS</p>‌
                                </div>

                                <div class="icon">
                                <i class="fas fa-users"></i>
                                </div>
                                {{-- <a href="#" class="small-box-footer py-1"></i></a> --}}
                            </div>

                         </div>

                        <div class="col">
                        <!-- small box -->
                            <div class="small-box bg-white">
                            <div class="inner">

                                <h3>{{$countRiders}}</h3>
                                <p>‌NO. OF Riders</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer py-2"></i></a> --}}

                            </div>
                        </div>
                        {{-- <div class="col-md-2">
                                <div class="small-box bg-white">
                                    <div class="inner">
                                        <h3>22</h3>
                                        <p>NO. OF PAID</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-box"></i>
                                    </div>

                                </div>
                        </div> --}}


                    </div>


            </div>
        </div>

    </div>
</div>
<div class="row mb-4">
    <div class="col-12">

        <div class="card">
            <div class="card-header bg-warning">
                PERMITS OVERVIEW
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="small-box bg-white">
                                <div class="inner">
                                    <h3><span>{{$permitsCount}}</span></h3>
                                    <p>‌NO. OF PERMITS</p>
                                </div>

                                <div class="icon">
                                    <i class="fas fa-file"></i>
                                </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="small-box bg-white">
                                <div class="inner">
                                    <h3><span>0</span></h3>
                                    <p>‌NO. OF PERMITS FOR PRINTING</p>
                                </div>

                                <div class="icon">
                                    <i class="fas fa-print"></i>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="small-box bg-white">
                                <div class="inner">
                                    <h3><span>0</span></h3>
                                    <p>‌NO. OF PERMITS FOR PIC-PICKUP</p>
                                </div>

                                <div class="icon">
                                    <i class="fas fa-box"></i>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="small-box bg-white">
                                <div class="inner">
                                    <h3><span>0</span></h3>
                                    <p>‌NO. OF PERMITS IN-TRANSIT</p>
                                </div>

                                <div class="icon">
                                    <i class="fas fa-box"></i>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="small-box bg-white">
                                <div class="inner">
                                    <h3><span>{{$deliveredPermits}}</span></span></h3>
                                    <p>‌NO. OF PERMITS DELIVERED</p>
                                </div>

                                <div class="icon">
                                    <i class="fas fa-box"></i>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('scripts')


<script>
    $(function () {
        $('#users').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        });
    });

    function change( val ){
                var btn = document.getElementById("dashboard_btn");

                if (btn.value == "View Dashboard") {
                    btn.value = "Hide Dashboard";
                    btn.innerHTML = "Hide Dashboard";
                }
                else {
                    btn.value = "View Dashboard";
                    btn.innerHTML = "View Dashboard";
                }
    }
    </script>

@endsection

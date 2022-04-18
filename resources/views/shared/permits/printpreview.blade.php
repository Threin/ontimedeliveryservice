
<div class="container">
    {{-- @foreach ( $permits as $permit )

        <div class="row"> --}}
            {{-- <div class="col-12"> --}}
                    {{-- <div class="card col-md-6 offset-4">
                        <div class="card-header">
                            <div class="card-title"><h3>{{ $permit->permit_taxPayersName}}</h3></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <p>{!! QrCode::size(200)->generate($permit->permit_bin); !!}</p>
                                </div>
                                <div class="col-md-8 col-sm-8 float-left">
                                    {{ $permit->permit_taxPayersName}}
                                </div>
                            </div>

                          
                        </div>
                    </div> --}}
                        {{-- <div class="col">
                            <p>{!! QrCode::size(200)->generate($permit->permit_bin); !!}</p>
                        </div>
                        <div class="col">
                            {{ $permit->permit_taxPayersName}}
                        </div> --}}

                          

            {{-- </div> --}}
        {{-- </div>
    @endforeach --}}

    <table id="permits" class="table table-bordered table-striped">
                       
        <tbody>
            @foreach ( $permits as $permit )


                <tr>
                    <td style="padding-right: 10px; padding-bottom: 10px">{!! QrCode::size(100)->generate($permit->permit_bin); !!}</td>
                    {{-- <td>{{ $permit->permit_bin }}</td> --}}
                    <td>
                        <span style="margin-bottom: 10px;"><b>Taxpayer's Name :</b> {{ $permit->permit_taxPayersName }}</span><br>
                        <b>Address :</b> {{ $permit->permit_address }}
                    </td>
                    {{-- <td>{{ $permit->permit_tradeName }}</td> --}}
                    {{-- <td></td> --}}
                    {{-- <td>{{ $permit->permit_status }}</td> --}}
                    {{-- <td>

                        <a class="btn btn-sm btn-danger float-right" href="#" data-toggle="modal" data-target="#ModalDelete{{$permit->id}}">{{ __('Remove') }}</a>
                    </td>

                    @include('shared.permits.partials.delete') --}}
                </tr>
            @endforeach
        </tbody>
    </table>

</div>


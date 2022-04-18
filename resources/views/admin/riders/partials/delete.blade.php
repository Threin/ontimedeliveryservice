<form action="{{route('admin.riders.destroy',$rider->id)}}" method="post" enctype="multipart/form-data">
   {{method_field('delete')}}
    @csrf

    <div class="modal fade" id="ModalDelete{{$rider->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">{{__('Rider Delete')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Delete <b> {{$rider->rider_name}} </b>?</div>
                <input type="hidden" value="{{$rider->id}}">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="Submit" class="btn red btn-outline-danger" >{{ __('Delete') }}</button>
                    {{-- <a class="btn btn-outline-danger" href="{{route('admin.riders.destroy',$rider->id)}}">Delete</a> --}}
                </div>
            </div>
        </div>
    </div>
</form>

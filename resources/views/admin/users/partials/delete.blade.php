<form action="{{route('admin.users.destroy', $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("DELETE")

    <div class="modal fade" id="ModalDelete{{$user->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('User Delete')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete <b> {{$user->name}} </b>?</div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="Submit" class="btn gray btn-outline-danger" >{{__('Delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>


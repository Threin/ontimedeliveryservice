{{-- <form action="{{route('permits.remove-for-printing', $permit->id)}}" method="POST" enctype="multipart/form-data" id="deleteForm">
    @csrf
  

    <div class="modal fade" id="ModalDelete{{$permit->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Remove Permit')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Remove<b> {{$permit->permit_bin}} </b>?</div>
                <input type="hidden" value="{{$permit->id}}" name="id" form="deleteForm">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="Submit" class="btn gray btn-outline-danger" form="deleteForm">Remove</button>
                </div>
            </div>
        </div>
    </div>
</form>
 --}}
<form action="{{route('permits.remove-for-printing', isset($permit->id) ? $permit->id : '' )}}" method="POST" enctype="multipart/form-data" id="deleteForm">
    @csrf

    <div class="modal fade" id="ModalDelete{{isset($permit->id) ? $permit->id : ''}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Remove Permit')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Remove<b> {{ isset($permit->permit_bin) ? $permit->permit_bin : ''  }} </b>?</div>
                <input type="hidden" value="{{isset($permit->id) ? $permit->id : ''}}" name="id" form="deleteForm">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn gray btn-outline-danger" form="deleteForm">Remove</button>
                </div>
            </div>
        </div>
    </div>
</form>


 <script type="text/javascript">
  function form_submit() {
    document.getElementById("deleteForm").submit();
   }    
  </script>
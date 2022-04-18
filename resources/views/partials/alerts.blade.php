
@if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hiddn="true">x</button>

        <h5>
            <i class="fas fa-check"></i>
            Success!
        </h5>
        <strong>{{session('success')}}</strong>
    </div>

@endif

@if (session('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <h5>
            <i class="fas fa-exclamation-triangle"></i>
            Woops!
        </h5>
        <strong>{{session('warning')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hiddn="true">x</button>
    </div>

@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <h5>
            <i class="fas fa-ban"></i>
            Error!
        </h5>
        <strong>{{session('error')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hiddn="true">x</button>
    </div>

@endif

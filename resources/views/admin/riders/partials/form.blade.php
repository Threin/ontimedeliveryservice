
  @csrf

<div class="form-group row">
    <label for="rider_name" class="col-md-2 col-form-label">{{ __('Name') }}</label>

    <div class="col">
        <input id="rider_name" type="text" class="form-control @error('rider_name') is-invalid @enderror" name="rider_name" value="{{ old('rider_name') }} @isset($rider){{$rider->rider_name}}@endisset" required autocomplete="rider_name" autofocus>

        @error('rider_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="rider_contactNumber" class="col-md-2 col-form-label">{{ __('Contact Number') }}</label>

    <div class="col">
        <input id="rider_contactNumber" type="text" class="form-control @error('rider_contactNumber') is-invalid @enderror" name="rider_contactNumber" value="{{ old('rider_contactNumber') }} @isset($rider){{$rider->rider_contactNumber}}@endisset" required autocomplete="rider_contactNumber" autofocus>

        @error('rider_contactNumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="rider_address" class="col-md-2 col-form-label">{{ __('Address') }}</label>

    <div class="col">
        <input id="rider_address" type="text" class="form-control @error('rider_address') is-invalid @enderror" name="rider_address" value="{{ old('rider_address') }} @isset($rider){{$rider->rider_address}}@endisset" required autocomplete="rider_address" autofocus>

        @error('rider_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="rider_email" class="col-md-2 col-form-label">{{ __('E-Mail Address') }}</label>

    <div class="col">
        <input id="rider_email" type="rider_email" class="form-control @error('rider_email') is-invalid @enderror" name="rider_email" value="{{ old('rider_email') }} @isset($rider){{$rider->rider_email}}@endisset" required autocomplete="rider_email">

        @error('rider_email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

@isset($create)

<div class="form-group row">

    <label for="password" class="col-md-2 col-form-label">{{ __('Password') }}</label>

    <div class="col">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="rider_password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endisset
<div class="form-group row">
    <div class="offset-2 col-sm-10">
            <div class="form-check">
                <input class="form-check-input " name="rider_isActive" type="checkbox" value="{{old('rider_isActive')}} @isset($rider){{$rider->rider_isActive}}@endisset" id="rider_isActive"
                @isset($rider) @if ($rider->rider_isActive == 'yes') checked @endif @endisset>
                <label class="form-check-label" for="rider_isActive">Active</label>
            </div>

    </div>
</div>

<div class="form-group row mb-0">
    <div class="offset-2 col-sm-10" >
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
        <a class="btn btn-warning" href="{{route('admin.riders.index')}}">Cancel</a>
    </div>
</div>

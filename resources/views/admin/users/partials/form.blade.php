  @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} @isset($user){{$user->name}}@endisset" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} @isset($user){{$user->email}}@endisset" required autocomplete="email">

                                @error('email')
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endisset

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row">
                            <div class="offset-2 col-sm-10"> --}}
                                @foreach ( $roles as $role )
                                    <div class="form-check">
                                        <input type="checkbox"  class="form-check-input @error('roles') is-invalid @enderror" name="roles[]" value="{{$role->id}}" id="roles"
                                        @isset($user) @if (in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
                                        <label class="form-check-label" for="{{$role->name}}">{{$role->name}}</label>
                                         @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                @endforeach
                            {{-- </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="offset-2 col-sm-10" >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <a class="btn btn-warning" href="{{route('admin.users.index')}}">Cancel</a>
                            </div>
                        </div>

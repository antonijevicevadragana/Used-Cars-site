
@extends('layouts.log')

@section('content')
    <div class="content">
        <div class="row justify-content-center frame">
            <h2 class="text-center">{{__('Login')}}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-box">
                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="&#xf0e0;" style="font-family: Arial, FontAwesome" >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-box">
                    <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="&#xf023;" style="font-family: Arial, FontAwesome">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                
                    <div class="d-grid gap-2">
                        <br>
                        <button type="submit" class="btn button">
                            {{ __('Login') }}
                        </button>
                    </div>
                
            </form>
        </div>
    </div>
@endsection

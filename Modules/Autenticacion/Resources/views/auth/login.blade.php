@extends('autenticacion::layouts.app')

@section('content')
<main class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{asset('img/logo_perinola.svg')}}" alt="{{env('APP_NAME')}}">
            {{-- <a href="{{url('/')}}">{{env('APP_NAME')}}</a> --}}
        </div>
        <!-- /.login-logo -->
        <div class="card">

            @if(session('status'))
            <p class="text-center text-info">{{ session('status') }}</p>
            @endif
            @if(session('alert_error'))
            <p class="text-center text-danger">{{ session('alert_error') }}</p>
            @endif

            <div class="card-body login-card-body">
            <p class="login-box-msg">{{__('Sign in to start your session')}}</p>
            {{ Form::open(['route' => 'login']) }}
                <div class="input-group mb-3">
                    <input id="email" type="email"  placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('Sign In')}}</button>

                </div>
                <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </p>
            <p class="mb-0">
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Register a new membership') }}
                </a>
            </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</main>
@endsection

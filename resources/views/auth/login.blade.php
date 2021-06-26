@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">{{ __('Login') }}</div>
            <div class="m-sm-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="mb-3">
                        <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        <small>
                            @if (Route::has('password.request'))
                                        <a  href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                        </small>
                    </div>
                    <div>
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox"  name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                            <span class="form-check-label">
                                {{ __('Remember Me') }}
                            </span>
                        </label>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection

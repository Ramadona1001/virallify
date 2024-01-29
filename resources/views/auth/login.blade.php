@extends('dashboard.layouts.auth')

@section('title',transWord('Sign In'))

@section('styles')
@endsection

@section('content')
<form id="formAuthentication" class="form-horizontal" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group auth-form-group-custom mb-4">
        <i class="ri-user-2-line auti-custom-input-icon"></i>
        <label for="username">{{ transWord('Email address') }}</label>
        <input type="text" class="form-control" name="email" id="username" placeholder="{{ transWord('Email address') }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group auth-form-group-custom mb-4">
        <i class="ri-lock-2-line auti-custom-input-icon"></i>
        <label for="userpassword">{{ transWord('Password') }}</label>
        <input type="password" class="form-control" name="password" id="userpassword" placeholder="{{ transWord('Password') }}">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input"
               id="customControlInline">
        <label class="custom-control-label" name="remember" for="customControlInline"> {{ transWord('Remember me') }}</label>
    </div>
    
    <div class="mt-4 text-center">
    <button type="submit" class="btn btn-primary w-md waves-effect waves-light">{{ transWord('Login') }}</button>
    {{-- @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif --}}
</div>
</form>
@endsection

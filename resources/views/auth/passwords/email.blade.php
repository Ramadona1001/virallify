@extends('dashboard.layouts.auth')

@section('title',transWord('Password Reset'))

@section('content')
<form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        {{ __('Send Password Reset Link') }}
    </button>
</form>
@endsection

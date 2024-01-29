@extends('dashboard.layouts.auth')

@section('title',transWord('Verify Email Address'))

@section('content')
{{ __('Before proceeding, please check your email for a verification link.') }}
{{ __('If you did not receive the email') }},
<form id="formAuthentication" class="mb-3" class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
</form>
@endsection

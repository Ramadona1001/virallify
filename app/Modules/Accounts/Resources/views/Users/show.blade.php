@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')

@endsection

@section('breadcrumb')
    @foreach ($pages as $page)
        <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ $page[1] }}">{{ $page[0] }}</a>
        </li>
    @endforeach
@endsection

@section('content')

@include('dashboard.components.errors')

<div class="col-lg-12">
    <div class="card card-bordered card-full">
        <div class="card-header">
            {{ $user->name.' '.transWord('Data') }}
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label for="name">{{ transWord('Name') }}</label>
                        <div class="input-group mb-3">
                            <input type="text" id="name" readonly value="{{ $user->name }}" required class="form-control" placeholder="{{ transWord('Name') }}" aria-label="{{ transWord('Name') }}" name="name" aria-describedby="basic-addon1">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="email">{{ transWord('Email Address') }}</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" value="{{ $user->email }}" readonly required id="email" class="form-control email" placeholder="Ex: example@example.com">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="mobile">{{ transWord('Mobile') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="mobile_number" value="{{ $user->mobile_number }}" readonly required id="mobile" class="form-control mobile" placeholder="{{ transWord('Mobile') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label for="multiselect2">{{ transWord('Roles') }}</label><br>
                                @foreach (getUserRole($user->id) as $item)
                                <span class="badge bg-secondary">{{ $item }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection

@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
<style>
    .role-box{
        padding: 5px 8px;
        border: 1px solid #f5f5f5;
        display: inline-block;
        border-radius: 10px;
        margin: 5px;
        text-align: center;
        box-shadow: 0px 1px 2px #ccc;
        line-height: 23px;
    }
</style>
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
        <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
           <strong>{{ $title }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('update_users',['user'=>$user]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($user->avatar != null)
                <div class="row">
                    <div class="col">
                        <img src="{{ asset($user->avatar) }}" style="display:block;margin-left:auto;margin-right:auto;width:200px;" class="img-thumbnail">
                    </div>
                </div>
                <hr>
                @endif
                <div class="row">
                    <div class="col">
                        <label for="name">{{ transWord('Name') }}</label>
                        <div class="input-group mb-3">
                            <input type="text" id="name" value="{{ $user->name }}" required class="form-control" placeholder="{{ transWord('Name') }}" aria-label="{{ transWord('Name') }}" name="name" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col">
                        <label for="email">{{ transWord('Email Address') }}</label>
                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ $user->email }}" required id="email" class="form-control email" placeholder="Ex: example@example.com">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="password">{{ transWord('Password') }}</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control email" placeholder="{{ transWord('Password') }}" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="col">
                        <label for="confirmpass">{{ transWord('Confirm Password') }}</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" id="confirmpass" class="form-control email" placeholder="{{ transWord('Confirm Password') }}">
                        </div>
                    </div>

                    <div class="col">
                        <label  for="mobile_number">{{ transWord('Mobile') }}</label>
                        <div class="input-group mb-3">
                            <input type="text" name="mobile_number" value="{{ $user->mobile_number }}" id="mobile_number" class="form-control email" placeholder="{{ transWord('Mobile Number') }}">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-12">
                        <label class="" for="avatar">{{ transWord('Avatar') }}</label>
                        <div class="input-group mb-3">
                            <input type="file" name="avatar" id="avatar" class="form-control">
                        </div>
                        
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-12">
                        <label class="" for="publish">{{ transWord('Active Status') }}</label>
                        <div class="input-group mb-3">
                            <select name="publish" id="publish" class="form-control">
                                <option value="1" @if($user->publish == 1) selected @endif>{{ transWord('Active') }}</option>
                                <option value="0" @if($user->publish == 0) selected @endif>{{ transWord('Not Active') }}</option>
                            </select>
                        </div>
                        
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <h6>{{ transWord('Roles') }}</h6>
                        <ul class="custom-control-group ">
                            @foreach ($roles as $role)
                            <li class="role-box">
                                <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                    @if (in_array($role->name,getUserRole($user->id)))
                                    <input type="checkbox" class="custom-control-input" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}" checked>
                                    @else
                                    <input type="checkbox" class="custom-control-input" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}">
                                    @endif
                                    <label class="custom-control-label" for="role_{{ $role->id }}">{{ transWord($role->name) }}</label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div style="display: flex;align-items: end;justify-content: center" class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" id="save" class="btn btn-success waves-effect px-4">
                                    <i class="fas fa-save"></i>
                                    {{transWord('Update')}}
                                </button>

                                <a id="dashboard" href="{{route('dashboard')}}" class="btn btn-dark waves-effect px-4">
                                    <i class="fas fa-home"></i>
                                    {{transWord('Back To Dashboard')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection

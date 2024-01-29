@extends('dashboard.layouts.app')

@section('title',$title)

@section('breadcrumb')
    @foreach ($pages as $page)
        <li class="breadcrumb-item active" aria-current="page">
            <a href="{{$page[1]}}">{{$page[0]}}</a>
        </li>
    @endforeach
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ $title }}</h6>
                <form action="{{ route('update_roles',Crypt::encrypt($role->id)) }}" method="post" style="width: 100%">
                    @csrf
                    <div class="input-group">
                        <input type="text" value="{{ $role->name }}" class="form-control" required placeholder="{{ transWord('Role Name') }}" id="role_name" aria-label="{{ transWord('Role Name') }}" name="name" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <button type="submit" id="saveBtn" class="btn btn-outline-primary"><em class="icon ni ni-save"></em>&nbsp;{{ transWord('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')


@endsection

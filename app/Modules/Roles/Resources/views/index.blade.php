@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('breadcrumb')
    @foreach ($pages as $page)
        <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ $page[1] }}">{{ $page[0] }}</a>
        </li>
    @endforeach
@endsection

@section('content')

<div class="row mb-2">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ transWord('New Role') }}</h6>
                <form action="{{ route('store_roles') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" required placeholder="{{ transWord('Role Name') }}" id="role_name" aria-label="{{ transWord('Role Name') }}" name="name" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <button type="submit" id="saveBtn" class="btn btn-primary">{{ transWord('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ $title }}</h6>
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table table-bordered table-striped" id="example">
                        <thead>
                            <tr>
                                <th>{{ transWord('Name') }}</th>
                                <th>{{ transWord('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('assign_permissions')
                                        <a href="{{ route('permissions_roles',Crypt::encrypt($role->id)) }}" class="btn btn-primary">{{ transWord('Permissions') }}</a>
                                    @endcan
                                    @if($role->name != 'Admin')
                                        @can('update_roles')
                                            <a href="{{ route('edit_roles',Crypt::encrypt($role->id)) }}" class="btn btn-primary">{{ transWord('Edit') }}</a>
                                        @endcan
                                        @can('delete_roles')
                                            <a onclick="return confirm('{{ transWord('Are You Sure?') }}')" href="{{ route('delete_roles',Crypt::encrypt($role->id)) }}" class="btn btn-danger">{{ transWord('Delete') }}</a>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

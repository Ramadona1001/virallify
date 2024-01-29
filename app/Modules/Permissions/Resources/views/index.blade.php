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
            @can('create_permissions')
            <div class="card-body">
                <h6 class="card-title">{{ transWord('New Permission') }}</h6>
                <form action="{{ route('store_permissions') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" required placeholder="{{ transWord('Permission Name') }}" id="role_name" aria-label="{{ transWord('Role Name') }}" name="name" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <button type="submit" id="saveBtn" class="btn btn-primary">{{ transWord('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @endcan

        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
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
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>
                                  @can('update_permissions')
                                  <a href="{{ route('edit_permissions',['permission' => $permission]) }}" class="btn btn-primary">{{ transWord('Edit') }}</a>
                                  @endcan

                                  @can('delete_permissions')
                                  <a onclick="return confirm('{{ transWord('Are You Sure?') }}')" href="{{ route('delete_permissions',['permission' => $permission]) }}" class="btn btn-danger">{{ transWord('Delete') }}</a>
                                  @endcan
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

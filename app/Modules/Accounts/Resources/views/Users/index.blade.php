@extends('dashboard.layouts.app')

@section('title',transWord('All Users'))

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

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                <strong class="card-title">{{transWord('Users')}}</strong>

                @can('create_users')
                <div style="text-align: end;" class="add_btn">
                    <a id="" class="btn btn-primary" href="{{route('create_users')}}">
                        <i class="fas fa-plus"></i>
                        {{transWord('Add New')}}
                    </a>
                </div>
                @endcan

            </div>
            <div class="card-body">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table table-bordered table-striped" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ transWord('Avatar') }}</th>
                                <th>{{ transWord('Name') }}</th>
                                <th>{{ transWord('Email Address') }}</th>
                                <th>{{ transWord('Mobile Number') }}</th>
                                <th>{{ transWord('Active Status') }}</th>
                                <th>{{ transWord('Roles') }}</th>
                                <th>{{ transWord('Is Verified') }}</th>
                                <th>{{ transWord('Plans') }}</th>
                                <th>{{ transWord('Plans Wallet') }}</th>
                                <th>{{ transWord('Actions') }}</th>
                            </tr>
                        </thead>

                        <tbody id="permissionTable">
                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($user->avatar != null)
                                        <img src="{{ asset($user->avatar) }}" width="40px;">
                                    @else
                                        {{ transWord('No Image') }}
                                    @endif    
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile_number }}</td>
                                <td>
                                    @if ($user->publish == 1)
                                        <span class="badge bg-success">{{ transWord('Active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ transWord('Not Active') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @foreach (getUserRole($user->id) as $item)
                                    <span class="badge bg-secondary">{{ $item }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($user->is_verified == 1)
                                        <span class="badge bg-success">{{ transWord('Verified') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ transWord('Not Verified') }}</span>
                                    @endif
                                </td>
                                <td>{{ count($user->plans) }}</td>
                                <td>{{ $user->plans->sum('wash_number') }}</td>
                                <td style="display: flex;justify-content: start;gap: 5px;">
                                    @can('show_users')
                                        <a href="{{ route('show_users',['user'=>$user]) }}" class="btn btn-primary btn-sm"><span>{{ transWord('Details') }}</span></a>
                                    @endcan
                                    @can('update_users')
                                        <a href="{{ route('edit_users',['user'=>$user]) }}" class="btn btn-primary btn-sm"><span>{{ transWord('Edit') }}</span></a>
                                    @endcan
                                    {{-- <a href="{{ route('users_addresses',['user'=>$user]) }}" class="btn btn-primary btn-sm"><span>{{ transWord('Addresses') }}</span></a> --}}
                                    @if (!$user->hasRole('Admin'))
                                        @can('delete_users')
                                        <a href="{{ route('destroy_users',['user'=>$user]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><span>{{ transWord('Delete') }}</span></a>
                                        @endcan
                                        @can('verify_users')
                                            @if ($user->is_verified == 1)
                                                <a href="{{ route('verify_users',['user'=>$user,0]) }}" class="btn btn-danger btn-sm"><span>{{ transWord('Un Verify') }}</span></a>
                                            @else
                                                <a href="{{ route('verify_users',['user'=>$user,1]) }}" class="btn btn-primary btn-sm"><span>{{ transWord('Verify') }}</span></a>    
                                            @endif
                                        @endcan
                                        @can('active_users')
                                            @if ($user->publish == 1)
                                                <a href="{{ route('active_users',['user'=>$user,0]) }}" class="btn btn-danger btn-sm"><span>{{ transWord('Disactive') }}</span></a>
                                            @else
                                                <a href="{{ route('active_users',['user'=>$user,1]) }}" class="btn btn-primary btn-sm"><span>{{ transWord('Active') }}</span></a>    
                                            @endif
                                        @endcan
                                    @endif
                                    @if ($user->hasRole('Client'))
                                        @can('users_plans')
                                            <a href="{{ route('users_plans',['user'=>$user,0]) }}" class="btn btn-primary btn-sm"><span>{{ transWord('Plans') }}</span></a>
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

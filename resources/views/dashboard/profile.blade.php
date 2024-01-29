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


    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                <strong class="card-title">
                    @if($profile->type == "admin")
                      {{transWord('Hello') . ',' . $profile->name }}
                    @elseif($profile->type == "employee")
                        {{transWord('Hello') . ',' . $profile->employee->name }}
                    @else
                        {{transWord('Hello') . ',' . $profile->vendor->name }}
                    @endif
               </strong>
            </div>
            <div class="card-body px-3">
               <div class="intro d-flex gap-2 align-items-center">
                   <img style="width:150px;height:150px;border-radius: 50%" alt="admin-img" src="{{asset('storage/uploads/admin.jpeg')}}">
                   <div class="details">
                       <p>{{$profile->name}}</p>
                       <p>{{$profile->email}}</p>
                       <p>
                           @foreach ($roles as $role)
                           @if (in_array($role->name,getUserRole($profile->id)))
                            <span class="badge badge-success">{{$role->name}} </span>
                           @endif
                           @endforeach
                       </p>

                   </div>
               </div>


                <div class="d-flex justify-content-end">
                    <a  class="btn btn-danger" href="javascript:void(0);"
                       data-toggle="modal" data-target="#deleteAccount">
                        <i class="fas fa-trash-alt"></i>
                        {{transWord('Delete Account')}}
                    </a>
                </div>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                <strong class="card-title">
                    {{transWord('Information')}}
                </strong>
            </div>
            <div class="card-body px-3">
                <form action="{{ route('update_profile_info') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name">{{ transWord('Name') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" id="name" value="{{ $profile->name }}" required class="form-control" placeholder="{{ transWord('Name') }}" aria-label="{{ transWord('Name') }}" name="name" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col">
                            <label for="email">{{ transWord('Email Address') }}</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ $profile->email }}" required id="email" class="form-control email" placeholder="Ex: example@example.com">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div style="display: flex;justify-content: end" class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save" class="btn btn-success waves-effect px-4">
                                        <i class="fas fa-save"></i>
                                        {{transWord('Update')}}
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                <strong class="card-title">
                    {{transWord('Change Password')}}
                </strong>
            </div>
            <div class="card-body px-3">


                <form action="{{route('changePassword')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col">
                                <label for="current_password">{{ transWord('Current Password') }}</label>
                                <div class="input-group mb-3">
                                    <input required type="password" name="current_password" id="current_password" class="form-control " placeholder="{{ transWord('Current Password') }}" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col">
                                <label for="password">{{ transWord('New Password') }}</label>
                                <div class="input-group mb-3">
                                    <input required type="password" name="password" id="password" class="form-control " placeholder="{{ transWord('New Password') }}" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="col">
                                <label for="confirmpass">{{ transWord('Confirm Password') }}</label>
                                <div class="input-group mb-3">
                                    <input required type="password" name="password_confirmation" id="confirmpass" class="form-control email" placeholder="{{ transWord('Confirm Password') }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div style="display: flex;justify-content: end" class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" id="save" class="btn btn-success waves-effect px-4">
                                    <i class="fas fa-save"></i>
                                    {{transWord('Update')}}
                                </button>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->


    <div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{transWord('Delete Account')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div>
                        <p class="text-danger">
                            {{transWord('Are you sure you want to delete this account ? ')}}
                        </p>
                    </div>
                    <form action="{{route('deleteAccount')}}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label>{{ transWord('To confirm this , type your password') }}</label>
                            <div class="d-flex gap-3">
                            <input  type="password" name="pass" class="form-control" placeholder="{{ transWord('Enter password to confirm') }}" required>
                            <button style="white-space: nowrap;padding-left:30px" type="submit" class="btn btn-danger waves-effect waves-light">{{transWord('Delete Account')}}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection

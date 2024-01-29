@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
    <style>
        .modal-dialog-scrollable {
            height: auto !important;
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




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                    <strong class="card-title">{{ $title }}</strong>


                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive pt-0">
                                <table class="datatables-basic table table-bordered table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ transWord('Avatar') }}</th>
                                            <th>{{ transWord('Name') }}</th>
                                            <th>{{ transWord('Email Address') }}</th>
                                            <th>{{ transWord('Mobile Number') }}</th>
                                            <th>{{ transWord('Actions') }}</th>
                                        </tr>
                                    </thead>
            
                                    <tbody id="permissionTable">
                                        @foreach ($users_plans as $index => $up)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if ($up->user->avatar != null)
                                                    <img src="{{ asset($up->user->avatar) }}" width="40px;">
                                                @else
                                                    {{ transWord('No Image') }}
                                                @endif    
                                            </td>
                                            <td>{{ $up->user->name }}</td>
                                            <td>{{ $up->user->email }}</td>
                                            <td>{{ $up->user->mobile_number }}</td>
                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >
                                                    <li>
                                                        <a href="{{ route('remove_users_plans',['user_plan'=>$up]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->



    </div>


    <div class="modal fade" id="plansModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{ transWord('New Plan') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_plans')}}" method="post">
                        @csrf


                        <div class="nav-align-top mb-4">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif" id="nav-{{ $key }}-tab" data-toggle="tab" href="#nav-{{ $key }}" role="tab" aria-controls="nav-{{ $key }}" aria-selected="@if ($loop->index == 0){{ 'true' }}@else{{ 'false' }}@endif">{{ $lang }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade  @if ($loop->index == 0) show active @endif" id="nav-{{ $key }}" role="tabpanel" aria-labelledby="nav-{{ $key }}-tab">
                                        <div class="form-group mt-3 col-md-12">
                                            <label for="name">{{ transWord('Name') }} - {{ $lang }}</label>
                                            <input id="name" type="text" name="{{ $key }}[name]" class="form-control" placeholder="{{ transWord('Name') }}" required>
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label for="content"> {{transWord('Content')}} - {{$lang}}</label>
                                            <textarea id="content" rows="5" name="{{ $key }}[content]" class="form-control" placeholder="{{ transWord('content') }}" required></textarea>
                                        </div>


                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">



                            <div class="col">
                                <div class="form-group row">
                                    <label for="wash_number">{{transWord('Number of washes')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="number" id="wash_number" class="form-control" name="wash_number" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group row">
                                    <label for="price">{{transWord('Price')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="number" id="price" class="form-control" name="price" required>
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <div class="form-group row">
                                    <label for="subscription_type" class="">{{transWord('Subscription Type')}}</label>
                                    <div class="mt-4 mt-lg-0">

                                        <div class="form-check">
                                            <input value="monthly"  type="radio" id="subscription_type_monthly" class="form-check-input" name="subscription_type">
                                            <label class="form-check-label" for="subscription_type_monthly">{{transWord('Monthly')}}</label>
                                        </div>

                                        <div class="form-check">
                                            <input value="yearly" type="radio" id="subscription_type_yearly" class="form-check-input" name="subscription_type">
                                            <label class="form-check-label" for="subscription_type_yearly">{{transWord('Yearly')}}</label>
                                        </div>

                                    </div>
                                </div>
                            </div>





                        </div>

                        <div class="modal-footer">
                            <button id="closeBtn" type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->








@endsection

@section('scripts')
@endsection

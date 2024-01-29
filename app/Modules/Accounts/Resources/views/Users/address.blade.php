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
                    <strong class="card-title">{{ transWord('Assign Plans') }}</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('users_store_addresses') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <label for="street_name">{{ transWord('Street Name') }}</label>
                        <input type="text" name="street_name" id="street_name" class="form-control" required>

                        <label for="building_no">{{ transWord('Building No.') }}</label>
                        <input type="text" name="building_no" id="building_no" class="form-control" required>
                        
                        <label for="floor_no">{{ transWord('Floor No.') }}</label>
                        <input type="text" name="floor_no" id="floor_no" class="form-control" required>
                        
                        <label for="flat_no">{{ transWord('Flat No.') }}</label>
                        <input type="text" name="flat_no" id="flat_no" class="form-control" required>
                        
                        <label for="lat">{{ transWord('Lat') }}</label>
                        <input type="text" name="lat" id="lat" class="form-control" required>
                        
                        <label for="long">{{ transWord('Long') }}</label>
                        <input type="text" name="long" id="long" class="form-control" required>
                        
                        <label for="address_type">{{ transWord('Type') }}</label>
                        <select name="address_type" id="address_type" class="form-control" required>
                            <option value="1">{{ transWord('Home') }}</option>
                            <option value="2">{{ transWord('Work') }}</option>
                        </select>


                        <input type="submit" value="{{ transWord('Save') }}" class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                                <table id="example" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>{{transWord('User')}}</th>
                                        <th>{{transWord('Street Name')}}</th>
                                        <th>{{transWord('Building No.')}}</th>
                                        <th>{{transWord('Floor No.')}}</th>
                                        <th>{{transWord('Flat No.')}}</th>
                                        <th>{{transWord('Type')}}</th>
                                        <th>{{transWord('Lat / Long')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_address as $index => $p)
                                        <tr  class="row_{{$p->id}}">
                                            <td>{{$index + 1}}</td>

                                            <td>{{ $p->user->name }}</td>
                                            <td>{{ $p->street_name }}</td>
                                            <td>{{ $p->building_no }}</td>
                                            <td>{{ $p->floor_no }}</td>
                                            <td>{{ $p->flat_no }}</td>
                                            <td>
                                                @if ($p->address_type == 1)
                                                {{ transWord('Home') }}
                                                @else
                                                {{ transWord('Work') }}
                                                @endif    
                                            </td>
                                            <td>{{ $p->lat.' / '.$p->long }}</td>
                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >
                                                    <li>
                                                        <a href="{{ route('users_delete_addresses',['address'=>$p]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">
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

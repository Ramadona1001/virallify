@extends('dashboard.layouts.app')

@section('title',transWord('Edit Country'))

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



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                    <strong class="card-title">{{transWord('Edit Country')}}</strong>

                </div>
                <div class="card-body">
                   @include('dashboard.components.errors')
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('update_countries' , ['country' => $country])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="name_en" class="col-md-12 col-form-label required_star">{{transWord('Name En')}}</label>
                                            <div class="col-md-12">
                                                <input value="{{$country->name_en}}" class="form-control" type="text" name="name_en" id="name_en">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="name_ar" class="col-md-12 col-form-label required_star">{{transWord('Name Ar')}}</label>
                                            <div class="col-md-12">
                                                <input  value="{{$country->name_ar}}" class="form-control" type="text" name="name_ar" id="name_ar">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="code" class="col-md-12 col-form-label ">{{transWord('Code')}}</label>
                                            <div class="col-md-12">
                                                <input  style="direction:ltr"  value="{{$country->code}}" class="form-control" type="text" name="code" id="code">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="Currency_code" class="col-md-12 col-form-label">{{transWord('Currency Code')}}</label>
                                            <div  class="col-md-12">
                                                <input  style="direction:ltr" value="{{$country->Currency_code}}"  class="form-control" type="text" name="Currency_code" id="Currency_code">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="exchange_rate" class="col-md-12 col-form-label">{{transWord(' Exchange Rate')}}</label>
                                            <div class="col-md-12">
                                                <input value="{{$country->exchange_rate}}" class="form-control" type="number" min="0" step="0.00000001" name="exchange_rate" id="exchange_rate">
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </form>

                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                    <strong class="card-title">{{transWord('Country\'s cities' )}}</strong>

                </div>
                <div class="card-body">
                    @include('dashboard.components.errors')
                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive pt-0">
                                <table id="example" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name En</th>
                                        <th>Name Ar</th>
                                        <th>Code</th>
                                        <th>Country</th>
                                        <th>Areas</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($country->cities as $index => $city)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$city->name_en}}</td>
                                            <td>{{$city->name_ar}}</td>
                                            <td dir="ltr">{{$city->code}}</td>
                                            <td>{{$country->name_en}}</td>
                                            <td>{{$city->areas->count()}}</td>
                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >
                                                    <li>
                                                        <a href="{{route('edit_countries' , ['country' => $country])}}"
                                                           class="text-info"
                                                           data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="Edit"
                                                           data-original-title="Edit">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a onclick="return confirm('Are you sure ?')" href="{{route('destroy_countries' , ['country' => $country])}}"
                                                           class="text-danger sa-delete"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Delete"
                                                           data-original-title="Delete">
                                                            <i class="mdi mdi-trash-can font-size-14"></i>
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





@endsection

@section('javascript')

@endsection

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

                    <div style="text-align: end" class="add_btn">
                        <a id="" class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#couponsModal">
                            <i class="fas fa-plus"></i>
                            {{transWord('Add New')}}
                        </a>
                    </div>

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
                                        <th>{{transWord('Code')}}</th>
                                        <th>{{transWord('Discount Value')}}</th>
                                        <th>{{transWord('Discount Type')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $index => $coupon)
                                        <tr  class="row_{{$coupon->id}}">
                                            <td>{{$index + 1}}</td>
                                            <td>
                                                {{ $coupon->code }}
                                            </td>

                                            <td>
                                                {{ $coupon->discount_value }}
                                            </td>
                                            <td>
                                                {{ $coupon->discount_type }}
                                            </td>



                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >
                                                    <li>
                                                        <a href="{{route('edit_coupons',['coupon' => $coupon])}}"
                                                           class="text-info"
                                                           title="Edit"
                                                           data-original-title="Edit">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a onclick="return confirm('{{ transWord('Are You Sure?') }}')"  href="{{route('delete_coupons',['coupon' => $coupon] )}}" class="text-danger sa-delete"  title="Delete" data-original-title="Delete">
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


    <div class="modal fade" id="couponsModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{ transWord('New Car Type') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_coupons')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="form-group mt-3 col-md-12">
                                <label for="code">{{ transWord('Code') }} </label>
                                <input id="code" type="text" name="code" class="form-control" placeholder="{{ transWord('Code') }}" required>
                            </div>
                            
                            <div class="form-group mt-3 col-md-12">
                                <label for="discount_value">{{ transWord('Discount Value') }} </label>
                                <input id="discount_value" type="text" name="discount_value" class="form-control" placeholder="{{ transWord('Discount Value') }}" required>
                            </div>
                            
                            <div class="form-group mt-3 col-md-12">
                                <label for="discount_type">{{ transWord('Discount Type') }} </label>
                                <select name="discount_type" id="discount_type" class="form-control" required>
                                    <option value="1">{{ transWord('Cash') }}</option>
                                    <option value="2">{{ transWord('Percentage') }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="closeBtn" type="button" class="btn btn-light waves-effect" data-dismiss="modal">{{ transWord('Close') }}</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">{{ transWord('Save') }}</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->








@endsection

@section('scripts')
@endsection

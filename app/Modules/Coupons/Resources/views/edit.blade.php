@extends('dashboard.layouts.app')

@section('title',$title)

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

    @include('dashboard.components.errors')




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                    <strong class="card-title">{{$title}}</strong>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('update_coupons' , ['coupon' => $coupon])}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="code">{{ transWord('Code') }} </label>
                                        <input id="code" type="text" name="code" value="{{ $coupon->code }}" class="form-control" placeholder="{{ transWord('Code') }}" required>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="discount_value">{{ transWord('Discount Value') }} </label>
                                        <input id="discount_value" type="text" value="{{ $coupon->discount_value }}" name="discount_value" class="form-control" placeholder="{{ transWord('Discount Value') }}" required>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="discount_type">{{ transWord('Discount Type') }} </label>
                                        <select name="discount_type" id="discount_type" class="form-control" required>
                                            <option value="1" @if($coupon->discount_type == 1) selected @endif>{{ transWord('Cash') }}</option>
                                            <option value="2" @if($coupon->discount_type == 2) selected @endif>{{ transWord('Percentage') }}</option>
                                        </select>
                                    </div>
        
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{transWord('Update')}}</button>
                                </div>
                            </form>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->



    </div>








@endsection

@section('scripts')
@endsection

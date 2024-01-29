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
                            <form action="{{route('store_orders')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="car_type_id">{{ transWord('Car Type') }} </label>
                                        <select name="car_type_id" id="car_type_id" class="form-control" required>
                                            @foreach ($car_types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="service_id">{{ transWord('Services') }} </label>
                                        <select name="service_id" id="service_id" class="form-control" required>
                                            <option value="">{{ transWord('Select') }}</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}" data-service_price="{{ $service->price }}">{{ $service->name.' ('.transWord('Price').' : '.$service->price.')' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="user_id">{{ transWord('Users') }} </label>
                                        <select name="user_id" id="user_id" class="form-control" required>
                                            <option value="">{{ transWord('Select') }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12 user_plan_id">
                                        <label for="user_plan_id">{{ transWord('Users Plan') }} </label>
                                        <select name="user_plan_id" id="user_plan_id" class="form-control">
                                            <option value="">{{ transWord('Select') }}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="user_address_id">{{ transWord('Users Address') }} </label>
                                        <select name="user_address_id" id="user_address_id" class="form-control">
                                            <option value="">{{ transWord('Select') }}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="order_date">{{ transWord('Order Date') }} </label>
                                        <input type="date" name="order_date" id="order_date" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group mt-3 col-md-12">
                                        <label for="order_time">{{ transWord('Order Time') }} </label>
                                        <input type="time" name="order_time" id="order_time" class="form-control" required>
                                    </div>

                                    <div class="col-12" id="wallet">
                                        <div class="alert alert-success">
                                            <h6>{{ transWord("If you choose from user plan, The debit will be made from the customer's wallet") }}</h6>
                                            <h6>{{ transWord('Remaining balance').' : ' }}<span id="remaining_balance"></span></h6>
                                        </div>
                                    </div>

                                    <h5 class="fw-bold">
                                        {{ transWord('Order Total').' : ' }}
                                        <span id="order_total">0</span>
                                    </h5>
                                    
                                    
        
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
<script>
    $(document).ready(function () {
        $('.user_plan_id').hide();
        $('#wallet').hide();
        $('#user_id').change(function () {
            var user_id = $(this).val();
            var plans_url = '{{ route("get_users_plans_ajax",["id"=>"#id"]) }}';
            plans_url = plans_url.replace('#id',user_id);
            $.ajax({
                url: plans_url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#user_plan_id').empty();
                    $('#user_plan_id').append('<option value="">Select</option>');
                    if (data.length > 0) {
                        $('.user_plan_id').fadeIn();
                        
                        $.each(data, function (key, value) {
                            if (value.wash_number > 0) {
                                $('#user_plan_id').append('<option value="' + value.id + '" data-washing="'+value.wash_number+'">' + value.plan.name + ' (Wash Count : '+value.wash_number+')</option>');
                            }
                        });
                    }else{
                        $('.user_plan_id').hide();
                        $('#wallet').hide();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        
        $('#user_id').change(function () {
            var user_id = $(this).val();
            var address_url = '{{ route("get_users_address_ajax",["id"=>"#id"]) }}';
            address_url = address_url.replace('#id',user_id);
            $.ajax({
                url: address_url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#user_address_id').empty();
                    $('#user_address_id').append('<option value="">Select</option>');
                    $('.user_address_id').fadeIn();
                        $.each(data, function (key, value) {
                            $('#user_address_id').append('<option value="' + value.id + '">' + value.street_name +' / '+ value.building_no +' / '+value.floor_no+' / '+value.flat_no+ '</option>');
                        });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $('#service_id').change(function () {
            if ($(this).val() != '') {
                $('#order_total').html($(this).find(':selected').data('service_price'));
            } else {
                $('#order_total').html("0");
            }
        });

        $('#user_plan_id').change(function () {
            if ($(this).val() != '') {
                $('#wallet').fadeIn();
                $('#remaining_balance').html($(this).find(':selected').data('washing') - 1);
                if ($(this).find(':selected').data('washing') > 0) {
                    $('#order_total').html("0");
                }
            }else{
                $('#wallet').fadeOut();
                $('#remaining_balance').html("");
            }
        });
    });
</script>
@endsection

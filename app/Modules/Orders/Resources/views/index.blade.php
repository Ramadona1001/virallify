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
                                <table id="example" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>{{transWord('Car Type')}}</th>
                                        <th>{{transWord('Service')}}</th>
                                        <th>{{transWord('User Plan')}}</th>
                                        <th>{{transWord('Client')}}</th>
                                        <th>{{transWord('Representative')}}</th>
                                        <th>{{transWord('Client Address')}}</th>
                                        <th>{{transWord('Total')}}</th>
                                        <th>{{transWord('Order Date')}}</th>
                                        <th>{{transWord('Order Time')}}</th>
                                        <th>{{transWord('Order Status')}}</th>
                                        <th>{{transWord('Payment Status')}}</th>
                                        <th>{{transWord('Payment Method')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $index => $order)
                                        <tr  class="row_{{$order->id}}">
                                            <td>{{$index + 1}}</td>
                                            <td>
                                                @if ($order->car_type_id != null)
                                                    {{ $order->car_type->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->service_id != null)
                                                    {{ $order->service->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->user_plan_id != null)
                                                    {{ $order->user_plan->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->client_id != null)
                                                    {{ $order->client->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->representative_id != null)
                                                    {{ $order->representative->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->user_address_id != null)
                                                    {{ $order->user_address->street_name }}
                                                @endif
                                            </td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->order_date }}</td>
                                            <td>{{ $order->order_time }}</td>
                                            <td>{{ $order->order_status }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td></td>
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

@section('scripts')
@endsection

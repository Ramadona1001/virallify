@extends('sales-dashboard.layouts.app')
@section('title','Sales Dashboard')
@section('styles')
@endsection

@section('content')



        <div class="row">
            <div class="col-12">
                <div class="statics_main_wrapper">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card_wrapper">
                                <p class="muted">2023 Total Commissions</p>
                                <div class="line">
                                    <strong>12500  KD</strong>
                                    <img src="{{asset('sales-dashboard/assets/images/icons/dollar.svg')}}" alt="icon">
                                </div>
                                <!-- end::line -->
                                <div class="statics">
                                    <img src="{{asset('sales-dashboard/assets/images/icons/increase.svg')}}" alt="icon">
                                    <span class="percent">%24</span>
                                    <span class="since">Since 2022</span>
                                </div>
                                <!-- end::statics -->
                            </div>
                        </div>
                        <!-- end::col -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card_wrapper">
                                <p class="muted">2023 Total Commissions</p>
                                <div class="line">
                                    <strong>12500  KD</strong>
                                    <img src="{{asset('sales-dashboard/assets/images/icons/sales.svg')}}" alt="icon">
                                </div>
                                <!-- end::line -->
                                <div class="statics">
                                    <img src="{{asset('sales-dashboard/assets/images/icons/increase.svg')}}" alt="icon">
                                    <span class="percent">%24</span>
                                    <span class="since">Since 2022</span>
                                </div>
                                <!-- end::statics -->
                            </div>
                        </div>
                        <!-- end::col -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card_wrapper">
                                <p class="muted">2023 Total Commissions</p>
                                <div class="line">
                                    <strong>12500  KD</strong>
                                    <img src="{{asset('sales-dashboard/assets/images/icons/units.svg')}}" alt="icon">
                                </div>
                                <!-- end::line -->
                                <div class="statics">
                                    <img src="{{asset('sales-dashboard/assets/images/icons/decrease.svg')}}" class="decrease" alt="icon">
                                    <span class="percent decrease">%24</span>
                                    <span class="since">Since 2022</span>
                                </div>
                                <!-- end::statics -->
                            </div>
                        </div>
                        <!-- end::col -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card_wrapper">
                                <p class="muted">2023 Total Commissions</p>
                                <div class="line">
                                    <strong>12500  KD</strong>
                                    <img src="{{asset('sales-dashboard/assets/images/icons/wallet.svg')}}" alt="icon">
                                </div>
                                <!-- end::line -->
                                <div class="statics">
                                    <img src="{{asset('sales-dashboard/assets/images/icons/increase.svg')}}" alt="icon">
                                    <span class="percent">%24</span>
                                    <span class="since">Since 2022</span>
                                </div>
                                <!-- end::statics -->
                            </div>
                        </div>
                        <!-- end::col -->
                    </div>
                    <!-- end::row -->
                </div>
                <!-- end::statics_main_wrapper -->
            </div>
            <!-- end::col -->

            <div class="col-xl-8 col-lg-12">
                <div class="chart_main_wrapper section_card">
                    <div class="header_wrapper">
                        <h4 class="title">Commissions Overview</h4>
                        <div class="options">
                            <select class="form-select">
                                <option value="">Q3 - 2023</option>
                                <option value="">Q2 - 2023</option>
                                <option value="">Q1 - 2023</option>
                                <option value="">Q4 - 2023</option>
                            </select>
                        </div>
                        <!-- end::options -->
                    </div>
                    <!-- end::header_wrapper -->

                    <div class="body_wrapper">
                        <div class="statics">
                            <img src="{{asset('sales-dashboard/assets/images/icons/increase.svg')}}" alt="icon">
                            <span class="percent">%24</span>
                            <span class="since">Since 2022</span>
                        </div>
                        <!-- end::statics -->
                        <img src="{{asset('sales-dashboard/assets/images/graph.png')}}" alt="graph" class="w-100 d-block" height="300">
                    </div>
                    <!-- end::body_wrapper -->
                </div>
            </div>
            <!-- end::col -->

            <div class="col-xl-4 col-lg-12">
                <div class="assigned_tasks_wrapper">
                    <div class="header_wrapper">
                        <h4 class="title">Assigned Tasks</h4>
                    </div>
                    <!-- end::header_wrapper -->
                    <div class="body_wrapper">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active"data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="false">Upcoming</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#progress" type="button" role="tab" aria-controls="progress" aria-selected="false">In Progress</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#done" type="button" role="tab" aria-controls="done" aria-selected="false">Done</button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="all" role="tabpanel">
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status inprogress">In Progress</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->

                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status coming">Upcoming</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->

                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status done">Done</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                            </div>
                            <!-- end::tab-pane -->

                            <div class="tab-pane fade" id="upcoming" role="tabpanel">
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status coming">Upcoming</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status coming">Upcoming</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status coming">Upcoming</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                            </div>
                            <!-- end::tab-pane -->

                            <div class="tab-pane fade" id="progress" role="tabpanel">
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status inprogress">In Progress</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status inprogress">In Progress</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status inprogress">In Progress</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                            </div>
                            <!-- end::tab-pane -->

                            <div class="tab-pane fade" id="done" role="tabpanel">
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status done">Done</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status done">Done</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                                <div class="line">
                                    <h5 class="title">Rental Appointment</h5>
                                    <div class="wrapper">
                                        <div class="item">
                                            <span>John Mike</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span>8:00 AM</span>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item">
                                            <span class="status done">Done</span>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::Rental Appointment -->
                                </div>
                                <!-- end::line -->
                            </div>
                            <!-- end::tab-pane -->
                        </div>
                    </div>
                    <!-- end::body_wrapper -->
                </div>
            </div>
            <!-- end::col -->

            <div class="col-12">
                <div class="target_overview_wrapper section_card">
                    <div class="header_wrapper">
                        <h4 class="title">Target/Achievement Overview</h4>
                        <div class="options">
                            <select class="form-select">
                                <option value="">2023</option>
                                <option value="">2022</option>
                                <option value="">2021</option>
                                <option value="">2020</option>
                            </select>
                        </div>
                        <!-- end::options -->
                    </div>
                    <!-- end::header_wrapper -->

                    <div class="body_wrapper">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card_wrapper">
                                    <div class="item">
                                        <span class="title">Q1</span>
                                    </div>
                                    <!-- end::item -->
                                    <div class="item">
                                        <div class="wrapper">
                                            <span>Target</span>
                                            <span>125000 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                        <div class="wrapper">
                                            <span>Achievement</span>
                                            <span>122500 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                    </div>
                                    <!-- end::item -->
                                </div>
                            </div>
                            <!-- end::col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card_wrapper">
                                    <div class="item">
                                        <span class="title">Q1</span>
                                    </div>
                                    <!-- end::item -->
                                    <div class="item">
                                        <div class="wrapper">
                                            <span>Target</span>
                                            <span>125000 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                        <div class="wrapper">
                                            <span>Achievement</span>
                                            <span>122500 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                    </div>
                                    <!-- end::item -->
                                </div>
                            </div>
                            <!-- end::col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card_wrapper">
                                    <div class="item">
                                        <span class="title">Q1</span>
                                    </div>
                                    <!-- end::item -->
                                    <div class="item">
                                        <div class="wrapper">
                                            <span>Target</span>
                                            <span>125000 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                        <div class="wrapper">
                                            <span>Achievement</span>
                                            <span>122500 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                    </div>
                                    <!-- end::item -->
                                </div>
                            </div>
                            <!-- end::col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card_wrapper">
                                    <div class="item">
                                        <span class="title">Q1</span>
                                    </div>
                                    <!-- end::item -->
                                    <div class="item">
                                        <div class="wrapper">
                                            <span>Target</span>
                                            <span>125000 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                        <div class="wrapper">
                                            <span>Achievement</span>
                                            <span>122500 KD</span>
                                        </div>
                                        <!-- end::wrapper -->
                                    </div>
                                    <!-- end::item -->
                                </div>
                            </div>
                            <!-- end::col -->
                        </div>
                        <!-- end::row -->
                    </div>
                    <!-- end::body_wrapper -->
                </div>
            </div>
            <!-- end::col -->
        </div>






@endsection

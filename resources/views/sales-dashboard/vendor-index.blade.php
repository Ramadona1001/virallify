@extends('sales-dashboard.layouts.app')
@section('title','Sales Dashboard')
@section('styles')
@endsection

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="statics_main_wrapper">
                <div class="row justify-content-around">
                    <div class="col-xl-3 col-md-6">
                        <div class="card_wrapper">
                            <p class="muted">Total Listings</p>
                            <div class="line">
                                <strong>29</strong>
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
                            <p class="muted">Units For Sale</p>
                            <div class="line">
                                <strong>12</strong>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card_wrapper">
                            <p class="muted">Units for Rent</p>
                            <div class="line">
                                <strong>17</strong>
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
                </div>
                <!-- end::row -->
            </div>
            <!-- end::statics_main_wrapper -->
        </div>
        <!-- end::col -->

        <div class="col-12">
            <div class="vendor_dashboard_wrapper">
                <div class="header_wrapper h-flex">
                    <h4 class="title">Rental Overview</h4>
                    <div class="options">
                        <select class="form-select" title="filter">
                            <option value="">April</option>
                            <option value="">May</option>
                            <option value="">Jun</option>
                            <option value="">July</option>
                        </select>
                    </div>
                </div>
                <!-- end::header_wrapper -->
                <div class="body_wrapper">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"> Unit</th>
                                <th scope="col"> Purpose</th>
                                <th scope="col"> Price</th>
                                <th scope="col"> Client</th>
                                <th scope="col"> Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="unit-details.php">Apartment</a></td>
                                <td>Rent</td>
                                <td>150 KD</td>
                                <td>Elite Homes</td>
                                <td><span class="status paid">Paid</span></td> <!-- toggle class (paid,unpaid) to change label style -->
                            </tr>
                            <tr>
                                <td><a href="unit-details.php">Apartment</a></td>
                                <td>Rent</td>
                                <td>150 KD</td>
                                <td>Elite Homes</td>
                                <td><span class="status paid">Paid</span></td> <!-- toggle class (paid,unpaid) to change label style -->
                            </tr>
                            <tr>
                                <td><a href="unit-details.php">Apartment</a></td>
                                <td>Rent</td>
                                <td>150 KD</td>
                                <td>Elite Homes</td>
                                <td><span class="status paid">Paid</span></td> <!-- toggle class (paid,unpaid) to change label style -->
                            </tr>
                            <tr>
                                <td><a href="unit-details.php">Apartment</a></td>
                                <td>Rent</td>
                                <td>150 KD</td>
                                <td>Elite Homes</td>
                                <td><span class="status unpaid">Unpaid</span></td> <!-- toggle class (paid,unpaid) to change label style -->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end::table-responsive -->

                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M14.8933 15.9999L19.1863 20.2929C19.2818 20.3852 19.358 20.4955 19.4104 20.6175C19.4628 20.7395 19.4904 20.8707 19.4915 21.0035C19.4927 21.1363 19.4674 21.268 19.4171 21.3909C19.3668 21.5138 19.2926 21.6254 19.1987 21.7193C19.1048 21.8132 18.9931 21.8875 18.8702 21.9377C18.7473 21.988 18.6157 22.0133 18.4829 22.0122C18.3501 22.011 18.2189 21.9834 18.0969 21.931C17.9749 21.8786 17.8645 21.8024 17.7723 21.7069L12.7723 16.7069C12.5848 16.5194 12.4795 16.2651 12.4795 15.9999C12.4795 15.7348 12.5848 15.4804 12.7723 15.2929L17.7723 10.2929C17.9609 10.1108 18.2135 10.01 18.4757 10.0122C18.7379 10.0145 18.9887 10.1197 19.1741 10.3051C19.3595 10.4905 19.4647 10.7413 19.467 11.0035C19.4692 11.2657 19.3684 11.5183 19.1863 11.7069L14.8933 15.9999Z" fill="#3B4348"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M18.0649 16.0001L13.7719 11.7071C13.5898 11.5185 13.489 11.2659 13.4912 11.0037C13.4935 10.7415 13.5987 10.4907 13.7841 10.3053C13.9695 10.1199 14.2203 10.0147 14.4825 10.0124C14.7447 10.0101 14.9973 10.1109 15.1859 10.2931L20.1859 15.2931C20.3734 15.4806 20.4787 15.7349 20.4787 16.0001C20.4787 16.2652 20.3734 16.5196 20.1859 16.7071L15.1859 21.7071C14.9973 21.8892 14.7447 21.99 14.4825 21.9878C14.2203 21.9855 13.9695 21.8803 13.7841 21.6949C13.5987 21.5095 13.4935 21.2587 13.4912 20.9965C13.489 20.7343 13.5898 20.4817 13.7719 20.2931L18.0649 16.0001Z" fill="#3B4348"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- end::body_wrapper -->
            </div>
        </div>
        <!-- end::col -->
    </div>







@endsection

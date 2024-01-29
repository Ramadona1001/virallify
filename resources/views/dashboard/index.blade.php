@extends('dashboard.layouts.app')

@section('title',transWord('Dashboard'))

@section('styles')

@endsection

@section('content')
@if (auth()->user()->hasRole('Admin'))
<h4 class="mb-3">{{ transWord('Statistics')  }}</h4>
    <div class="row">
        @foreach ($statistics as $state)
        <div class="col-md-3">
            <div class="card static">
                <div class="card-body">
                    <div class="media align-items-center text-center">
                        <div class="media-body overflow-hidden">
                            <p class="font-size-14 mb-2">{{ $state[0] }}</p>
                            <b class="text-primary font-size-20">
                                {{ $state[1] }}
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>    
@endif

@if (auth()->user()->hasRole('Vendor'))
@php
    $vendor = \Vendors\Models\Vendor::where('user_id',auth()->user()->id)->first();
@endphp
<h4 class="mb-3">{{ transWord('Statistics')  }}</h4>
    <div class="row">

        @foreach (vendorStatistics($vendor->id) as $state)
        <div class="col-md-3">
            <div class="card static">
                <div class="card-body">
                    <div class="media align-items-center text-center">
                        <div class="media-body overflow-hidden">
                            <p class="font-size-14 mb-2">{{ $state[0] }}</p>
                            <b class="text-primary font-size-20">
                                {{ $state[1] }}
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>    
@endif

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyBRyMNqn7HcivokRvq_x4d41aQVfkKQYr8",
        authDomain: "elite-homes-9c47c.firebaseapp.com",
        projectId: "elite-homes-9c47c",
        storageBucket: "elite-homes-9c47c.appspot.com",
        messagingSenderId: "527981052710",
        appId: "1:527981052710:web:c731b965c8f56f022bf7e7",
        measurementId: "G-2GJQKJKKCH"
    };

    firebase.initializeApp(firebaseConfig);

</script>


@endsection

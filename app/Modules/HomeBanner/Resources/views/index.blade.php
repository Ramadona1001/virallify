@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
    <style>
        #imagePreview{
            width: 85%;
            height: 85%;
            border-radius: 50%;
            margin-top: 30px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
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
                <div class="card-header bg-white d-flex align-items-center justify-content-between pb-0 border-bottom">
                    <strong class="card-title">
                       {{ transWord('Home Banner') }}
                    </strong>
                </div>
                <div class="card-body p-5">
                    <div class="row">

                        <div class="col-md-12">

                            <form action="{{ $home_banner ? route('update_home_banner',['home_banner' => $home_banner]) : route('store_home_banner') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="nav-align-top mb-4">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        @foreach (config('app.languages') as $key => $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if ($loop->index == 0) active @endif" id="nav-{{ $key }}-tab" data-toggle="tab" href="#nav-{{ $key }}" role="tab" aria-controls="nav-{{ $key }}" aria-selected="@if ($loop->index == 0){{ 'true' }}@else{{ 'false' }}@endif">{{ $lang }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div style="border:1px solid #cccccc" class="tab-content" id="myTabContent">
                                        @foreach (config('app.languages') as $key => $lang)
                                            <div class="tab-pane fade  @if ($loop->index == 0) show active @endif" id="nav-{{ $key }}" role="tabpanel" aria-labelledby="nav-{{ $key }}-tab">


                                                <div class="form-group mt-3 col-md-12">
                                                    <label for=""> {{transWord('Title')}} - {{$lang}}</label>
                                                    <textarea required rows="4" name="{{$key}}[title]" class="form-control" placeholder="" id="">{{ $home_banner ? $home_banner->translate($key)->title : '' }}</textarea>
                                                </div>
                                                
                                                <div class="form-group mt-3 col-md-12">
                                                    <label for=""> {{transWord('Content')}} - {{$lang}}</label>
                                                    <textarea required rows="4" name="{{$key}}[content]" class="form-control" placeholder="" id="">{{ $home_banner ? $home_banner->translate($key)->content : '' }}</textarea>
                                                </div>
                                                
                                                <div class="form-group mt-3 col-md-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for=""> {{transWord('Button 1 Text')}} - {{$lang}}</label>
                                                            <input type="text" name="{{$key}}[btn1_text]" id="btn1_text" class="form-control" value="{{ $home_banner->translate($key)->btn1_text }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for=""> {{transWord('Button 1 Link')}} - {{$lang}}</label>
                                                            <input type="text" name="{{$key}}[btn1_link]" id="btn1_link" class="form-control" value="{{ $home_banner->translate($key)->btn1_link }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group mt-3 col-md-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for=""> {{transWord('Button 2 Text')}} - {{$lang}}</label>
                                                            <input type="text" name="{{$key}}[btn2_text]" id="btn2_text" class="form-control" value="{{ $home_banner->translate($key)->btn2_text }}">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for=""> {{transWord('Button 2 Link')}} - {{$lang}}</label>
                                                            <input type="text" name="{{$key}}[btn2_link]" id="btn2_link" class="form-control" value="{{ $home_banner->translate($key)->btn2_link }}">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-8">
                                        <div class="form-group mt-3">
                                            <label for="file" class=""> {{transWord('Image')}}</label>
                                            <div id="dropzone2">
                                                <div>{{ transWord('Click Or Drag Here') }}</div>
                                                <input  name="{{$home_banner ? 'image' : 'image'}}" type="file" id="imageUpload"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <a target="_blank" href="">
                                            <div id="imagePreview"
                                                 style="background-image:url('{{$home_banner ? asset($home_banner->image) : '' }}');background-size:contain;"></div>
                                        </a>
                                    </div>



                                    <div class="modal-footer">
                                        <div class="form-group mt-3 row">
                                            <button type="submit" class="btn btn-primary">{{transWord('Update')}}</button>
                                        </div>
                                    </div>


                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div> <!-- end col -->




    </div>








@endsection

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#imagePreview").css(
                        "background-image",
                        "url(" + e.target.result + ")"
                    );
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });

    </script>
@endsection

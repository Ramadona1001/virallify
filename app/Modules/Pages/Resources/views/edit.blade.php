@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
    <style>
        #imagePreview{
            width: 100%;
            height: 100%;
            border-radius: 15px;
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
                <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                    <strong class="card-title">{{$title}}</strong>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('update_pages' ,['p'=>$p])}}" method="post" enctype="multipart/form-data">
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
                                                    <label>{{ transWord('Name') }} - {{ $lang }}</label>
                                                    <input value="{{$p->translate($key)->title}}"  type="text" name="{{ $key }}[title]" class="form-control" placeholder="{{ transWord('Name') }}" required>
                                                </div>

                                                <div class="form-group mt-3 col-md-12">
                                                    <label for=""> {{transWord('Content')}} - {{$lang}}</label>
                                                    <textarea rows="6" name="{{$key}}[content]" class="editor form-control" placeholder="" id="">{{$p->translate($key)->content}}</textarea>
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
                                                <input name="page_image" type="file" id="imageUpload"/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <a target="_blank" href="">
                                            <div style="background-image:url({{asset($p->image)}})" id="imagePreview"></div>
                                        </a>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-12 col-form-label">{{ transWord('Slug') }} </label>
                                            <input type="text" value="{{ $p->slug }}" name="slug" id="slug" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-12 col-form-label">{{ transWord('Status') }} </label>
                                            <div class="col-md-12">
                                                <div class="mt-4 mt-lg-0">
                                                    <select class="form-control" name="publish">
                                                        <option {{$p->publish == 1 ? "selected" : ""}} value="1">
                                                            {{ transWord('Show in website') }}
                                                        </option>
                                                        <option {{$p->publish == 0 ? "selected" : ""}} value="0">
                                                            {{ transWord('Hidden') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>
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

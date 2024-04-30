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
                    <strong class="card-title">{{transWord('Edit Social Media')}}</strong>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('update_social_media' , ['media' => $media])}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <img style="width: 60px;height:60px;border-radius: 50%;margin:5px auto;" src="{{asset($media->social_icon)}}" alt="">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="social_icon" class="">{{transWord('Social Icon')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <input type="file" id="social_icon" class="form-control" name="new_social_icon">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="title" class="">{{transWord('Social Title')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <input value="{{$media->title}}" type="text" id="title" class="form-control" name="social_link" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label for="social_link" class="">{{transWord('Status')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <select name="status" id="publish" class="form-control" style="display: block !important">
                                                    <option value="1" @if($media->status == 1) selected @endif>{{ transWord('Publish') }}</option>
                                                    <option value="0" @if($media->status == 0) selected @endif>{{ transWord('Un Publish') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <div class="form-group row">
                                            <button type="submit" class="btn btn-primary">{{transWord('Update')}}</button>
                                        </div>
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
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function (e) {
        //             $("#imagePreview").css(
        //                 "background-image",
        //                 "url(" + e.target.result + ")"
        //             );
        //             $("#imagePreview").hide();
        //             $("#imagePreview").fadeIn(650);
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        //
        // $("#imageUpload").change(function () {
        //     readURL(this);
        // });

    </script>
@endsection

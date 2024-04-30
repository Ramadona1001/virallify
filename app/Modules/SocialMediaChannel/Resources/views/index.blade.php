@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
    <style>
        .modal-dialog-scrollable {
            height: auto !important;
        }

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
                    <strong class="card-title">{{transWord('Social Media Channel')}}</strong>
                     @can('create_social_channel_media')
                        <div style="text-align: end" class="add_btn">
                            <a id="" class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#socialMediaModal">
                                <i class="fas fa-plus"></i>
                                {{transWord('Add New')}}
                            </a>
                        </div>
                    @endcan

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
                                        <th>{{transWord('Title')}}</th>
                                        <th>{{transWord('Icon')}}</th>
                                        <th>{{transWord('Publish')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($media_items as $index => $media)
                                        <tr  class="unitRow_{{$media->id}}">
                                            <td>{{$index + 1}}</td>
                                            <td>{{ $media->title }}</td>
                                            <td>
                                               <img style="width: 60px;height:60px;border-radius: 50%" src="{{asset($media->social_icon)}}" alt="">
                                            </td>
                                            <td>
                                                @if ($media->status == 1)
                                                    <h3 class="badge bg-primary">{{ transWord('Published') }}</h3>
                                                @else
                                                    <h3 class="badge bg-danger">{{ transWord('Un Published') }}</h3>
                                                @endif
                                            </td>


                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details mx-1" >
                                                    @can('update_social_channel_media')
                                                    <li>
                                                        <a href="{{route('edit_social_channel_media',['media' => $media])}}"
                                                           class="btn btn-sm btn-primary mx-1"
                                                           title="Edit"
                                                           data-original-title="Edit">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>
                                                    @endcan

                                                    @can('delete_social_channel_media')
                                                    <li>
                                                        <a onclick="return confirm('{{ transWord('Are You Sure?') }}')"  href="{{route('delete_social_channel_media',['media' => $media] )}}" class="btn btn-sm btn-danger sa-delete"  title="Delete" data-original-title="Delete">
                                                            <i class="mdi mdi-trash-can font-size-14"></i>
                                                        </a>
                                                    </li>
                                                    @endcan

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

@can('create_social_channel_media')
    <div class="modal fade" id="socialMediaModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{ transWord('New Social Media Channel') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_social_channel_media')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">


                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="title" class="">{{transWord('Social Title')}}</label>
                                        <div class="mt-4 mt-lg-0">
                                            <input type="text" id="title" class="form-control" name="title" required>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="social_icon" class="">{{transWord('Social Icon')}}</label>
                                        <div class="mt-4 mt-lg-0">
                                            <input type="file" id="social_icon" class="form-control" name="social_icon" required>
                                        </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="social_link" class="">{{transWord('Status')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <select name="status" id="publish" class="form-control" style="display: block !important">
                                            <option value="1">{{ transWord('Publish') }}</option>
                                            <option value="0">{{ transWord('Un Publish') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button id="closeBtn" type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endcan







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

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
                    <strong class="card-title">{{transWord(' Pages')}}</strong>

                    @can('create_pages')
                    <div style="text-align: end" class="add_btn">
                        <a id="newPageModal" class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#pageModal">
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
                                        <th>{{transWord('Image')}}</th>
                                        <th>{{transWord('Title')}}</th>
                                        <th>{{transWord('Content')}}</th>
                                        <th>{{transWord('Slug')}}</th>
                                        <th>{{transWord('Status')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $index => $page)
                                        <tr  class="Row_{{$page->id}}">
                                            <td>{{$index + 1}}</td>
                                            <td>
                                                @if($page->image)
                                                    <a href="{{asset($page->image)}}">
                                                        <img src="{{asset($page->image)}}" style="height: 70px;width:100%;border-radius: 10px" alt="">
                                                    </a>
                                                @else

                                                @endif

                                            </td>
                                            <td>{{$page->title}}</td>
                                            <td>
                                                {!! Str::limit(strip_tags($page->content), 30, $end=".." ) !!}
                                            </td>
                                            <td>
                                                {{ $page->slug }}
                                            </td>


                                            <td>
                                                @if($page->publish == 1 )
                                                    <i class="fas fa-check text-success"></i>
                                                @else
                                                    <i class="fas fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <ul style="" class="dtr-details" >

                                                    @can('update_pages')
                                                    <li>
                                                        <a href="{{route('edit_pages',['p' => $page])}}"
                                                           class="btn btn-primary btn-sm">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>
                                                    @endcan

                                                    {{-- @can('delete_pages')
                                                    <li>
                                                        <a onclick="return confirm('{{ transWord('Are You Sure?') }}')"  href="{{route('destroy_pages',['p' => $page] )}}" class="btn btn-danger btn-sm sa-delete">
                                                            <i class="mdi mdi-trash-can font-size-14"></i>
                                                        </a>
                                                    </li>
                                                        @endcan --}}
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


    @can('create_pages')
    <div class="modal fade" id="pageModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{transWord('New Page')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_pages')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="nav-align-top mb-4">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif" id="nav-{{ $key }}-tab" data-toggle="tab" href="#nav-{{ $key }}" role="tab" aria-controls="nav-{{ $key }}" aria-selected="@if ($loop->index == 0){{ 'true' }}@else{{ 'false' }}@endif">{{ $lang }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div style="border: 1px solid #cccccc" class="tab-content" id="myTabContent">
                                @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade  @if ($loop->index == 0) show active @endif" id="nav-{{ $key }}" role="tabpanel" aria-labelledby="nav-{{ $key }}-tab">
                                        <div class="form-group mt-3 col-md-12">
                                            <label>{{ transWord('Name') }} - {{ $lang }}</label>
                                            <input  type="text" name="{{ $key }}[title]" class="form-control" placeholder="{{ transWord('Name') }}" required>
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label for=""> {{transWord('Content')}} - {{$lang}}</label>
                                            <textarea  rows="6" name="{{$key}}[content]" class="form-control editor"></textarea>
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
                                        <input name="image" type="file" id="imageUpload"/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <a target="_blank" href="">
                                    <div id="imagePreview"></div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 col-form-label">{{ transWord('Slug') }} </label>
                                    <input type="text" name="slug" id="slug" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 col-form-label">{{ transWord('Status') }} </label>
                                    <div class="col-md-12">
                                        <div class="mt-4 mt-lg-0">
                                            <select class="form-control" name="publish">
                                                <option value="1">
                                                    {{ transWord('Show in website') }}
                                                </option>
                                                <option value="0">
                                                    {{ transWord('Hidden') }}
                                                </option>
                                            </select>
                                        </div>
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

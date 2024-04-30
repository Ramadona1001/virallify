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

                    <div style="text-align: end" class="add_btn">
                        <a id="" class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#sectionsModal">
                            <i class="fas fa-plus"></i>
                            {{transWord('Add New')}}
                        </a>
                    </div>

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
                                        <th>{{transWord('Sub Title')}}</th>
                                        <th>{{transWord('Content')}}</th>
                                        <th>{{ transWord('Button Link') }}</th>
                                        <th>{{transWord('Order Number')}}</th>
                                        <th>{{transWord('Type')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sections as $index => $section)
                                        <tr  class="row_{{$section->id}}">
                                            <td>{{$index + 1}}</td>
                                            <td>
                                              {{$section->translate()->name}}
                                            </td>
                                            
                                            <td>
                                              {{$section->translate()->sub_title}}
                                            </td>

                                            <td>
                                                {{ Str::substr($section->translate()->content, 0, 50).' ...' }}
                                            </td>

                                            <td>
                                                @if($section->btn_text != null)
                                                <a href="{{ $section->btn_url }}" class="btn btn-primary">{{ $section->btn_text }}</a>
                                                @endif
                                            </td>

                                            <td>
                                                {{ $section->order_no }}
                                            </td>
                                            
                                            <td>
                                                {{ $section->type }}
                                            </td>



                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >
                                                    <li>
                                                        <a href="{{route('edit_sections',['section' => $section])}}"
                                                           class="text-info"
                                                           title="Edit"
                                                           data-original-title="Edit">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a onclick="return confirm('{{ transWord('Are You Sure?') }}')"  href="{{route('delete_sections',['section' => $section] )}}" class="text-danger sa-delete"  title="Delete" data-original-title="Delete">
                                                            <i class="mdi mdi-trash-can font-size-14"></i>
                                                        </a>
                                                    </li>

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


    <div class="modal fade" id="sectionsModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{ transWord('New About Section') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_sections')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="nav-align-top mb-4">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif" id="nav-{{ $key }}-tab" data-toggle="tab" href="#nav-{{ $key }}" role="tab" aria-controls="nav-{{ $key }}" aria-selected="@if ($loop->index == 0){{ 'true' }}@else{{ 'false' }}@endif">{{ $lang }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade  @if ($loop->index == 0) show active @endif" id="nav-{{ $key }}" role="tabpanel" aria-labelledby="nav-{{ $key }}-tab">
                                        <div class="form-group mt-3 col-md-12">
                                            <label for="name">{{ transWord('Title') }} - {{ $lang }}</label>
                                            <input id="name" type="text" name="{{ $key }}[name]" class="form-control" placeholder="{{ transWord('Title') }}" required>
                                        </div>
                                        
                                        <div class="form-group mt-3 col-md-12">
                                            <label for="name">{{ transWord('Sub Title') }} - {{ $lang }}</label>
                                            <input id="name" type="text" name="{{ $key }}[sub_title]" class="form-control" placeholder="{{ transWord('Sub Title') }}" required>
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label for="content"> {{transWord('Content')}} - {{$lang}}</label>
                                            <textarea id="content" rows="5" name="{{ $key }}[content]" class="form-control" placeholder="{{ transWord('content') }}" required></textarea>
                                        </div>


                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="order_no">{{transWord('Button Text')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="text" class="form-control" name="btn_text">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="order_no">{{transWord('Button URL')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="url" class="form-control" name="btn_url">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group row">
                                    <label for="order_no">{{transWord('Order Number')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="number" step="1" min="0" value="0" id="order_no" class="form-control" name="order_no">
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label for="image">{{transWord('Image')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="file" id="image" class="form-control" name="images[]" multiple>
                                    </div>
                                </div>
                            </div>
                            

                        </div>

                        <div class="form-group row">
                            <label for="type">{{transWord('Type')}}</label>
                            <input type="text" name="type" id="type" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button id="closeBtn" type="button" class="btn btn-light waves-effect" data-dismiss="modal">{{ transWord('Close') }}</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">{{ transWord('Save') }}</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->








@endsection

@section('scripts')
@endsection

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
                        <a id="" class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#partnersModal">
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
                                        <th>{{transWord('Image')}}</th>
                                        <th>{{transWord('Name')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partners as $index => $partner)
                                        <tr  class="row_{{$partner->id}}">
                                            <td>{{$index + 1}}</td>
                                            <td>
                                                @if ($partner->image != null)
                                                    <img src="{{ asset($partner->image) }}" style="width:40px;">
                                                @else
                                                    {{ transWord('No Image') }}
                                                @endif
                                            </td>

                                            <td>
                                              {{$partner->translate()->name}}
                                            </td>

                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >
                                                    <li>
                                                        <a href="{{route('edit_partners',['partner' => $partner])}}"
                                                           class="text-info"
                                                           title="Edit"
                                                           data-original-title="Edit">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a onclick="return confirm('{{ transWord('Are You Sure?') }}')"  href="{{route('delete_partners',['partner' => $partner] )}}" class="text-danger sa-delete"  title="Delete" data-original-title="Delete">
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


    <div class="modal fade" id="partnersModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{ transWord('New partner') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_partners')}}" method="post" enctype="multipart/form-data">
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
                                            <label for="name">{{ transWord('Name') }} - {{ $lang }}</label>
                                            <input id="name" type="text" name="{{ $key }}[name]" class="form-control" placeholder="{{ transWord('Name') }}" required>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">



                            <div class="col">
                                <div class="form-group row">
                                    <label for="image">{{transWord('Image')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="file" id="image" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>
                            
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

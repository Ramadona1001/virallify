@extends('dashboard.layouts.app')

@section('title',transWord('All FAQs'))

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


@can('create_homepage_faqs')
    <div class="modal fade" id="faqModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">New FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form   action="{{route('store_faq_settings')}}" method="post">
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
                                            <label class="required_star">{{ transWord('Question') }} - {{ $lang }}</label>
                                            <textarea rows="3" name="{{ $key }}[question]" class="form-control" placeholder="{{ transWord('Question') }}" required></textarea>
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label class="required_star">{{ transWord('Answer') }} - {{ $lang }}</label>
                                            <textarea rows="4" name="{{ $key }}[answer]" class="form-control" placeholder="{{ transWord('Answer') }}" required></textarea>
                                        </div>

                                    </div>
                                @endforeach
                            </div>


                        </div>

                        <div class="row">



                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 col-form-label">Status </label>
                                    <div class="col-md-12">
                                        <div class="mt-4 mt-lg-0">
                                            <select class="form-control" name="publish">
                                                <option value="1">
                                                    Show in website
                                                </option>
                                                <option value="0">
                                                    Hidden
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button id="closeBtn" type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>


                    </form>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endcan

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                    <strong class="card-title">{{transWord('FAQs')}}</strong>
                    @can('create_homepage_faqs')
                    <div style="text-align: end" class="add_btn">
                        <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#faqModal">
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
                                        <th>{{transWord('Question')}}</th>
                                        <th>{{transWord('Answer')}}</th>
                                        <th>{{transWord('Status')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faqs as $index => $faq)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{ Str::limit($faq->translate()->question ,30,$end="...") }}</td>
                                            <td>{{ Str::limit($faq->translate()->answer ,50,$end="...") }}</td>
                                            <td>
                                                @if($faq->publish == "1")
                                                    <i class="fa fa-check text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <ul style="" class="dtr-details" >
                                                    @can('update_homepage_faqs')
                                                    <li>
                                                        <a href="{{route('edit_faq_settings',['faq' => $faq])}}"
                                                           class="btn btn-primary btn-sm">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>
                                                    @endcan

                                                    @can('delete_homepage_faqs')
                                                    <li>
                                                        <a onclick="return confirm('{{ transWord('Are You Sure?') }}')"  href="{{route('delete_faq_settings',['faq' => $faq] )}}" class="btn btn-danger btn-sm sa-delete">
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

@endsection

@section('scripts')

@endsection

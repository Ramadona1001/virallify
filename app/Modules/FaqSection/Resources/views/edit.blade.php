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


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center justify-content-between border-bottom">
                    <strong class="card-title">{{transWord('FAQs')}}</strong>

                </div>
                <div class="card-body">
                    <form   action="{{route('update_faq_settings' , ['faq'=>$faq])}}" method="post">
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
                                            <textarea rows="3" name="{{ $key }}[question]" class="form-control" placeholder="{{ transWord('Question') }}" required>{{$faq->translate($key)->question}}</textarea>
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label class="required_star">{{ transWord('Answer') }} - {{ $lang }}</label>
                                            <textarea rows="4" name="{{ $key }}[answer]" class="form-control" placeholder="{{ transWord('Answer') }}" required>{{$faq->translate($key)->answer}}</textarea>
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
                                                <option {{$faq->publish == "1" ? "selected" : ""}} value="1">
                                                    Show in website
                                                </option>
                                                <option {{$faq->publish == "0" ? "selected" : ""}} value="0">
                                                    Hidden
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">{{transWord('Update')}}</button>
                        </div>


                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection

@section('javascript')

@endsection

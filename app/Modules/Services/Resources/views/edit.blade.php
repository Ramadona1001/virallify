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
                    <strong class="card-title">{{$title}}</strong>

                </div>
                <div class="card-body">

                    @if ($service->image != null)
                        <img src="{{ asset($service->image) }}" style="display:block;margin-left:auto;margin-right:auto;width:200px;" class="img-thumbnail">
                        <hr>
                    @else
                        {{ transWord('No Image') }}
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('update_services' , ['service' => $service])}}" method="post" enctype="multipart/form-data">
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
                                                    <input value="{{$service->translate($key)->name}}" id="name" type="text" name="{{ $key }}[name]" class="form-control" placeholder="{{ transWord('Name') }}" required>
                                                </div>

                                                <div class="form-group mt-3 col-md-12">
                                                    <label for="content"> {{transWord('Content')}} - {{$lang}}</label>
                                                    <textarea id="content" rows="5" name="{{ $key }}[content]" class="form-control" placeholder="{{ transWord('content') }}" required>{{$service->translate($key)->content}}</textarea>
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
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{transWord('Update')}}</button>
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
@endsection

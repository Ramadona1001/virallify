@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
<link rel="stylesheet" href="{{ setPublic() }}dashboard/assets/css/taginput.css">
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
                    <strong class="card-title">
                        {{ $title }}    
                    </strong>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('update_plans' , ['plan' => $plan])}}" method="post">
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
                                                    <input value="{{$plan->translate($key)->name}}" id="name" type="text" name="{{ $key }}[name]" class="form-control" placeholder="{{ transWord('Name') }}" required>
                                                </div>

                                                <div class="form-group mt-3 col-md-12">
                                                    <label for="content"> {{transWord('Content')}} - {{$lang}}</label>
                                                    <textarea id="content" rows="5" name="{{ $key }}[content]" class="form-control" placeholder="{{ transWord('content') }}" required>{{$plan->translate($key)->content}}</textarea>
                                                </div>

                                                <div class="form-group mt-3 col-md-12">
                                                    <label>{{ transWord('Items') }} - {{ $lang }}</label>
                                                    <input type="text" data-role="tagsinput" name="{{ $key }}[items]" class="form-control" placeholder="{{ transWord('Items') }}" value="{{ $plan->items }}" required>
                                                </div>


                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">

                                

                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="price">{{transWord('Price')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <input value="{{$plan->price}}" type="number" id="price" class="form-control" name="price" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="has_ai_assistant">{{transWord('Has Ai Assistant')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <select name="has_ai_assistant" id="has_ai_assistant" class="form-control" required>
                                                    <option value="1" @if($plan->has_ai_assistant == 0) selected @endif>{{ transWord('Yes') }}</option>
                                                    <option value="0" @if($plan->has_ai_assistant == 1) selected @endif>{{ transWord('No') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="upload_video">{{transWord('Can Upload Videos')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <select name="upload_video" id="upload_video" class="form-control" required>
                                                    <option value="1" @if($plan->upload_video == 0) selected @endif>{{ transWord('Yes') }}</option>
                                                    <option value="0" @if($plan->upload_video == 1) selected @endif>{{ transWord('No') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="channels_count">{{transWord('No. Channels')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <input type="number" id="channels_count" value="{{ $plan->channels_count }}" class="form-control" name="channels_count" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="posts_count">{{transWord('No. Of Posts')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <input type="number" id="posts_count" value="{{ $plan->posts_count }}" class="form-control" name="posts_count" required>
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
<script src="{{ setPublic() }}dashboard/assets/js/taginput.js"></script>
@endsection

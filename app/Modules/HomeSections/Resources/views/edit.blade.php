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

                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <th>#</th>
                                <th>{{ transWord('Image') }}</th>
                                <th>{{ transWord('Actions') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($home_section->gallery as $index => $image)
                                    <tr>
                                        <td>{{ ($index+1) }}</td>
                                        <td><img src="{{ asset($image->image) }}" class="img-thumbnail" style="width:100px;"></td>
                                        <td><a href="{{ route('delete_gallery_home_sections',['gallery'=>$image]) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('update_home_sections' , ['home_section' => $home_section])}}" method="post" enctype="multipart/form-data">
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
                                                    <input value="{{$home_section->translate($key)->name}}" id="name" type="text" name="{{ $key }}[name]" class="form-control" placeholder="{{ transWord('Title') }}" required>
                                                </div>
                                                
                                                <div class="form-group mt-3 col-md-12">
                                                    <label for="name">{{ transWord('Sub Title') }} - {{ $lang }}</label>
                                                    <input value="{{$home_section->translate($key)->sub_title}}" id="sub_title" type="text" name="{{ $key }}[sub_title]" class="form-control" placeholder="{{ transWord('Sub Title') }}" required>
                                                </div>

                                                <div class="form-group mt-3 col-md-12">
                                                    <label for="content"> {{transWord('Content')}} - {{$lang}}</label>
                                                    <textarea id="content" rows="5" name="{{ $key }}[content]" class="form-control" placeholder="{{ transWord('content') }}" required>{{$home_section->translate($key)->content}}</textarea>
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
                                                <input type="text" value="{{ $home_section->btn_text }}" class="form-control" name="btn_text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="order_no">{{transWord('Button URL')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <input type="url" value="{{ $home_section->btn_url }}" class="form-control" name="btn_url">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="order_no">{{transWord('Order Number')}}</label>
                                            <div class="mt-4 mt-lg-0">
                                                <input type="number" step="1" min="0" value="{{ $home_section->order_no }}" id="order_no" class="form-control" name="order_no">
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

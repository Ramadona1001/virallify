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
    <div class="card card-primary">
        <div class="card-header bg-white">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ $settings ? route('update_mainsettings',['mainSetting'=>$settings]) : route('save_mainsettings') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="{{ $key }}[name]" value="{{ $settings->name ?  $settings->translate($key)->name : "" }}" class="form-control" placeholder="{{ transWord('Name') }}" required>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row mb-3 mt-3">
                    <div class="col-6">
                        @if($settings->logo)
                            <img alt="" src="{{ asset($settings->logo) }}"  style="width:200px;display:block;background:#252b3b;padding: 10px;border-radius: 10px;">
                        @endif
                        <label for="logo">{{ transWord('Logo') }}</label>
                        <input type="file" name="logo" id="logo" class="form-control" accept="image/*" >
                    </div>
                    <div class="col-6">
                        @if($settings->favicon)
                        <img alt="" src="{{ asset($settings->favicon) }}"  style="width:200px;display:block;background:#252b3b;padding: 10px;border-radius: 10px;">
                        @endif
                        <label for="favicon">{{ transWord('Fav Icon') }}</label>
                        <input type="file" name="favicon" id="favicon" class="form-control" accept="image/*" >
                    </div>
                </div>


                <div class="row mb-3 mt-3">
                    <div class="col-6">
                        <label for="email">{{ transWord('Email') }}</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $settings->email ? $settings->email : "" }}" required>
                    </div>
                    <div class="col-6">
                        <label for="mobile">{{ transWord('Mobile') }}</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $settings->mobile ? $settings->mobile : "" }}" required>
                    </div>
                </div>

            </div>
                <div class="modal-footer">
                    <input type="submit" value="{{ transWord('Save') }}" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var languages = [];

        <?php foreach(getLang() as $key => $val){ ?>
        languages.push('<?php echo $val; ?>');
        <?php } ?>

        var i = 0;
        for (i; i < languages.length; i++) {
            CKEDITOR.replace( 'content['+languages[i]+']', {
                height: 300,
            });
        }

    </script>
@endsection

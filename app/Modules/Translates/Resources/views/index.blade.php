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

    <div class="col-lg-12">
        <div class="card card-bordered card-full">
            <div class="card-header">
                {{ $title }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <form action="{{ route('save_language_settings') }}" method="post">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">{{ transWord('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control" required placeholder="like English">
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label for="code">{{ transWord('Code') }}</label>
                                    <input type="text" name="code" id="code" class="form-control" required placeholder="like en">
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label for="direction">{{ transWord('Direction') }}</label>
                                    <select name="direction" id="direction" class="form-control" required>
                                        <option value="ltr">LTR</option>
                                        <option value="rtl">RTL</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" value="{{ transWord('Submit') }}" class="btn btn-primary mt-3">
                        </form>
                    </div>

                    <div class="col-7">
                        <h5>{{ transWord('Languages') }}</h5>
                        <table class="table table-bordered">
                            <thead>
                                <th>{{ transWord('Name') }}</th>
                                <th>{{ transWord('Code') }}</th>
                                <th>{{ transWord('Direction') }}</th>
                                <th>{{ transWord('Actions') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($languages as $lang)
                                    <tr>
                                        <td>{{ $lang->name }}</td>
                                        <td>{{ $lang->code }}</td>
                                        <td>{{ $lang->direction }}</td>
                                        <td>
                                            <a href="{{ route('langs',['key'=>$lang->code]) }}" class="btn btn-primary btn-sm">{{ transWord('Translate') }}</a>
                                            @if ($lang->code != 'en')
                                                <a href="{{ route('delete_language_settings',$lang->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm">{{ transWord('Delete') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
@endsection

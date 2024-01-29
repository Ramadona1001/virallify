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
                    <strong class="card-title">{{transWord('Contact Messages')}}</strong>

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
                                        <th>{{transWord('Name')}}</th>
                                        <th>{{transWord('Email')}}</th>
                                        <th>{{transWord('Subject')}}</th>
                                        <th>{{transWord('Message')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $index => $contact)
                                        <tr  class="unitRow_{{$contact->id}}">
                                            <td>{{$index + 1}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->subject}}</td>
                                            <td>{{$contact->message}}</td>
                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >

                                                    <li>
                                                        <a onclick="return confirm('Are you sure ?')" href="{{route('delete_contact_messages',['contact' => $contact] )}}" class="text-danger sa-delete"  title="Delete" data-original-title="Delete">
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


    <div class="modal fade" id="ourTeamModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">New Team Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_our_team')}}" method="post" enctype="multipart/form-data">
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
                                            <label>{{ transWord('Name') }} - {{ $lang }}</label>
                                            <input  type="text" name="{{ $key }}[name]" class="form-control" placeholder="{{ transWord('Name') }}" required>
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label for=""> {{transWord('Position')}} - {{$lang}}</label>
                                            <input name="{{$key}}[position]"
                                                   class="form-control" placeholder=""
                                                   id="">
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
                                        <div>Click Or Drag Here</div>
                                        <input name="avatar" type="file" id="imageUpload"/>
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
                                    <label class="col-md-12 col-form-label">Status </label>
                                    <div class="col-md-12">
                                        <div class="mt-4 mt-lg-0">
                                            <select class="form-control" name="status">
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

                            <div class="col d-md-flex align-items-end justify-content-end">
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->








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

@extends('dashboard.layouts.app')

@section('title',$title)

@section('styles')
    <style>
        .modal-dialog-scrollable {
            height: auto !important;
        }
    </style>
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
                    <strong class="card-title">{{transWord('Plans ')}}</strong>

                    <div style="text-align: end" class="add_btn">
                        <a id="" class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#plansModal">
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
                                        <th>{{transWord('Name')}}</th>
                                        <th>{{transWord('Content')}}</th>
                                        <th>{{transWord('Items')}}</th>
                                        <th>{{transWord('Price')}}</th>
                                        <th>{{transWord('Has AI')}}</th>
                                        <th>{{transWord('Can Upload Video')}}</th>
                                        <th>{{transWord('No. Channels')}}</th>
                                        <th>{{transWord('No. Posts')}}</th>
                                        <th>{{transWord('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $index => $plan)
                                        <tr  class="row_{{$plan->id}}">
                                            <td>{{$index + 1}}</td>

                                            <td>
                                              {{$plan->translate()->name}}
                                            </td>

                                            <td>
                                                {{ Str::substr($plan->translate()->content, 0,50).' ...' }}
                                            </td>

                                            <td style="display: grid;">
                                                @if (str_contains($plan->items, ','))
                                                    @foreach (explode(',',$plan->items) as $item)
                                                        <p class="badge badge-primary">{{ $item }}</p>
                                                    @endforeach
                                                @else
                                                    <p class="badge badge-primary">{{ $plan->items }}</p>
                                                @endif
                                            </td>

                                            <td>
                                                {{$plan->price}}
                                            </td>

                                            <td>
                                                @if ($plan->has_ai_assistant == 0)
                                                    <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                                                @else
                                                    <span class="badge badge-success"><i class="fa fa-check"></i></span>    
                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if ($plan->upload_video == 0)
                                                    <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                                                @else
                                                    <span class="badge badge-success"><i class="fa fa-check"></i></span>    
                                                @endif
                                            </td>

                                            <td>{{ $plan->channels_count }}</td>
                                            <td>{{ $plan->posts_count }}</td>



                                            <td>
                                                <ul style="max-width: 50px" class="dtr-details" >
                                                    <li>
                                                        <a href="{{route('edit_plans',['plan' => $plan])}}"
                                                           class="text-info"
                                                           title="Edit"
                                                           data-original-title="Edit">
                                                            <i class="mdi mdi-pencil font-size-14"></i>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                    <li>
                                                        <a onclick="return confirm('{{ transWord('Are You Sure?') }}')"  href="{{route('delete_plans',['plan' => $plan] )}}" class="text-danger sa-delete"  title="Delete" data-original-title="Delete">
                                                            <i class="mdi mdi-trash-can font-size-14"></i>
                                                        </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a id="" class="btn btn-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#usersModalPlan{{ $plan->id }}" title="{{transWord('Assign Users')}}">
                                                            <i class="fas fa-plus"></i>
                                                            <i class="fas fa-users"></i>
                                                        </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a class="btn btn-primary btn-sm" href="{{ route('show_users_plans',['plan'=>$plan]) }}" title="{{ transWord('Assigned Users') }}">
                                                            <i class="fas fa-users"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="usersModalPlan{{ $plan->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{ transWord('Users') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body p-3">
                                                        <form action="{{route('store_users_plans')}}" method="post">
                                                            @csrf

                                                            @php
                                                                $users_plans = \Plans\Models\UserPlan::where('plan_id',$plan->id)->pluck('user_id')->toArray();
                                                            @endphp
                                                            <input type="hidden" name="plan" value="{{ $plan->id }}">
                                                            @foreach ($users as $user)
                                                                @if(!in_array($user->id,$users_plans))
                                                                    <input type="checkbox" name="users[]" id="user_{{ $user->id }}" value="{{ $user->id }}">
                                                                    <label for="user_{{ $user->id }}">{{ transWord('Name').' : '.$user->name.' || '.transWord('Mobile').' : '.$user->mobile_number }}</label>
                                                                    <br>
                                                                @endif
                                                            @endforeach

                                                            <div class="modal-footer">
                                                                <button id="closeBtn" type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

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


    <div class="modal fade" id="plansModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">{{ transWord('New Plan') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-3">
                    <form action="{{route('store_plans')}}" method="post">
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

                                        <div class="form-group mt-3 col-md-12">
                                            <label for="content"> {{transWord('Content')}} - {{$lang}}</label>
                                            <textarea id="content" rows="5" name="{{ $key }}[content]" class="form-control" placeholder="{{ transWord('content') }}" required></textarea>
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label>{{ transWord('Items') }} - {{ $lang }}</label>
                                            <input type="text" data-role="tagsinput" name="{{ $key }}[items]" class="form-control" placeholder="{{ transWord('Items') }}" required>
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
                                        <input type="number" id="price" class="form-control" name="price" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="has_ai_assistant">{{transWord('Has Ai Assistant')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <select name="has_ai_assistant" id="has_ai_assistant" class="form-control" required>
                                            <option value="1">{{ transWord('Yes') }}</option>
                                            <option value="0">{{ transWord('No') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="upload_video">{{transWord('Can Upload Videos')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <select name="upload_video" id="upload_video" class="form-control" required>
                                            <option value="1">{{ transWord('Yes') }}</option>
                                            <option value="0">{{ transWord('No') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="channels_count">{{transWord('No. Channels')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="number" id="channels_count" class="form-control" name="channels_count" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="posts_count">{{transWord('No. Of Posts')}}</label>
                                    <div class="mt-4 mt-lg-0">
                                        <input type="number" id="posts_count" class="form-control" name="posts_count" required>
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








@endsection

@section('scripts')
<script src="{{ setPublic() }}dashboard/assets/js/taginput.js"></script>
@endsection

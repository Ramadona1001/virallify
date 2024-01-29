@extends('dashboard.layouts.app')

@section('title',transWord('Assign Permissions').' - '.$role->name)

@section('breadcrumb')
    @foreach ($pages as $page)
        <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ $page[1] }}">{{ $page[0] }}</a>
        </li>
    @endforeach
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{ $title }}</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($permissions as $permission)
            <div class="col-3">
                @if (in_array($permission->id,$assignedPermissions))
                    <label><input class="permissionCheck" value="{{ $permission->id }}" type="checkbox" checked><span>&nbsp;{{ transWord(ucwords(str_replace('_',' ',$permission->name))) }}</span></label>
                @else
                    <label><input class="permissionCheck" value="{{ $permission->id }}" type="checkbox"><span>&nbsp;{{ transWord(ucwords(str_replace('_',' ',$permission->name))) }}</span></label>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')


<script>
    $(function() {
        // (Optional) Active an item if it has the class "is-active"
        $(".accordion2 > .accordion-item.is-active").children(".accordion-panel").slideDown();

        $(".accordion2 > .accordion-item").click(function() {
            // Cancel the siblings
            $(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
            // Toggle the item
            $(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
        });
    });

    $(document).ready(function(){
        var checkedVals = null;
        var allPermissionsCheck = [];
        var checkedVals = $('.permissionCheck:checkbox:checked').map(function() {
                allPermissionsCheck.push(this.value);
            }).get();

        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                if (!allPermissionsCheck.includes($(this).val())) {
                    allPermissionsCheck.push($(this).val());
                }
            }
            else if($(this).prop("checked") == false){
                var index = allPermissionsCheck.indexOf($(this).val());
                if (index !== -1) allPermissionsCheck.splice(index, 1);
            }
            var roleId = '{{ $role->id }}';
            var assignPermissionUrl = '{{ route("assign_permissions_roles",["id"=>"#id"]) }}';
            assignPermissionUrl = assignPermissionUrl.replace('#id',roleId);

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            jQuery.ajax({
                url: assignPermissionUrl,
                method: 'get',
                data: {
                    permissions: allPermissionsCheck,
                    role_id:roleId
                },
                success: function(result){
                    Command: toastr["success"]("Task Done", "Success")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                },

                fail: function (result) {
                    Command: toastr["error"]("done", "Failed")

                    toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                }
            });
        });

    });


</script>
@endsection

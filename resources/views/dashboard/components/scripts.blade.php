<script src="{{ asset('dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
{{-- <script src="{{ asset('dashboard/assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
<script src="{{ asset('dashboard/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>


{{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>


<script src="{{ asset('dashboard/assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/intlTelInput.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

<script>
    let editors = document.querySelectorAll('.editor');
    editors.forEach((editor) =>{
        editor.style.minHeight = "200px";
        ClassicEditor
            .create(editor)
            .catch( error => {
                console.error( error );
            } );
    })

</script>
<script>



$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf','print', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );



const inputs = document.querySelectorAll(".telephone");
if (inputs.length) {
    inputs.forEach((input) =>{
        if (typeof intlTelInput !== 'undefined') {
            const iti = window.intlTelInput(input, {
                preferredCountries: ["kw" , "bh" ,"sa" ,"qa" , "ae"],
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
                nationalMode: false,
                autoPlaceholder: 'aggressive'
            });
            input.addEventListener('countrychange', () => {
                let countryData = iti.getSelectedCountryData();
                console.log(countryData.dialCode);
                input.value = countryData.dialCode ;
            });
        }
    });
}






</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>





@if (Session::has('success'))
    <script>
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
    </script>
@endif

@if (Session::has('fail'))
    <script>
        Command: toastr["error"]("Process is Failed", "Failed")

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
    </script>
@endif



@yield('scripts')

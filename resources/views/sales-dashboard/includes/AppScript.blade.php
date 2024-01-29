<!-- importing scripts -->
<script src="{{asset('sales-dashboard/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('sales-dashboard/assets/js/popper.min.js')}}"></script>
<script src="{{asset('sales-dashboard/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('sales-dashboard/assets/js/app.js')}}"></script>
<script src="{{ asset('sales-dashboard/assets/js/intlTelInput.js') }}"></script>

<script>
    var inputs = document.querySelectorAll(".telephone ");
    inputs.forEach((input) =>{
        window.intlTelInput(input,({
            // options here
        }));
    })
</script>

@yield('scripts')

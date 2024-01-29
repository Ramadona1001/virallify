@extends('sales-dashboard.layouts.auth')

@section('title',transWord('Sign In'))

@section('styles')
@endsection

@section('content')




    <main class="auth_layout_wrapper">
        <div class="form_wrapper">
            <a href=""> <img src="{{asset('sales-dashboard/assets/images/login-logo.svg')}}" alt="logo"> </a>
            <h4 class="main_title">Welcome</h4>
            <p class="main_desc">Sign In to Your Account</p>

            <form action="{{route('employee.handleLogin')}}" method="post">
                @csrf

                @include('sales-dashboard.includes.errors')


                <div class="form-group">
                    <label for="username" class="form-label">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="username" name="email" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- end::form-group -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                               <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- end::form-group -->
                <div class="form-group submit_wrapper">
                    <button type="submit" class="btn btn-default">Sign In</button>
                </div>
                <!-- end::form-group -->
            </form>
        </div>
        <!-- end::form_wrapper -->
        <div class="img_wrapper">
            <h4 class="title">Elite Homes</h4>
            <p class="desc">Lorem ipsum dolor sit amet consectetur. Luctus metus risus lectus tellus non. Quam sollicitudin molestie vestibulum sit eget pretium. Enim est tortor pellentesque turpis ut habitant sem auctor quis. Lacinia nibh congue leo in. Magnis vivamus laoreet mauris tortor fermentum euismod sem nullam gravida. Senectus risus velit arcu facilisi sed leo non. Risus hac massa eu eu sapien dis quis. Sed elementum nunc elementum sagittis purus tempus mus in. Ut tortor sit facilisis dignissim lorem felis rutrum.</p>
        </div>
        <!-- end::img_wrapper -->
    </main>








@endsection

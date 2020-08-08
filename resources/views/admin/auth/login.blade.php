@extends('admin.layouts.app')

@section('content')
    <section class="ls section_padding_top_100 section_padding_bottom_100 section_full_height">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 to_animate">
                    <div class="with_border with_padding">
                        <h4 class="text-center">
                            Sign In to Your Account
                        </h4>
                        <hr class="bottommargin_30">
                        <div class="wrap-forms">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group has-placeholder">
                                            <label for="email">Email address</label>
                                            <i class="grey fa fa-envelope-o"></i>
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group has-placeholder">
                                            <label for="password">Password</label>
                                            <i class="grey fa fa-pencil-square-o"></i>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="checkbox">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember_me_checkbox">Rememrber Me</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="theme_button block_button color1">Log In</button>
                            </form>
                        </div>
                        <div class="darklinks text-center topmargin_20">
                            <a role="button" data-toggle="collapse" href="#signin-resend-password" aria-expanded="false" aria-controls="signin-resend-password">Forgot your password?</a>
                        </div>
                        <div class="collapse form-inline-button" id="signin-resend-password">
                            <form class="form-inline topmargin_20">
                                <div class="form-group">
                                    <label class="sr-only">Enter your e-mail</label>
                                    <input type="email" class="form-control" placeholder="E-mail">
                                </div>
                                <button type="submit" class="theme_button with_icon">
                                    <i class="fa fa-share"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- .with_border -->
                    <p class="divider_20 text-center">Not registered? <a href="admin_signup.html">Create an account</a>.<br>or go <a href="./">Home</a></p>
                </div>
                <!-- .col-* -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
@endsection

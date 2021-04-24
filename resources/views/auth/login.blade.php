<!doctype html>
<html lang="en" dir="ltr">
  <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="" name="description">
        <meta content="" name="author">
        <meta name="keywords" content=""  />

        <!--favicon -->
        <!-- Favicon and touch icons  -->
        <link rel="shortcut icon" href="{{ asset('assets/assets/icon/favicon.png') }}">
        <!-- TITLE -->
        <title>Students Management</title>

        <!-- DASHBOARD CSS -->
        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/back-end/css/style-modes.css') }}" rel="stylesheet"/>

        

    </head>

    <body>

        <!-- BACKGROUND-IMAGE -->
        <div class="login-img">

            <!-- GLOABAL LOADER -->
            <div id="global-loader">
                <img src="{{ asset('assets/back-end/images/svgs/loader.svg') }}" class="loader-img" alt="Loader">
            </div>

            <div class="page">
                <div class="">
                    <!-- CONTAINER OPEN -->
                    <div class="col col-login mx-auto">
                        <div class="text-center">
                            <img src="{{ asset('assets/assets/img/logo.png') }}" class="header-brand-img" alt="">
                        </div>
                    </div>
                    <div class="container-login100">
                        <div class="wrap-login100 p-6">
                            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <span class="login100-form-title">
                                    Member Login
                                </span>
                                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                    <input class="input100" type="text" name="email" placeholder="Email">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                    <input class="input100" type="password" name="password" placeholder="Password">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="text-right pt-1">
                                    <p class="mb-0"><a href="forgot-password.html" class="text-primary ml-1">Forgot Password?</a></p>
                                </div>
                                <div class="container-login100-form-btn">
                                    <input type="submit" class="login100-form-btn btn-primary" value="Login">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
        </div>
        <!-- BACKGROUND-IMAGE CLOSED -->

     

    </body>
</html>

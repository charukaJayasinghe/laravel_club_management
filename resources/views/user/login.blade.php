@extends('layouts.userDoor')
@section('content')
<body class="vh-100">
    <div class="container-fluid">
        <div class="row " style="background-color: #fff;">
            <div class="col-6 my-auto  align-items-center back d-none d-lg-block ">

            </div>
            <div class="col-lg-6 col-12 ">
                <div class="row vh-100" style="background-color: #C01528;">
                    <div class="col-12 text-center my-auto">
                        <!-- log in -->
                        <div class="row ">

                            <div class="col-12">
                                <div class="log ">

                                </div>
                                <span class="display-3 text-white ">Log In</span>
                            </div>
                            <div class="col-12 pt-4">
                                <div class="row d-flex  justify-content-center flex-row">
                                    <div class="col-4 col-lg-3">
                                        <span class="text-white fs-5">Email :</span>
                                    </div>
                                    <div class="d-block col-8">
                                        <input id="email" type="text" class="form-control" placeholder="Your Email Address">
                                    </div>

                                </div>



                            </div>
                            <div class="col-12 pt-4">
                                <div class="row d-flex  justify-content-center  flex-row">
                                    <div class="col-4 col-lg-3">
                                        <span class="text-white fs-5 ">Password :</span>
                                    </div>
                                    <div class="d-block col-8">
                                        <input id="password" type="password" class="form-control" placeholder="Your Password">
                                        <span style="display: block;text-align: right;" class="text-info">Fogot Password?</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-8 col-lg-6 offset-2 offset-lg-3 pt-4 d-grid">
                                <button class="btn fs-4" onclick="login();" style="background-color:#68E1FD ;">Log In</button>
                                <span class="text-white mx-auto pt-2" onclick="directToRegister();" style="cursor:pointer;">Don't Have an Account?</span>
                            </div>


                        </div>
                        <!-- log in -->
                        <!-- fogotpassword -->
                        <div class="row d-none">
                            <div class="col-12">
                                <div class="log ">

                                </div>
                                <span class="display-3 text-white ">Reset Password</span>
                                <p class="py-3 fs-5 text-justify text-white">Enter your email address that you used to register. We'll email you with a link to reset your password.</p>
                            </div>
                            <div class="col-11 pt-4">
                                <div class="row d-flex  justify-content-center flex-row">
                                    <div class="col-4 col-lg-3">
                                        <span class="text-white fs-5">Email :</span>
                                    </div>
                                    <div class="d-block col-8">
                                        <input id="resetemail" type="text" class="form-control" placeholder="Your Email Address">
                                    </div>

                                </div>



                            </div>
                            <div class="col-8 col-lg-6 offset-2 offset-lg-3 pt-5 d-grid ">
                                <button class="btn fs-5" onclick="resetPassword();" style="background-color:#68E1FD ;">Send Password Reset Link</button>
                                <span class="text-white mx-auto pt-2" onclick="directToRegister();" style="cursor:pointer;">Back To Log In</span>

                            </div>
                        </div>
                        <!-- fogotpassword -->
                    </div>
                </div>
            </div>



        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function directToRegister(){
            window.location = "{{ route('signup') }}";
        }
    </script>
    <script src="{{ asset('js/script2.js') }}"></script>

</body>
@endsection
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

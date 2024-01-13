<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <link rel="icon" href="{{ asset('images/LCNC.png') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>NC - LEO Club</title>
    </head>
    <body style="background: repeating-linear-gradient(90deg,#355C7D 0%,#6C5B7B 50%,#C06C84 100%);">
        <div class="container">
            <div class="" style="margin-top: 50px;">


                <div class="login__form">
                    <div>
                        <img src=" {{ asset('images/LCNC.png') }} " style="height: 15rem;background-position: center;display: block;margin-left: auto;margin-right:auto;" alt="">
                        <h1 class="login__title">
                            <span>Welcome</span> to NC LEO Club
                        </h1>
                        <p class="login__description">
                            Please login to continue.
                        </p>
                    </div>

                    <div>
                        <div class="login__inputs">
                            <div>
                                <label for=""  class="login__label">Email</label>
                                <input id="email"  type="email" placeholder="Enter your email address" required class="login__input">
                            </div>

                            <div>
                                <label for="" class="login__label">Password</label>

                                <div class="login__box">
                                    <input id="password" type="password" placeholder="Enter your password" required class="login__input" >
                                    <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                                </div>
                            </div>
                        </div>

                        <div class="login__check">
                            <input type="checkbox" class="login__check-input">
                            <label for="" class="login__check-label">Remember me</label>
                        </div>
                    </div>

                    <div>
                        <div class="login__buttons">
                            <button class="login__button" onclick="login();" >Log In</button>
                            <button onclick="directToRegister();"  class="login__button login__button-ghost">Sign Up</button>
                        </div>

                        <a href="{{ route('fogotPassword') }}" class="login__forgot">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>


        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('js/login.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            function directToRegister(){
                window.location = "{{ route('signup') }}";
            }
        </script>
        <script src="{{ asset('js/script2.js') }}"></script>
    </body>
</html>

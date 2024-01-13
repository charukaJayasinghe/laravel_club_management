<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/LCNC.png') }}">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
        <title>NC - LEO Club</title>
    </head>
    <body style="background: repeating-linear-gradient(90deg,#355C7D 0%,#6C5B7B 50%,#C06C84 100%);">
        <div class="container">
            <div class="" style="margin-top: 50px;">


                <div class="login__form">
                    <div>
                        <img src=" {{ asset('images/LCNC.png') }} " style="height: 15rem;background-position: center;display: block;margin-left: auto;margin-right:auto;" alt="">
                        <h1 class="login__title" style="text-align: center;">
                            Fogot Password
                        </h1>
                        <p class="login__description">
                            Please Enter Your Email.
                        </p>
                    </div>

                    <div>
                        <div class="login__inputs">
                            <div>
                                <label   class="login__label">Email</label>
                                <input id="email"  type="email" placeholder="Enter your email address" required class="login__input">
                            </div>


                        </div>


                    </div>

                    <div>
                        <div class="login__buttons">
                            <button class="login__button" id="sendBtn" onclick="sendVerificationCode();" >Send Code</button>
                            <button onclick="directToLogin();"  class="login__button login__button-ghost">Go Back</button>
                        </div>


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

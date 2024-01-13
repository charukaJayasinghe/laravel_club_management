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

<body  style="background: repeating-linear-gradient(90deg,#355C7D 0%,#6C5B7B 50%,#C06C84 100%);">
    <div class="container">
        <div class="" style="margin-top: 50px;">


            <div class="login__form">
                <div>
                    <img src=" {{ asset('images/LCNC.png') }} "
                        style="height: 15rem;background-position: center;display: block;margin-left: auto;margin-right:auto;"
                        alt="">
                    <h1 class="login__title" style="text-align: center;">
                        Fogot Password
                    </h1>
                    <p class="login__description">
                        Enter your verification code that was sent to your email.
                    </p>
                </div>

                <div>
                    <div class="login__inputs" style="display: flex;gap: 5px;">
                        <div>

                            <input id="number1" type="text" placeholder="__"
                                style="font-size: 20px;text-align: center;" class="login__input">
                        </div>
                        <div>

                            <input id="number2" type="text" placeholder="__"
                                style="font-size: 20px;text-align: center;" class="login__input">
                        </div>
                        <div>

                            <input id="number3" type="text" placeholder="__"
                                style="font-size: 20px;text-align: center;" class="login__input">
                        </div>
                        <div>

                            <input id="number4" type="text" placeholder="__"
                                style="font-size: 20px;text-align: center;" class="login__input">
                        </div>
                        <div>

                            <input id="number5" type="text" placeholder="__"
                                style="font-size: 20px;text-align: center;" class="login__input">
                        </div>
                        <div>

                            <input id="number6" type="text" placeholder="__"
                                style="font-size: 20px;text-align: center;" class="login__input">
                        </div>





                    </div>


                </div>

                <div>
                    <div class="login__buttons">
                        <button class="login__button" id="verifyBtn" onclick="verifyUser();">Verify</button>
                        <button onclick="directToLogin();" class="login__button login__button-ghost">Cancel</button>
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
         document.addEventListener("DOMContentLoaded", function() {
            const inputField = document.getElementById("number1");
            if (inputField) {
                inputField.focus();
            }
        });
        function directToRegister() {
            window.location = "{{ route('signup') }}";
        }

        const pins = document.querySelectorAll('input[type="text"]');

        pins.forEach((pin, index) => {
            pin.addEventListener("input", function() {
                if (this.value.length === 1) {
                    if (index < pins.length - 1) {
                        pins[index + 1].focus();
                    }
                } else if (this.value.length === 0) {
                    if (index > 0) {
                        pins[index - 1].focus();
                    }
                }
                // Clear the input if more than one digit is entered
                if (this.value.length > 1) {
                    this.value = this.value.slice(0, 1);
                }
            });

            pin.addEventListener("keydown", function(event) {
                if (event.key === "Backspace" && this.value.length === 0) {
                    if (index > 0) {
                        pins[index - 1].focus();
                    }
                } else if (event.key === "ArrowLeft" && index > 0) {
                    pins[index - 1].focus();
                } else if (event.key === "ArrowRight" && index < pins.length - 1) {
                    pins[index + 1].focus();
                }
            });
        });

    </script>
    <script src="{{ asset('js/script2.js') }}"></script>
</body>

</html>

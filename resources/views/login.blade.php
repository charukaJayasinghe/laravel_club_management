<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/LCNC.png') }}">
    <title>NCSS Admin | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<style>
    .background {
        background-image: url("{{ asset('images/LCNC.png') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        height: 500px;
    }
</style>

<body style="background-color: #74EBD5;background-image: repeating-linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);"  class=" d-flex justify-content-center align-items-center">
    <div class="container-fluid vh-100 justify-content-center d-flex  " >
        <div class="row align-content-center ">

            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <p class="text-center display-4">Hi, Welcome to LCNC Admins</p>
                    </div>
                </div>
            </div>

            <div class="col-12 p-5">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background"></div>
                    <div class="col-12 col-lg-6 d-block">
                        <div class="row g-3">

                            <div class="col-12">
                                <p class="fs-1">Sign in to your acoount.</p>
                            </div>

                            <div class="col-12 ">
                                <label class="form-label fs-2">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                            <div class="col-12 ">
                                <label class="form-label fs-2 ">Pasword</label>
                                <input type="password" id="pswd" class="form-control">
                            </div>

                            <div class="col-12 col-lg-12 g-2 pt-4 ">
                              <div class="row ">
                                <div class="col-lg-6 col-12 ">
                                    <button class="btn btn-primary w-100 py-2 fs-4" onclick="adminLogin();">Login to Admin Pannel</button>

                                </div>
                                <div class="col-lg-6 col-12 pt-lg-0 pt-3">
                                   <a href="/login"><button class="btn btn-danger w-100 py-2 fs-4">Back to User Login</button></a>
                                </div>
                              </div>
                            </div>

                            <div class="col-12 text-center d-none d-lg-block fixed-bottom ">
                                <p class="fs-bold text-black-50">&copy;2023 LaxonSoftwareSolution.com All rights Reserved</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>

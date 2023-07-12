@extends('layouts.userDoor')
@section('content')
<body style="background-color: #E9E8E8;">
    <div class="container-fluid ">

        <div class="row  mt-5">
            <div class="col-lg-8 col-10 offset-lg-2  offset-1 rounded-2 " style="background-color:  #DC3535;">
                <div class="row">
                    <div class="col-12">
                        <h1 class='display-4 text-white text-center'>Signup at NC Science</h1>
                        <p class="text-center text-white mt-5 fs-5">Signup to get the latest updates on Science</p>
                        <div class="row mb-3 mt-5 px-3">
                            <div class="col-12 mt-3  " style="height: 4px;background-color: white;">

                            </div>
                            <div class="col-12" style="height: 2px;background-color: white;margin-top: 4px;">

                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column-reverse flex-lg-row justify-content-end">
                        <!-- user type nalanda -->
                        <div id="CS"  class=" flex-column col-lg-6 offset-lg-1 col-12 mt-lg-0 mt-5 ">
                            <div class="row">
                                <div class="col-12 ps-lg-0 ps-3">
                                    <span class="fs-3 text-white fw-bold">Personal Info</span>
                                </div>
                                <div class="col-12 col-lg-10 ps-3 pt-3  d-block ">
                                    <div class="infield  mt-4 ">
                                        <input class="w-100" id="fullName" required type="text">
                                        <label>Full Name</label>
                                    </div>
                                    <div class="infield ">
                                        <input class="w-100" id="index" required type="text">
                                        <label>Index Number</label>
                                    </div>

                                    <div class="infield ">
                                        <div class="row">
                                            <div class="col-6">
                                                <select id="grade" class="bg-transparent border-3 py-1  w-100 border-top-0 border-start-0 border-end-0 fs-5 border-white gradeSelector" style="appearance: none;">
                                                    <option>Grade</option>
                                                    @foreach ($grade as $grade )

                                                    <option>{{ $grade->name }}</option>
                                                  @endforeach


                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select id="class" class="bg-transparent border-3 py-1 w-100 fs-5 border-top-0 border-start-0 border-end-0  border-white gradeSelector" style="appearance: none;">
                                                    <option>Class</option>
                                                    @foreach ($class as $class )

                                                    <option>{{ $class->name }}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="infield"  >
                                        <input class="w-100" id="email" required type="text">
                                        <label>Email Address</label>
                                    </div>
                                    <div class="infield"  >
                                        <input class="w-100" id="address" required type="text">
                                        <label>Address</label>
                                    </div>
                                    <div class="infield " >
                                        <input class="w-100"  id="mobile" required type="text">
                                        <label>Whatsapp Number</label>
                                    </div>
                                    <div class="infield " >
                                        <input class="w-100" id="password" required type="password">
                                        <label>Password</label>
                                    </div>
                                    <div class="infield " >
                                        <input class="w-100" id="repassword" required type="password">
                                        <label>Re-type Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- user type nalanda -->
                        <!-- user type other -->
                        <div id="other" style="display: none;" class=" flex-column col-lg-6 offset-lg-1 col-12 mt-lg-0 mt-5 ">
                            <div class="row">
                                <div class="col-12 ps-lg-0 ps-3">
                                    <span class="fs-3 text-white fw-bold">Personal Info</span>
                                </div>
                                <div class="col-12 col-lg-10 ps-3 pt-3  d-block ">
                                    <div class="infield  mt-4 ">
                                        <input id="ofullname" class="w-100" required type="text">
                                        <label>Full Name</label>
                                    </div>
                                    <div class="infield ">
                                        <input id="oschool" class="w-100" required type="text">
                                        <label>School Name</label>
                                    </div>
                                    <div class="infield ">
                                        <div class="row">
                                            <div class="col-12">
                                                <select id="ograde" class="bg-transparent border-3 py-1  w-100 border-top-0 border-start-0 border-end-0 fs-5 border-white gradeSelector" style="appearance: none;">
                                                    <option>Grade</option>




                                                </select>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="infield ">
                                        <input id="oemail" class="w-100" required type="text">
                                        <label>Email Address</label>
                                    </div>
                                    <div class="infield ">
                                        <input id="omobile" class="w-100" required type="text">
                                        <label>Whatsapp Number</label>
                                    </div>
                                    <div class="infield ">
                                        <input id="opassword" class="w-100" required type="password">
                                        <label>Password</label>
                                    </div>
                                    <div class="infield ">
                                        <input id="orepassword" class="w-100" required type="password">
                                        <label>Re-type Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- user type other -->
                        <div class="col-lg-5 col-12  ">
                            <div class="row h-100 ">
                                <div class="col-12">
                                    <span class="fs-3 text-white  fw-bold">Select User Type</span>
                                </div>

                                <div  class="col-lg-8 col-10 offset-1 h-75 d-flex align-items-center justify-content-center flex-column  gap-lg-5 gap-4">
                                    <input type="radio" class="d-none"  name="select" id="option-1" checked>
                                    <input type="radio" class="d-none" name="select" id="option-2">
                                    <label id="nbtn" for="option-1" onclick="showNC();"  class="option option-1">
                                        <div id="ndot" class="dot "></div>
                                        <span class="fs-2 ps-lg-4 ps-0"> Nalanda Student</span>
                                    </label>
                                    <label id="obtn"  for="option-2" class="option option-2">
                                        <div id="odot" class="dot rounded-circle"></div>
                                        <span class="fs-2 ps-lg-4 ps-0">Other Student</span>
                                    </label>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6 col-8 offset-2  offset-lg-3 d-grid py-3 ">
                        <button class="btn fs-4" style="background-color:#68E1FD ;" onclick="signup();">Sign Up</button>
                        <span class="text-white pt-2 mx-auto" style="cursor: pointer;" onclick="directToLogin();">Already Have an Account?</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function directToLogin() {
            window.location = "{{ route('Userlogin') }}";
        }
    </script>
    <script src="{{asset("js/script2.js")}}"></script>

</body>
@endsection
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('csrf')

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="icon" href="{{ asset('images/LCNC.png') }}">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LCNC | Admin Dashboard</title>
</head>

<style>
    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-item:hover {
        color: blue;
    }


    .text2 {

        color: var(--text-color);

    }

    .borderOther {
        border-width: 2px;
        border-color: var(--other-border);
    }

    .textOther {

        color: var(--panel-color);

    }

    .backColor {
        background-color: var(--panel-color);

    }

    .back {
        background-color: var(--thead-color);
    }

    .closeButton {
        outline-width: 1px;
        outline-style: solid;
        outline-color: var(--text-color);
        background-color: var(--panel-color);
        color: var(--text-color);
    }

    .buttonBack {
        background-color: var(--btn-back)
    }

    .buttonRed {
        background-color: var(--button-red);
    }

    .buttonBlue {
        background-color: var(--button-blue);
    }

    .buttonYellow {
        background-color: var(--button-yellow);
    }

    .input {

        border: 1px solid var(--border-color);
        background-color: var(--panel-color);

        color: var(--text-color);

        outline: none;
        outline-width: 1px;
        outline-style: solid;
        outline-color: var(--text-color);
    }

    .input:focus {
        background-color: var(--panel-color);

        border: 1px solid var(--border-color);
        background-color: var(--panel-color);

        color: var(--text-color);


    }

    .input::placeholder {
        color: var(--text-color);
    }

    .Trow:hover {
        background-color: var(--Trow-color);
        cursor: pointer;
    }

    .hoverClr {
        background-color: var(--rowselect-color);
        cursor: pointer;
    }

    .userRow>td {
        vertical-align: middle;
    }
</style>

<body onload="checkMobile();">
    <nav style="z-index: 1000;">
        <div class="logo-name ">
            <div class="logo-image d-lg-block d-none">
                <img src="{{ asset('images/LCNC.png') }}" alt="">
            </div>

            <span class="logo_name">LCNC Admin</span>
        </div>

        <div class="menu-items ">
            <ul class="nav-links">
                <li><a href="/dashboard">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>

                <li><a class="nav-link dropdown-toggle p-0" style="color: #707070;" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                            class="fa-solid fa-user"></i><span class="d-lg-block  link-name" id="editText">Users</span>
                    </a>
                    <div class="dropdown-menu position-absolute bg-light shadow-lg" style="z-index: 10000;opacity: 1;"
                        aria-labelledby="navbarDropdown">



                        <a class="dropdown-item" href="{{ route('approveUser') }}">Approve Users</a>
                        <a class="dropdown-item" href="{{ route('manageUser') }}">Manage Users</a>


                    </div>

                </li>

                <li><a href="{{ route('edit', ['type' => 'class']) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="link-name">Edit Class</span>
                    </a>
                </li>
                <li><a class="nav-link dropdown-toggle p-0" style="color: #707070;" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-people-roof"></i>
                         <span class="d-lg-block  link-name" id="editText">Official Board</span>
                    </a>
                    <div class="dropdown-menu position-absolute" style="z-index: 10000;"
                        aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('viewManagePosition') }}">Manage Positions</a>
                        <a class="dropdown-item" href="{{ route('viewAddMember') }}">Add  Member</a>
                        <a class="dropdown-item" href="{{ route('viewManageBoard') }}">Manage Members</a>



                    </div>

                </li>

                <li><a class="nav-link dropdown-toggle p-0" style="color: #707070;" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                            class="fa-brands fa-microblog"></i><span class="d-lg-block  link-name"
                            id="editText">Posts</span>
                    </a>
                    <div class="dropdown-menu position-absolute" style="z-index: 10000;"
                        aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('adminApprovePost') }}">Approve Posts</a>
                        <a class="dropdown-item" href="{{ route('adminManagePost') }}">Manage Posts</a>



                    </div>

                </li>

                <li>
                    <a href="#" class="nav-link dropdown-toggle p-0" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fa-regular fa-newspaper"></i>
                        <span class="link-name">News</span>
                    </a>
                    <div class="dropdown-menu position-absolute" style="z-index: 10000;"
                        aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('viewCreateNews') }}">Create News</a>
                        <a class="dropdown-item" href="{{ route('adminManageNews') }}">Manage News</a>



                    </div>

                </li>
                <li><a class="nav-link dropdown-toggle p-0" style="color: #707070;" href="#"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="fa-regular fa-calendar-days"></i><span
                            class="d-lg-block  link-name" id="editText">Upcoming Events</span>
                    </a>
                    <div class="dropdown-menu position-absolute" style="z-index: 10000;"
                        aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('adminViewCreateEvent') }}">Create Events</a>
                        <a class="dropdown-item" href="{{ route('adminViewManageEvent') }}">Manage Events</a>



                    </div>

                </li>


            </ul>

            <ul class="logout-mode">
                <li><a href="#" onclick="signout();">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="dashboard -2">
        <div class="top " style="z-index: 20">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        @yield('adminDashboard')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    @yield('bmodels')
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>

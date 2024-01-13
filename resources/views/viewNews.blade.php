<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>LCNC | Home</title>
    <meta name="title" content="Nalanda College Science Society">
    <meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/LCNC.png') }}">
    <meta name="description" content="System for post sharing">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/home.css') }}">


</head>

<style>
    .reveal-element {
        opacity: 0;
        transform: translateY(20px);
        /* Optionally, you can add a subtle vertical transition effect */
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .reveal-element.revealed {
        opacity: 1;
        transform: translateY(0);
    }


    .containerForLions {
        flex-direction: column;
    }

    @media (min-width: 576px) {

        .containerForLions {
            flex-direction: column;
        }
    }

    @media (min-width: 992px) {
        .containerForLions {
            flex-direction: row;
        }
    }
</style>

<body id="top" style="overflow-x: hidden;">


    <header class="header" data-header style="padding-right: 50px;">
        <div class="container">

            <a href="#" class="logo">
                <img src="{{ asset('images/LCNC.png') }}" width="119" height="37"
                    style="height: 50px;width:50px ;" alt="Wren logo">
            </a>

            <nav class="navbar" data-navbar style="padding-right: 50px;">

                <div class="navbar-top">
                    <a href="#" class="logo">
                        <img src="{{ asset('images/LCNC.png') }}" width="119" height="37" alt="Wren logo">
                    </a>
                    <span style="padding-left: 20px;">Leo Club of Nalanda College</span>

                    <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                        <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                    </button>
                </div>

                <ul class="navbar-list">

                    <li>
                        <a href="{{ route('home') }}" class="navbar-link hover-1" data-nav-toggler>Home</a>
                    </li>



                    <li>
                        <a href="#featured" class="navbar-link hover-1" data-nav-toggler>Board Of Officials</a>
                    </li>
                    <li>
                        <a href="#news" class="navbar-link hover-1" data-nav-toggler>News</a>
                    </li>
                    <li>
                        <a href="#recent" class="navbar-link hover-1" data-nav-toggler>Recent Post</a>
                    </li>
                    <li>
                        <a href="#contact" class="navbar-link hover-1" data-nav-toggler>Contact</a>
                    </li>


                    <li class="custome-menu">
                        <a href="{{ route('Userlogin') }}" class="navbar-link hover-1 " data-nav-toggler>Log In</a>
                    </li>
                    <li class="custome-menu">
                        <a href="{{ route('signup') }}" class="navbar-link hover-1" data-nav-toggler>Sign Up</a>
                    </li>

                </ul>



                <p class="copyright-text" style="padding-top:20px; ">
                    Copyright 2023 © laxonsolution
                </p>

            </nav>

            <div style="display: flex;">
                <a href="{{ route('Userlogin') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('signup') }}" class="btn btn-primary"
                    style="margin-left: 5px;background-color: blue;">Signup</a>
            </div>

            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>

        </div>
    </header>





    <main>
        <article>

            <!--
        - #HERO
      -->

            <section class="hero reveal-element" id="home" aria-label="home">
                <div class="container">
                    <img src="{{ asset('images/shadow-1.svg') }}" width="500" height="800" alt=""
                        class="hero-bg hero-bg-1">

                    <img src="{{ asset('images/shadow-2.svg') }}" width="500" height="500" alt=""
                        class="hero-bg hero-bg-2">

                </div>
                <div class="container">

                </div>
            </section>
            <section>
                <div class="container" style="padding-bottom: 10rem;">
                    <div class="hero-content reveal-element">



                        <h1 class="headline headline-1 section-title">
                           {{ $news->title }}
                        </h1>
                        <div style="width: 100%;display: flex;padding-top: 2rem;padding-bottom: 2rem;">
                            <img src="{{ asset('storage/'.$news->image) }}" style="width: 100%;" alt="">
                        </div>
                        <p class="footer-text" style="font-size: 2rem;color:#BBE1F3;">
                            <?php echo $description; ?>
                        </p>


                    </div>
                </div>
            </section>
        </article>
    </main>





    <!--
    - #FOOTER
  -->

    <footer>
        <div class="container">

            <div class="card footer">

                <div class="section footer-top">

                    <div class="footer-brand reveal-element">

                        <a  class="logo">
                            <img src="{{ asset('images/LCNC.png') }}" width="119" height="37" loading="lazy"
                                >
                        </a>

                        <p class="footer-text">
                            Nalanda College LEO Club is a dynamic youth organization fostering leadership, service, and
                            social impact. Empowering young leaders to make a positive difference in their community
                            through diverse initiatives and projects.
                        </p>

                        <p class="footer-list-title">Address</p>

                        <address class="footer-text address">
                            WVFG+92X,<br /> Siri Dhamma Mawatha, Colombo 01000
                        </address>

                    </div>

                    <div class="footer-list reveal-element" style="display: flex;flex-direction: column; justify-content: space-around;">

                        <div>
                            <p class="footer-list-title">Quick Links</p>

                            <ul>

                                <li>
                                    <a href="{{ route("home") }}" class="footer-link hover-2">Home</a>
                                </li>

                                <li>
                                    <a href="#featured" class="footer-link hover-2">Board of Officials</a>
                                </li>
                                <li>
                                    <a href="#news" class="footer-link hover-2">News</a>
                                </li>
                                <li>
                                    <a href="#recent" class="footer-link hover-2">Posts</a>
                                </li>



                                <li>
                                    <a href="{{ route('Userlogin') }}" class="footer-link hover-2">Log In</a>
                                </li>

                                <li>
                                    <a href="{{ route('signup') }}" class="footer-link hover-2">Sign Up</a>
                                </li>



                            </ul>
                        </div>
                        <div id="contact">
                            <p class="footer-list-title" >Contact</p>
                            <div>
                                <span class="footer-link ">Vice President : +94779460614</span>
                                <span class="footer-link ">Scretary : +94787415084</span>
                            </div>
                        </div>

                    </div>

                    <div class="footer-list reveal-element">

                        <p class="footer-list-title">Newsletter</p>

                        <p class="footer-text">
                            Sign up to receive the latest stories about the Leo club of Nalanda College.
                        </p>

                        <div class="input-wrapper">
                            <input type="text" id="nameSub" name="name" placeholder="Your name" required
                                class="input-field" autocomplete="off">

                            <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                        </div>

                        <div class="input-wrapper">
                            <input type="email" id="emailSub" name="email_address" placeholder="Emaill address"
                                required class="input-field" autocomplete="off">

                            <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                        </div>

                        <a style="cursor: pointer;" class="btn btn-primary" onclick="subscribe();">
                            <span class="span">Subscribe</span>

                            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                        </a>

                    </div>

                </div>

                <div class="footer-bottom ">

                    <p class="copyright">
                        &copy; Developed by <a  class="copyright-link">Laxon Solutions.</a>
                    </p>

                    <ul class="social-list">

                        <li>
                            <a href="https://web.facebook.com/Nalandaleos/?_rdc=1&_rdr" target="_blank"
                                class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>

                                <span class="span">Facebook</span>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/in/nalanda-college-leo-club-914666273" target="_blank"
                                class="social-link">
                                <ion-icon name="logo-linkedin"></ion-icon>

                                <span class="span">LinkedIn</span>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/nalanda.leo/" target="_blank" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>

                                <span class="span">Instagram</span>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>
    </footer>





    <!--
    - #BACK TO TOP
  -->

    <a href="#top" style="margin-right:50px;" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
    </a>



    <script>
        const revealElements = document.querySelectorAll('.reveal-element');

        function revealOnScroll() {
            for (const element of revealElements) {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight * 0.8) { // Adjust the value as needed for the reveal point
                    element.classList.add('revealed');
                }
            }
        }

        // Attach the scroll event listener
        window.addEventListener('scroll', revealOnScroll);

        // Initial call to reveal elements that are already visible on page load
        revealOnScroll();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--
    - custom js link
  -->
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/home2.js') }}"></script>
    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>

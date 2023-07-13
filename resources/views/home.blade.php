<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>NCSS | Home</title>
  <meta name="title" content="Nalanda College Science Society">
  <meta name="description" content="System for post sharing">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">


  <link rel="stylesheet" href="{{ asset('css/home.css') }}">


</head>

<body id="top">


  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="{{ asset('images/logo.jpeg') }}" width="119" height="37" style="height: 50px;width:50px ;" alt="Wren logo">
      </a>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <a href="#" class="logo">
            <img src="{{asset('images/logo.jpeg')}}" width="119" height="37" alt="Wren logo">
          </a>

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
            <a href="#recent" class="navbar-link hover-1" data-nav-toggler>Recent Post</a>
          </li>

          <li>
            <a href="#" class="navbar-link hover-1" data-nav-toggler>Contact</a>
          </li>

        </ul>

        <div class="navbar-bottom">

          <div class="profile-card">
            <img src="#" width="48" height="48" alt="Steven" class="profile-banner">

            <div>
              <p class="card-title">Hello Steven !</p>

              <p class="card-subtitle">
                You have 3 new messages
              </p>
            </div>
          </div>

          <ul class="link-list">

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Profile</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Articles Saved</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Add New Post</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">My Likes</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Account Setting</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Sign Out</a>
            </li>

          </ul>

        </div>

        <p class="copyright-text">
          Copyright 2022 © Wren - Personal Blog Template.
          Developed by codewithsadee
        </p>

      </nav>

     <div style="display: flex;">
      <a href="{{ route('Userlogin') }}" class="btn btn-primary">Login</a>
      <a href="{{ route('signup') }}"  class="btn btn-primary" style="margin-left: 5px;background-color: blue;">Signup</a>
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

      <section class="hero" id="home" aria-label="home">
        <div class="container">

          <div class="hero-content">



            <h1 class="headline headline-1 section-title">
           NCSS <span class="span">Beyond the Atoms</span>
            </h1>

            <p class="hero-text">
            Nalanda College Science Society is a organization dedicated for the scientific descoveris of Sri Lanka. Encoraging
            students to expore the exiting world of science.
            </p>



          </div>

          <div class="hero-banner">

            <img src="{{asset('images/pattern.svg')}}" width="327" height="490" alt="Wren Clark" class="w-100">



          </div>

          <img src="{{ asset('images/shadow-1.svg') }}" width="500" height="800" alt="" class="hero-bg hero-bg-1">

          <img src="{{ asset('images/shadow-2.svg') }}" width="500" height="500" alt="" class="hero-bg hero-bg-2">

        </div>
      </section>





      <!--
        - #TOPICS
      -->







      <!--
        - #FEATURED POST
      -->

      <section class="section feature" aria-label="feature" id="featured">
        <div class="container">

          <h2 class="headline headline-2 section-title">
            NCSS <span class="span">Board Of Officicals</span>
          </h2>



          <ul class="feature-list">

            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">Teacher in Charge</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/teacher2.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                       Mr. Wijaya ranaringhe
                    </a>
                  </h3>



                </div>

              </div>
            </li>

            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">Teacher in Charge</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/teacher1.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                       Mrs. Chelani Gunarathne
                    </a>
                  </h3>



                </div>

              </div>
            </li>

            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">President</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/member1.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                      Dinod Karunarathne
                    </a>
                  </h3>



                </div>

              </div>
            </li>
            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">Secretary</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/member1.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                      Dinod Karunarathne
                    </a>
                  </h3>



                </div>

              </div>
            </li>
            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">Vice President</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/member1.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                      Dinod Karunarathne
                    </a>
                  </h3>



                </div>

              </div>
            </li>
            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">Organizor</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/member1.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                      Dinod Karunarathne
                    </a>
                  </h3>



                </div>

              </div>
            </li>
            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">Treasurer</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/member1.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                      Dinod Karunarathne
                    </a>
                  </h3>



                </div>

              </div>
            </li>
            <li>
              <div class="card feature-card">
                <h1 style="text-align: center;color: white;">Editor</h1><br/>
                <figure class="card-banner img-holder" style="--width: 803; --height: 1002;">
                  <img src="{{ asset('images/member1.jpg') }}" width="703" height="602" loading="lazy" class="img-cover">
                </figure>

                <div class="card-content">



                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2 text-center "  style="padding-top: 20px;text-align: center;">
                      Dinod Karunarathne
                    </a>
                  </h3>



                </div>

              </div>
            </li>




          </ul>



        </div>

        <img src="{{ asset('images/shadow-3.svg') }}" width="500" height="1500" loading="lazy" alt="" class="feature-bg">

      </section>












      <!--
        - #RECENT POST
      -->

      <section class="section recent-post" id="recent" aria-labelledby="recent-label">
        <div class="container">

          <div class="post-main">

            <h2 class="headline headline-2 section-title">
              <span class="span">Recent posts</span>
            </h2>

            <p class="section-text">
              Don't miss the latest trends
            </p>

            <ul class="grid-list">

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="./assets/images/recent-post-1.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="./assets/images/recent-post-2.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="./assets/images/recent-post-3.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="./assets/images/recent-post-4.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="./assets/images/recent-post-5.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

            </ul>

            <nav aria-label="pagination" class="pagination">

              <a href="#" class="pagination-btn" aria-label="previous page">
                <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
              </a>

              <a href="#" class="pagination-btn">1</a>
              <a href="#" class="pagination-btn">2</a>
              <a href="#" class="pagination-btn">3</a>
              <a href="#" class="pagination-btn" aria-label="more page">...</a>

              <a href="#" class="pagination-btn" aria-label="next page">
                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
              </a>

            </nav>

          </div>

          <div class="post-aside grid-list">

            <div class="card aside-card">

              <h3 class="headline headline-2 aside-title">
                <span class="span">Popular Posts</span>
              </h3>

              <ul class="popular-list">

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="./assets/images/popular-post-1.jpg" width="64" height="64" loading="lazy"
                        alt="Creating is a privilege but it’s also a gift" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Creating is a privilege but it’s also a gift</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="./assets/images/popular-post-2.jpg" width="64" height="64" loading="lazy"
                        alt="Being unique is better than being perfect" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Being unique is better than being perfect</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="./assets/images/popular-post-3.jpg" width="64" height="64" loading="lazy"
                        alt="Every day, in every city and town across the country" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Every day, in every city and town across the country</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="./assets/images/popular-post-4.jpg" width="64" height="64" loading="lazy"
                        alt="Your voice, your mind, your story, your vision" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Your voice, your mind, your story, your vision</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="./assets/images/popular-post-2.jpg" width="64" height="64" loading="lazy"
                        alt="Being unique is better than being perfect" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Being unique is better than being perfect</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

              </ul>

            </div>

            <div class="card aside-card">

              <h3 class="headline headline-2 aside-title">
                <span class="span">Last Comment</span>
              </h3>

              <ul class="comment-list">

                <li>
                  <div class="comment-card">

                    <blockquote class="card-text">
                      “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner “
                    </blockquote>

                    <div class="profile-card">
                      <figure class="profile-banner img-holder">
                        <img src="./assets/images/author-6.png" width="32" height="32" loading="lazy" alt="Jane Cooper">
                      </figure>

                      <div>
                        <p class="card-title">Jane Cooper</p>

                        <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                      </div>
                    </div>

                  </div>
                </li>

                <li>
                  <div class="comment-card">

                    <blockquote class="card-text">
                      “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner “
                    </blockquote>

                    <div class="profile-card">
                      <figure class="profile-banner img-holder">
                        <img src="./assets/images/author-7.png" width="32" height="32" loading="lazy" alt="Katen Doe">
                      </figure>

                      <div>
                        <p class="card-title">Katen Doe</p>

                        <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                      </div>
                    </div>

                  </div>
                </li>

                <li>
                  <div class="comment-card">

                    <blockquote class="card-text">
                      “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner “
                    </blockquote>

                    <div class="profile-card">
                      <figure class="profile-banner img-holder">
                        <img src="./assets/images/author-8.png" width="32" height="32" loading="lazy"
                          alt="Barbara Cartland">
                      </figure>

                      <div>
                        <p class="card-title">Barbara Cartland</p>

                        <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                      </div>
                    </div>

                  </div>
                </li>

              </ul>

            </div>



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

          <div class="footer-brand">

            <a href="#" class="logo">
              <img src="{{ asset('images/logo.jpeg') }}" width="119" height="37" loading="lazy" alt="Wren logo">
            </a>

            <p class="footer-text">
                Nalanda College Science Society is a organization dedicated for the scientific descoveris of Sri Lanka.
                 Encoraging students to expore the exiting world of science.
            </p>

            <p class="footer-list-title">Address</p>

            <address class="footer-text address">
                WVFG+92X,<br/> Siri Dhamma Mawatha, Colombo 01000
            </address>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Quick Links</p>

            <ul>

              <li>
                <a href="#" class="footer-link hover-2">Home</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Board of Officials</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Posts</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Contact</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Log In</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Sign Up</a>
              </li>



            </ul>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Newsletter</p>

            <p class="footer-text">
              Sign up to  receive the latest stories about the world of science provided by ncss.
            </p>

            <div class="input-wrapper">
              <input type="text" name="name" placeholder="Your name" required class="input-field" autocomplete="off">

              <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
            </div>

            <div class="input-wrapper">
              <input type="email" name="email_address" placeholder="Emaill address" required class="input-field"
                autocomplete="off">

              <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
            </div>

            <a href="#" class="btn btn-primary">
              <span class="span">Subscribe</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>

          </div>

        </div>

        <div class="footer-bottom">

          <p class="copyright">
            &copy; Developed by <a href="#" class="copyright-link">Laxon Solutions.</a>
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>

                <span class="span">Twitter</span>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>

                <span class="span">LinkedIn</span>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
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

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
  </a>





  <!--
    - custom js link
  -->
  <script src="{{ asset('js/home.js') }}"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>

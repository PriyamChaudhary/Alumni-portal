<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Portal - Home</title>
    <link rel="stylesheet" href="css/index.css">
    <!--
        favicon
    -->
    <link rel="shortcut icon" href="images/favicon.svg" type="image/svg+xml">

    <!--
        Google Font Link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap"
        rel="stylesheet">

    <!--
        Preload Images
    -->
    <link rel="preload" as="image" href="images/hero-slider-1.jpg">
    <link rel="preload" as="image" href="images/hero-slider-2.jpg">
    <link rel="preload" as="image" href="images/hero-slider-3.jpg">

</head>

<body>
<?php
        session_start();

        include 'logged_user.php';
    ?>

    <header class="header" data-header>
        <div class="container">
            <a href="#" class="logo">
                <img src="images/logo.png" width="160" height="50" alt="Alumni Portal - Home">
            </a>
            <nav class="navbar" data-navbar>
                <button class="close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
                <a href="/" class="logo">
                    <img src="images/logo.png" width="160" height="50" alt="Alumni Portal - Home">
                </a>

                <ul class="navbar-list">
                    <li class="navbar-item">
                        <a href="#home" class="navbar-link hover-underline active">
                            <div class="separator"></div>
                            <span class="span">Home</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#service" class="navbar-link hover-underline">
                            <div class="separator"></div>
                            <span class="span">Services</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#events" class="navbar-link hover-underline">
                            <div class="separator"></div>
                            <span class="span">Events</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#jobs" class="navbar-link hover-underline">
                            <div class="separator"></div>
                            <span class="span">Jobs</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#donate" class="navbar-link hover-underline">
                            <div class="separator"></div>
                            <span class="span">Donate</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#about" class="navbar-link hover-underline">
                            <div class="separator"></div>
                            <span class="span">About Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="#bookatable" class="btn btn-secondary">
                            <span class="text text-1">Login</span>
                            <span class="text text-2" aria-hidden="true">Sign Up</span>
                        </a>
                    </li>
                </ul>

                <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>

                <div class="overlay" data-nav-toggler data-overlay></div>

        </div>
    </header>
    <main>
        <article>
            <!--
                    - #HERO 
                -->
            <section class="hero text-center" aria-label="home" id="home">
                <ul class="hero-slider" data-hero-slider>

                    <li class="slider-item active" data-hero-slider-item>
                        <div class="slider-bg">
                            <img src="images/hero-slider-1.jpg" width="1880" height="950" alt="Hero Image 1"
                                class="img-cover">
                        </div>

                        <p class="label-2 section-subtitle slider-reveal">Connecting Alumni</p>
                        <h1 class="display-1 hero-title slider-reveal">
                            Join Our Community</br>
                            and Stay Connected
                        </h1>

                        <p class="body-2 hero-text slider-reveal">Reconnect with your peers, give back to your alma
                            mater, and explore new opportunities.</p>

                        <a href="#networking" class="btn btn-primary slider-reveal">
                            <span class="text text-1">Explore Networking</span>
                            <span class="text text-2" aria-hidden="true">Explore Networking</span>
                        </a>
                    </li>

                    <li class="slider-item" data-hero-slider-item>
                        <div class="slider-bg">
                            <img src="images/hero-slider-2.jpg" width="1880" height="950" alt="Hero Image 2"
                                class="img-cover">
                        </div>

                        <p class="label-2 section-subtitle slider-reveal">Events and Reunions</p>
                        <h1 class="display-1 hero-title slider-reveal">
                            Upcoming Alumni</br>
                            Events and Reunions
                        </h1>

                        <p class="body-2 hero-text slider-reveal">Stay updated with our events, reunions, and
                            professional development sessions.</p>

                        <a href="#events" class="btn btn-primary slider-reveal">
                            <span class="text text-1">View Events</span>
                            <span class="text text-2" aria-hidden="true">View Events</span>
                        </a>
                    </li>

                    <li class="slider-item" data-hero-slider-item>
                        <div class="slider-bg">
                            <img src="images/hero-slider-3.jpg" width="1880" height="950" alt="Hero Image 3"
                                class="img-cover">
                        </div>

                        <p class="label-2 section-subtitle slider-reveal">Support and Give Back</p>
                        <h1 class="display-1 hero-title slider-reveal">
                            Contribute to</br>
                            Our Alumni Fund
                        </h1>

                        <p class="body-2 hero-text slider-reveal">Support our initiatives and help us enhance the alumni
                            experience through donations.</p>

                        <a href="#donate" class="btn btn-primary slider-reveal">
                            <span class="text text-1">Make a Donation</span>
                            <span class="text text-2" aria-hidden="true">Make a Donation</span>
                        </a>
                    </li>

                </ul>

                <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
                    <ion-icon name="chevron-back"></ion-icon>
                </button>
                <button class="slider-btn next" aria-label="slide to next" data-next-btn>
                    <ion-icon name="chevron-forward"></ion-icon>
                </button>
            </section>
            <!--
    - #SERVICE
-->
            <section class="section service bg-black-10 text-center" aria-label="service" id="service">
                <div class="container">
                    <p class="section-subtitle label-2">Alumni Services</p>
                    <h2 class="headline-1 section-title">We Offer Exceptional Services</h2>
                    <p class="section-text">"Explore a range of services from networking with alumni to finding new
                        career opportunities through our Job Portal."</p>
                    <ul class="grid-list">
                        <li>
                            <div class="service-card">
                                <a href="/network" class="has-before hover:shine">
                                    <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                                        <img src="images/service-2.jpg" width="285" height="336" loading="lazy"
                                            alt="Network Portal" class="img-cover">
                                    </figure>
                                </a>
                                <div class="card-content">
                                    <h3 class="title-4 card-title"><a href="/network">Network Portal</a></h3>
                                    <p class="body-2">Connect with fellow alumni, share experiences, and build
                                        meaningful professional relationships.</p>
                                    <a href="/network" class="btn-text hover-underline label-2">Visit Network Portal</a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="service-card">
                                <a href="/jobs" class="has-before hover:shine">
                                    <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                                        <img src="images/service-1.jpg" width="285" height="336" loading="lazy"
                                            alt="Job Portal" class="img-cover">
                                    </figure>
                                </a>
                                <div class="card-content">
                                    <h3 class="title-4 card-title"><a href="/jobs">Job Portal</a></h3>
                                    <p class="body-2">Discover job opportunities, internships, and career resources
                                        through our alumni-driven Job Portal.</p>
                                    <a href="/jobs" class="btn-text hover-underline label-2">Find Jobs</a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="service-card">
                                <a href="view_events.php" class="has-before hover:shine">
                                    <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                                        <img src="images/service-3.jpg" width="285" height="336" loading="lazy"
                                            alt="Events" class="img-cover">
                                    </figure>
                                </a>
                                <div class="card-content">
                                    <h3 class="title-4 card-title"><a href="view_events.php">Alumni Events</a></h3>
                                    <p class="body-2">Stay informed and participate in alumni gatherings, webinars, and
                                        other community events.</p>
                                    <a href="view_events.php" class="btn-text hover-underline label-2">View Events</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>


        </article>
    </main>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
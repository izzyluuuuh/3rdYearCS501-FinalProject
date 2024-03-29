<?php

// Retrieve user data from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
    
    // Query the database for the username and password provided by the user
    $sql = "SELECT * FROM Inventory WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    // If a match was found, set session variables and redirect to the dashboard
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['middle_initial'] = $row['middle_initial'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['contact_number'] = $row['contact_number'];
        

        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $middle_initial = $_SESSION['middle_initial'];
        $email = $_SESSION['email'];
        $address = $_SESSION['address'];
        $age = $_SESSION['age'];
        $contact_number = $_SESSION['contact_number'];
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== UNICONS =====-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!--===== SWIPER CSS =====-->
    <link rel="stylesheet" href="OnlineP\assets\css\css_swiper-bundle.min.css">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="OnlineP\assets\css\styles.css">

    <title>Online Portfolio</title>

    <link rel="website icon" type="png"
    href="OnlineP\assets\img\wolfie.png" sizes="16x16"> 
</head>
<body>

<!-- Add the following code to play background music -->
<audio autoplay loop>
  <source src="CD3_ Proof/9. Spring Day (V Demo Ver).mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

    <!--========================= HEADER ==============================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo"><?php echo $username; ?></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list grid">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">
                            <i class="uil uil-estate nav__icon"></i> Home
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">
                            <i class="uil uil-user nav__icon"></i> About
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#skills" class="nav__link">
                            <i class="uil uil-file-alt nav__icon"></i> Skills
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#portfolio" class="nav__link">
                            <i class="uil uil-scenery nav__icon"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">
                            <i class="uil uil-message nav__icon"></i> Contact me
                        </a>
                    </li>
                </ul>
                <i class="uil uil-times nav__close" id="nav-close"></i> 
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class="uil uil-moon change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-apps"></i>
                </div>
            </div>
        </nav>
    </header>

    <!--===== MAIN =====-->
    <main class="main">

        <!--======= HOME ========-->
        <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__content grid">
                    <div class="home__social">
                        <a href="https://www.linkedin.com" target="_blank" class="home__social-icon">
                            <i class="uil uil-linkedin-alt"></i>
                        </a>

                        <a href="https://dribble.com" target="_blank" class="home__social-icon">
                            <i class="uil uil-dribbble"></i>
                        </a>

                        <a href="https://github.com" target="_blank" class="home__social-icon">
                            <i class="uil uil-github-alt"></i>
                        </a>
                    </div>

                    <div class="home__img">
                        <svg class="home__blob" viewBox="0 0 200 187" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <mask id="mask0" mask-type="alpha">
                                <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
                                130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
                                97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
                                0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                            </mask>
                            <g mask="url(#mask0)">
                                <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 
                                165.547 130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 
                                129.362C2.45775 97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 
                                -0.149132 97.9666 0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>

                                <image class="home__blob-img" href="OnlineP\assets\img\home.png" alt="MY IMAGE"/>
                            </g>
                        </svg>
                    </div>

                    <!-- Add the following code to play background music -->
                    <!-- <audio autoplay loop>
                    <source src="CD3_ Proof/9. Spring Day (V Demo Ver).mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio> -->

                    <div class="home__data">
                        <h1 class="home__title">Hi, It's <?php echo $username; ?></h1>
                        <h3 class="home__subtitle">COM SCI Student</h3>
                        <p class="home__description"><strong>NOTE:</strong> `idk yet`</p>
                        <a href="#contact" class="button button-flex">
                            Contact Me <i class="uil uil-message button__icon"></i>
                        </a>
                    </div>
                </div>

                <div class="home__scroll">
                    <a href="#about" class="home__scroll-button button--flex">
                        <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                        <span class="home__scroll-name">Scroll down</span>
                        <i class="uil uil-arrow-down home__scroll-arrow"></i>
                    </a>
                </div>
            </div>
        </section>

        <!--============== ABOUT =====================-->
        <section class="about section" id="about">
            <h2 class="section__title">About Me</h2>
            <span class="section__subtitle">My Introduction</span>

            <div class="about__container container grid">
                <img src="OnlineP\assets\img\about.jpg" alt="dawg" class="about__img">

                <div class="about__data">
                    <p class="about__description">Broke College Student</p>
                    <p class="about__description2"><?php echo $first_name; ?></p>
                    <?php echo $first_name . " " . $middle_initial . " " . $last_name; ?>

                    <div class="about__info">
                        <div>
                            <span class="about__info-title"><?php echo $age; ?></span>
                            <span class="about__info-name">Years <br> of age</span>
                        </div>

                        <div>
                            <span class="about__info-title">Sophomore</span>
                            <span class="about__info-name">Year <br> Level</span>
                        </div>
                        
                        <div>
                            <span class="about__info-title">BSCS </span>
                            <span class="about__info-name"> Bachelor's <br> degree</span>
                        </div>
                    </div>

                    <div class="about__buttons">
                        <!--=== CHANGE THE PDF FILE ===-->
                        <a download="" href="img\CV.pdf" class="button button--flex">
                           Download CV <i class="uil uil-download-alt button__icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--====================== SKILLS =====================-->
        <section class="skills section" id="skills">
            <h2 class="section__title">Skills</h2>
            <span class="section__subtitle">This is Me</span> <!-- NOT FINAL -->

            <!--============== THIS IS ME ============-->
            <div class="services__container container grid">
                <!--====== SERVICES 1 =======-->
                <div class="services__content">
                    <div>
                        <i class="uil uil-html5-alt services__icon"></i>
                        <h3 class="services__title">HTML</h3>
                    </div>

                    <span class="button button--flex button--small button--link services__button">
                        View More
                        <i class="uil uil-arrow-right button__icon"></i>
                    </span>

                    <div class="services__modal">
                        <div class="services__modal-content">
                            <h4 class="services__modal-title">HTML</h4>
                            <i class="uil uil-times services__modal-close"></i>

                            <ul class="services__modal-services grid">
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I develop the user interface.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>Web page development.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I create ux element interactions.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I position your company brand.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--====== SERVICES 2 =======-->
                <div class="services__content">
                    <div>
                        <i class="uil uil-css3-simple services__icon"></i>
                        <h3 class="services__title">CSS</h3>
                    </div>

                    <span class="button button--flex button--small button--link services__button">
                        View More
                        <i class="uil uil-arrow-right button__icon"></i>
                    </span>

                    <div class="services__modal">
                        <div class="services__modal-content">
                            <h4 class="services__modal-title">CSS</h4>
                            <i class="uil uil-times services__modal-close"></i>

                            <ul class="services__modal-services grid">
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I develop the user interface.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>Web page development.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I create ux element interactions.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I position your company brand.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--====== SERVICES 3 =======-->
                <div class="services__content">
                    <div>
                        <i class="uil uil-java-script services__icon"></i>
                        <h3 class="services__title">JavaScript</h3>
                    </div>

                    <span class="button button--flex button--small button--link services__button">
                        View More
                        <i class="uil uil-arrow-right button__icon"></i>
                    </span>

                    <div class="services__modal">
                        <div class="services__modal-content">
                            <h4 class="services__modal-title">JavaScript</h4>
                            <i class="uil uil-times services__modal-close"></i>

                            <ul class="services__modal-services grid">
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I develop the user interface.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>Web page development.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I create ux element interactions.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I position your company brand.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--====== SERVICES 4 =======-->
                <div class="services__content">
                    <div>
                        <i></i>
                        <h3 class="services__title">Java</h3>
                    </div>

                    <span class="button button--flex button--small button--link services__button">
                        View More
                        <i class="uil uil-arrow-right button__icon"></i>
                    </span>

                    <div class="services__modal">
                        <div class="services__modal-content">
                            <h4 class="services__modal-title">Java</h4>
                            <i class="uil uil-times services__modal-close"></i>

                            <ul class="services__modal-services grid">
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I develop the user interface.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>Web page development.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I create ux element interactions.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I position your company brand.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--====== SERVICES 5 =======-->
                <div class="services__content">
                    <div>
                        <i></i>
                        <h3 class="services__title">Python</h3>
                    </div>

                    <span class="button button--flex button--small button--link services__button">
                        View More
                        <i class="uil uil-arrow-right button__icon"></i>
                    </span>

                    <div class="services__modal">
                        <div class="services__modal-content">
                            <h4 class="services__modal-title">Python</h4>
                            <i class="uil uil-times services__modal-close"></i>

                            <ul class="services__modal-services grid">
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I develop the user interface.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>Web page development.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I create ux element interactions.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I position your company brand.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--====== SERVICES 6 =======-->
                <div class="services__content">
                    <div>
                        <i></i>
                        <h3 class="services__title">C#</h3>
                    </div>

                    <span class="button button--flex button--small button--link services__button">
                        View More
                        <i class="uil uil-arrow-right button__icon"></i>
                    </span>

                    <div class="services__modal">
                        <div class="services__modal-content">
                            <h4 class="services__modal-title">C#</h4>
                            <i class="uil uil-times services__modal-close"></i>

                            <ul class="services__modal-services grid">
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I develop the user interface.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>Web page development.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I create ux element interactions.</p>
                                </li>
                                <li class="services__modal-service">
                                    <i class="uil uil-check-circle services__modal-icon"></i>
                                    <p>I position your company brand.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================ QUALIFICATION ==================-->
        <section class="qualification section">
            <h2 class="section__title">Qualification</h2>
            <span class="section__subtitle">My personal journey</span>

            <div class="qualification__container container">
                <div class="qualification__tabs">
                    <div class="qualification__button button--flex qualification__active" data-target='#education'>
                        <i class="uil uil-graduation-cap qualification__icon"></i>
                        Education
                    </div>

                    <div class="qualification__button button--flex" data-target="#work">
                        <i class="uil uil-briefcase-alt qualification__icon"></i>
                        Work
                    </div>
                </div>

                <div class="qualification__sections">
                    <!--====== QUALIFICATION CONTENT 1 ======-->
                    <div class="qualification__content qualification__active" data-content id="education">
                        <!--====== QUALIFICATION 1 ======-->
                        <div class="qualification__data">
                            <div>
                                <h3 class="qualification__title">Computer Science</h3>
                                <span class="qualification__subtitle">Hogwarts</span>
                                <div class="qualificattion__calendar">
                                    <i class="uil uil-calendar-alt"></i>
                                    2021 - 2023
                                </div>
                            </div>

                            <div>
                                <span class="qualification__rounder"></span>
                                <span class="qualification__line"></span>
                            </div>
                        </div>

                        <!--====== QUALIFICATION 2 ======-->
                        <div class="qualification__data">
                            <div></div>

                            <div>
                                <span class="qualification__rounder"></span>
                                <span class="qualification__line"></span>
                            </div>
                            
                            <div>
                                <h3 class="qualification__title">Web Design</h3>
                                <span class="qualification__subtitle">Hogwarts</span>
                                <div class="qualificattion__calendar">
                                    <i class="uil uil-calendar-alt"></i>
                                    2021 - 2023
                                </div>
                            </div>
                        </div>

                        <!--====== QUALIFICATION 3 ======-->
                        <div class="qualification__data">
                            <div>
                                <h3 class="qualification__title">Web Development</h3>
                                <span class="qualification__subtitle">Hogwarts</span>
                                <div class="qualificattion__calendar">
                                    <i class="uil uil-calendar-alt"></i>
                                    2021 - 2023
                                </div>
                            </div>

                            <div>
                                <span class="qualification__rounder"></span>
                                <span class="qualification__line"></span>
                            </div>
                        </div>

                        <!--====== QUALIFICATION 4 ======-->
                        <div class="qualification__data">
                            <div></div>
                            
                            <div>
                                <span class="qualification__rounder"></span>
                                <!-- <span class="qualification__line"></span> -->
                            </div>

                            <div>
                                <h3 class="qualification__title">Master in UI/UX</h3>
                                <span class="qualification__subtitle">Hogwarts</span>
                                <div class="qualificattion__calendar">
                                    <i class="uil uil-calendar-alt"></i>
                                    2021 - 2023
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--====== QUALIFICATION CONTENT 2 ======-->
                    <div class="qualification__content" data-content id="work">
                        <!--====== QUALIFICATION 1 ======-->
                        <div class="qualification__data">
                            <div>
                                <h3 class="qualification__title">Computer Programmer</h3>
                                <span class="qualification__subtitle">MEMA ONLY</span>
                                <div class="qualificattion__calendar">
                                    <i class="uil uil-calendar-alt"></i>
                                    2021 - 2023
                                </div>
                            </div>

                            <div>
                                <span class="qualification__rounder"></span>
                                <span class="qualification__line"></span>
                            </div>
                        </div>

                        <!--====== QUALIFICATION 2 ======-->
                        <div class="qualification__data">
                            <div></div>

                            <div>
                                <span class="qualification__rounder"></span>
                                <span class="qualification__line"></span>
                            </div>
                            
                            <div>
                                <h3 class="qualification__title">Web Designer</h3>
                                <span class="qualification__subtitle">Hogwarts</span>
                                <div class="qualificattion__calendar">
                                    <i class="uil uil-calendar-alt"></i>
                                    2021 - 2023
                                </div>
                            </div>
                        </div>

                        <!--====== QUALIFICATION 3 ======-->
                        <div class="qualification__data">
                            <div>
                                <h3 class="qualification__title">Web Developer</h3>
                                <span class="qualification__subtitle">Hogwarts</span>
                                <div class="qualificattion__calendar">
                                    <i class="uil uil-calendar-alt"></i>
                                    2021 - 2023
                                </div>
                            </div>

                            <div>
                                <span class="qualification__rounder"></span>
                                <!-- <span class="qualification__line"></span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================== PORTFOLIO =====================-->
        <section class="portfolio section" id="portfolio">
            <h2 class="section__title">Portfolio</h2>
            <span class="section__subtitle">Most recent work</span>

            <div class="portfolio__container container swiper-container">
                <div class="swiper-wrapper">
                    <!--====== PORTFOLIO 1 =======-->
                    <div class="portfolio__content grid swiper-slide">
                        <img src="OnlineP\assets\img\p1.jpeg" alt="" class="portfolio__img">

                        <div class="portfolio__data">
                            <h3 class="portfolio__title">Modern Website</h3>
                            <p class="portfolio__description">This is the description.</p>
                            <a href="#" class="button button--flex button--small portfolio__button">
                                Demo
                                <i class="uil uil-arrow-right button__icon"></i>
                            </a>
                        </div>
                    </div>

                    <!--====== PORTFOLIO 2 =======-->
                    <div class="portfolio__content grid swiper-slide">
                        <img src="OnlineP\assets\img\p2.jpeg" alt="" class="portfolio__img">

                        <div class="portfolio__data">
                            <h3 class="portfolio__title">Brand Design</h3>
                            <p class="portfolio__description">This is the description.</p>
                            <a href="#" class="button button--flex button--small portfolio__button">
                                Demo
                                <i class="uil uil-arrow-right button__icon"></i>
                            </a>
                        </div>
                    </div>

                    <!--====== PORTFOLIO 3 =======-->
                    <div class="portfolio__content grid swiper-slide">
                        <img src="OnlineP\assets\img\p3.jpeg" alt="" class="portfolio__img">

                        <div class="portfolio__data">
                            <h3 class="portfolio__title">Online Store</h3>
                            <p class="portfolio__description">This is the description.</p>
                            <a href="#" class="button button--flex button--small portfolio__button">
                                Demo
                                <i class="uil uil-arrow-right button__icon"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add Arrows -->
                <div class="swiper-button-next">
                    <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <!--===== PROJECT IN MIND ======-->
        <section class="project section">
            <div class="project__bg">
                <div class="project__container container grid">
                    <div class="project__data">
                        <h2 class="project__title">New project?</h2>
                        <p class="project__description">I get a good impression, I carry 
                            out my project with all the possible quality and attention and 
                            support 24 hours a day.</p>
                        <a href="#contact" class="button button--flex button--white">
                            Contact Me
                            <i class="uil uil-message project__icon button__icon"></i>
                        </a>
                    </div>

                    <img src="OnlineP/assets/img/project.jpg" alt="" class="project__img">
                </div>
            </div>
        </section>

        <!--===== TESTIMONIAL =====-->
        <section class="testimonial section">
            <h2 class="section__title">Testimonial</h2>
            <span class="section__subtitle">My friends saying</span>

            <div class="testimonial__container container swiper-container">
                <div class="swiper-wrapper">
                    <!--===== TESTIMONIAL 1 =====-->
                    <div class="testimonial__content swiper-slide">
                        <div class="testimonial__data">
                            <div class="testimonial__header">
                                <img src="OnlineP\assets\img\lko.jpg" alt="photo1" class="testimonial__img">

                                <div>
                                    <h3 class="testimonial__name">LKO</h3>
                                    <span class="testimonial__client">Friend</span>
                                </div>
                            </div>

                            <div>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                            </div>
                        </div>

                        <p class="testimonial__description">???
                        </p>
                    </div>

                    <!--===== TESTIMONIAL 2 =====-->
                    <div class="testimonial__content swiper-slide">
                        <div class="testimonial__data">
                            <div class="testimonial__header">
                                <img src="OnlineP\assets\img\forgor.jpgg" alt="photo2 class="testimonial__img">

                                <div>
                                    <h3 class="testimonial__name">I Forgor</h3>
                                    <span class="testimonial__client">Friend</span>
                                </div>
                            </div>

                            <div>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                            </div>
                        </div>

                        <p class="testimonial__description">Hakdog</p>
                    </div>

                    <!--===== TESTIMONIAL 3 =====-->
                    <div class="testimonial__content swiper-slide">
                        <div class="testimonial__data">
                            <div class="testimonial__header">
                                <img src="OnlineP\assets\img\jnxn.jpg" alt="photo3" class="testimonial__img">

                                <div>
                                    <h3 class="testimonial__name">Jnxn Tn</h3>
                                    <span class="testimonial__client">Friend</span>
                                </div>
                            </div>

                            <div>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                                <i class="uil uil-star testimonial__icon-star"></i>
                            </div>
                        </div>

                        <p class="testimonial__description">HAHAHA
                        </p>
                    </div>
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-testimonial"></div>
            </div>
        </section>

        <!--====== CONTACT ME =====-->
        <section class="contact section" id="contact">
            <h2 class="section__title">Contact Me</h2>
            <span class="section__subtitle">Get in touch</span>

            <div class="contact__container container grid">
                <div>
                    <div class="contact__information">
                        <i class="uil uil-phone contact__icon"></i>

                        <div>
                            <h3 class="contact__title">Call Me</h3>
                            <span class="contact__subtitle"><?php echo $contact_number; ?></span>
                        </div>
                    </div>

                    <div class="contact__information">
                        <i class="uil uil-envelope contact__icon"></i>

                        <div>
                            <h3 class="contact__title">Email</h3>
                            <span class="contact__subtitle"><?php echo $email; ?></span>
                        </div>
                    </div>

                    <div class="contact__information">
                        <i class="uil uil-map-marker contact__icon"></i>

                        <div>
                            <h3 class="contact__title">Location</h3>
                            <span class="contact__subtitle"><?php echo $address; ?></span>
                        </div>
                    </div>
                </div>

                <form action="" class="contact__form grid">
                    <div class="contact__inputs grid">
                        <div class="contact__content">
                            <label for="" class="contact__label">Name</label>
                            <input type="text" class="contact__input">
                        </div>

                        <div class="contact__content">
                            <label for="" class="contact__label">Email</label>
                            <input type="email" class="contact__input">
                        </div>
                    </div>
                    <div class="contact__content">
                        <label for="" class="contact__label">Project</label>
                        <input type="text" class="contact__input">
                    </div>
                    <div class="contact__content">
                        <label for="" class="contact__label">Message</label>
                        <textarea name="" id="" cols="0" rows="7" class="contact__input"></textarea>
                    </div>

                    <div>
                        <a href="" class="button button--flex">
                            Send Message
                            <i class="uil uil-message button__icon"></i>
                        </a>
                    </div>
                </form>
            </div>
        </section>

        <embed name="GoodEnough" src="/music/good_enough.mp3" loop="false" hidden="true" autostart="true">

    </main>

    <!--===== FOOTER =====-->
    <footer class="footer">
        <div class="footer__bg">
            <div class="footer__container container grid">
                <div>
                    <h1 class="footer__title"><?php echo $username; ?></h1>
                    <span class="footer__subtitle">MEMA</span>
                </div>

                <ul class="footer__links">
                    <li>
                        <a href="#skills" class="footer__link">Skills</a>
                    </li>
                    <li>
                        <a href="#portfolio" class="footer__link">Portfolio</a>
                    </li>
                    <li>
                        <a href="#contact" class="footer__link">Contactme</a>
                    </li>
                </ul>

                <div class="footer__socials">
                    <a href="https://www.facebook.com/lae.wxlf" target="_blank" class="footer__social">
                        <i class="uil uil-facebook-f"></i>
                    </a>

                    <a href="https://twitter.com/sinehgangg" target="_blank" class="footer__social">
                        <i class="uil uil-twitter-alt"></i>
                    </a>

                    <a href="https://www.instagram.com/izzyluuuuh/" target="_blank" class="footer__social">
                        <i class="uil uil-instagram"></i>
                    </a>
                </div>
            </div>

            <p class="footer__copy">&#169; Izzy. All rights reserved</p>
        </div>
    </footer>

    <!--===== SCROLL TOP =====-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="uil uil-arrow-up scrollup_icon"></i>
    </a>


    <!--===== SWIPER JS =====-->
    <script src="OnlineP\assets\js\js_swiper-bundle.min.js"></script>

    <!--===== MAIN JS =====-->
    <script src="OnlineP\assets\js\main.js"></script>

</body>
</html>

<img src="" alt="" height="" width="">

+
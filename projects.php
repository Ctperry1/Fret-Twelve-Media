<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fret Twelve Media Pojects</title>

    <!-- Import font-awesome, google fonts, google recaptcha, css style sheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/projects.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Favicon Section -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <!-- Back to top button -->
    <a id="back2Top" title="Back to top" href="#">&#10148;</a>
    <header>
        <div class="container">
            <!-- Logo and link to home page -->
            <div class="logo-contain"><a href="./index.php"><img src="./assets/images/f12logo.png" alt="Fret Twelve Media" class="logo" /></a></div>
            <!-- Navigation Menu Items -->    
            <nav>
                <a href="./index.php">Home</a>
                <a href="./index.php#about">About</a>
                <a href="./index.php#services">Services</a>
                <a href="./projects.php">Projects</a>
                <a href="#contact">Contact</a>
            </nav>
            <!-- Mobile hamburger menu button -->
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </div>
    </header>
    <nav class="mobile-nav">
        <a href="./index.php">Home</a>
        <a href="./index.php#about">About</a>
        <a href="./index.php#services">Services</a>
        <a href="./projects.php">Projects</a>
        <a href="#contact">Contact</a>
    </nav>
    <main>
        <!-- Banner image and text -->
        <section class="banner">
            <div class="container">
                <div class="slide-up">
                    <h1>
                        A comprehensive list <br class="hide-mob" />
                        <span>of all projects</span> to date.
                    </h1>
                </div>
            </div>
        </section>

        <section class="projects" id="projects">
            <div class="container">
                <h2>Projects</h2>

                <div class="projects-grid">
                    <div class="project">
                        <figure class="img-box">
                            <img src="./assets/images/project1.png" alt="Jill Lindstrand Realty" class="img" />
                        </figure>
                        <div class="content">
                            <h3>Jill Lindstrand Realty</h3>
                            <p>
                                The website that started it all, this site, built on Wordpress and designed with
                                Divi along with some CSS, was created for a local realtor who needed an update.
                            </p>
                            <a href="https://jilllindstrandrealty.com/" target="_blank" class="button">View Site</a>
                        </div>
                    </div>

                    <div class="project">
                        <figure class="img-box">
                            <img src="./assets/images/project2.png" alt="Grey Man Web Designs" class="img" />
                        </figure>
                        <div class="content">
                            <h3>Grey Man Web Designs</h3>
                            <p>
                                The first portfolio site built to showcase skills and projects. The site was
                                hand coded using basic HTML, CSS, and JavaScript.
                            </p>
                            <a href="https://greymanwebdesigns.com/" target="_blank" class="button">View Site</a>
                            <a href="https://github.com/Ctperry1/Portfolio-Site" target="_blank" class="button">View Code</a>
                        </div>
                    </div>
                </div>
                <!-- Button with link to projects page -->
                <div class="center">
                    <a href="./projects.php" class="button">View More</a>
                </div>
            </div>

        <!--<section class="projects-links">
            <div class="wrapper">
                <h2>Projects</h2>

                <div class="projects-container">
                <?php
                include_once('./php/insert.php');

                $sql = "SELECT * FROM websitegallery ORDER BY id DESC";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed.";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="">
                        <div style="background-image: url(./assets/images/gallery/'.$row["imgFullName"].');"></div>
                        <h3>'.$row["title"].'</h3>
                        <p>'.$row["descrip"].'</p>
                    </a>';
                    }
                }
                ?>
                </div>
                

            </div>
        </section>-->

        <!-- Contact form with google recaptcha -->
        <section class="contact" id="contact">
            <div class="container">
                <h2>Contact</h2>

                <form action="./php/mail.php" method="POST">
                    <div class="form-grid">
                        <input type="text" name="name" id="name" placeholder="Name" class="form-element" />
                        <input type="email" name="email" id="email" placeholder="Email" class="form-element" />
                        <input type="subject" name="subject" id="subject" placeholder="Subject" class="form-element" />
                        <textarea name="message" id="message" placeholder="Message" class="form-area" required></textarea>
                    </div>
                    <!--<div class="recaptcha"><div class="g-recaptcha" data-sitekey="sitekey"></div></div>-->
                    <div class="right-align">
                        <input type="submit" value="Send Message" class="button"/>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- footer section with social media links and copyright -->
    <footer class="footer">
        <ul class="social-list">
            <li class="social-list__item">
                <a class="social-list__link" target="_blank" href="https://www.facebook.com/tyler.perry.7528">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li class="social-list__item">
                <a class="social-list__link" target="_blank" href="https://www.instagram.com/t.perry27/">
                    <i class="fab fa-instagram-square"></i>
                </a>
            </li>
            <li class="social-list__item">
                <a class="social-list__link" target="_blank" href="https://www.linkedin.com/in/ctperry1/">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
            <li class="social-list__item">
                <a class="social-list__link" target="_blank" href="https://github.com/Ctperry1">
                    <i class="fab fa-github-square"></i>
                </a>
            </li>
        </ul>
        <p class="copy">
        <p>Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
        <p> Built by Fret Twelve Media</p>
        <p>All Rights Reserved</p>
        </p>
    </footer>
    <!-- script for JS file -->
    <script src="./assets/js/main.js"></script>
</body>

</html>

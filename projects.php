<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fret Twelve Media</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/projects.css">
</head>
<body>

    <header>
        <div class="container">
            <h2><a href="#"><span>Fret Twelve</span> Media</a></h2>
                <nav>
                    <a href="./index.php">Home</a>
                    <a href="#about">About</a>
                    <a href="#services">Services</a>
                    <a href="./projects.php">Projects</a>
                    <a href="#contact">Contact</a>
                </nav>
                <button class="hamburger">
                    <div class="bar"></div>
                </button>
            </div>
        </header>
        <nav class="mobile-nav">
            <a href="./index.php">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="./projects.php">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
        <main>
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
    
        <section class="contact" id="contact">
            <div class="container">
                <h2>Contact</h2>

                <?php echo((!empty($errorMessage)) ? $errorMessage : '');?>
                <form action="./php/mail.php" method="POST">
                    <div class="form-grid">
                        <input type="text" name="name" id="name" placeholder="Name" class="form-element" />
                        <input type="email" name="email" id="email" placeholder="Email" class="form-element" />
                        <input type="subject" name="subject" id="subject" placeholder="Subject" class="form-element" />
                        <textarea name="message" id="message" placeholder="Message" class="form-area" required></textarea>
                    </div>
                    <div class="right-align">
                        <input type="submit" value="Send Message" class="button"/>
                    </div>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
                    <script>
                        const constraints = {
                            name: {
                                presence: { allowEmpty: false }
                            },
                                email: {
                                    presence: { allowEmpty: false },
                                        email: true
                            },
                                message: {
                                presence: { allowEmpty: false }
                            }
                        };

                    const form = document.getElementById('contact-form');

                    form.addEventListener('submit', function (event) {
                        const formValues = {
                            name: form.elements.name.value,
                            email: form.elements.email.value,
                            message: form.elements.message.value
                        };

                    const errors = validate(formValues, constraints);

                    if (errors) {
                        event.preventDefault();

                        const errorMessage = Object

                        .values(errors)
                        .map(function (fieldValues) {
                            return fieldValues.join(', ')
                        })

                        .join("\n");

                        alert(errorMessage);
                        }
                        }, false);
                    </script>
                </form>
            </div>
        </section>
    </main>

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
                document.write(new Date().getFullYear())
            </script>
        <p>Built by Fret Twelve Designs</p>
        <p>All Rights Reserved</p>
        </p>
    </footer>

    <script src="./assets/js/main.js"></script>
</body>

</html>

</body>
</html>
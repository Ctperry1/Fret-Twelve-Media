window.onload = function () {
    //sticky navbar
    window.addEventListener("scroll", function (e) {
        if (window.pageYOffset > 50) {
            document.querySelector("header").classList.add("is-scrolling");
        } else {
            document.querySelector("header").classList.remove("is-scrolling");
        }
    });
    //get mobile nav menu
    const menu_btn = document.querySelector(".hamburger");
    const mobile_menu = document.querySelector(".mobile-nav");
    //toggle mobile nav menu
    menu_btn.addEventListener("click", function () {
        menu_btn.classList.toggle("is-active");
        mobile_menu.classList.toggle("is-active");
    });
    //toggle mobile nav menu
    mobile_menu.addEventListener("click", function () {
        menu_btn.classList.toggle("is-active");
        mobile_menu.classList.toggle("is-active");
    });

    //Get the button:
    mybutton = document.getElementById("back2Top");

    window.onscroll = function () {
        scrollFunction();
    };
    //show button on scroll
    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    //back to top of page on click
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
};

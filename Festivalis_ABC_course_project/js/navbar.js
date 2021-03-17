// Priderinta is interneto tutorialu


// jQuery

// Navbar shrink
$(document).on("scroll", function() {
    if ($(document).scrollTop() > 200) {
        $(".shrink").addClass("shrnk");

    } else {
        $(".shrink").removeClass("shrnk");

    }
});

// Navbar funkcijoss
$(document).ready(function() {
    $(".menu-btn").click(
        function(e) {

            $(".shrink > ul").addClass("unfold");
            $(".menu-btn").addClass("nodisplay");
            $(".unfolded-btn").removeClass("nodisplay");
            $(".unfolded-btn").addClass("display");





        });
    $(".unfolded-btn").click(
        function(e) {

            $("ul").removeClass("unfold");
            $(".menu-btn").removeClass("nodisplay");

            $(".unfolded-btn").removeClass("display");



        });
    $(".navlink").click(
        function(e) {

            $("ul").removeClass("unfold");
            $(".menu-btn").removeClass("nodisplay");

            $(".unfolded-btn").removeClass("display");



        });

});



$(document).ready(function() {
    $(".reach").click(
        function(e) {

            $(".reachout").addClass("display");
            $(".reachout").removeClass("displaynone");

            $("body").addClass("overflow-hidden");



        });
    $(".close").click(
        function(e) {

            $(".reachout").addClass("displaynone");
            $(".reachout").removeClass("display");

            $("body").removeClass("overflow-hidden");


        });

});
// JS

//Activ navbar link when scrolling
function changeNav(entries, observer) {
    entries.forEach((entry) => {
        if (entry.isIntersecting && entry.intersectionRatio >= 0.55) {
            document.querySelector(".active").classList.remove("active");
            var id = entry.target.getAttribute("id");
            var newLink = document
                .querySelector(`[href="#${id}"]`)
                .classList.add("active");
        }
    });
}


const options = {
    threshold: 0.55
};
const observer = new IntersectionObserver(changeNav, options);
const sections = document.querySelectorAll("section");
sections.forEach((section) => {
    observer.observe(section);
});
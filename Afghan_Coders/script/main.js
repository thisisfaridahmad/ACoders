var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slide");
    var div = [
        document.getElementById('firstSlide'),
        document.getElementById('secondSlide'),
    ];
    if (n > slides.length) {
        slideIndex = 1;
    } if (n < 1) {
        slideIndex = slides.length;
    } for (i = 0; i < slides.length; i++) {
        div[i].style.display = 'none';
        slides[i].style.display = "none";
    }
    div[slideIndex - 1].style.display = 'inline-block'
    slides[slideIndex - 1].style.display = "block";
}

function scroller() {
    let header = document.getElementById('header');
    let place = window.scrollY;
    let num = 1;
    if (place >= 180) {
        var i;
        for (i = 0; i < 1; i = i + 0.1) {
            header.style.opacity = i;
        }
    } else if (place < 180) {
        header.style.opacity = 0;
    }
}
setInterval(scroller, 1);

function openNav() {
    document.getElementById("myNav").style.height = "100%";
}
function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}
function copybtn() {
    var copytext = document.getElementById('emailValue');
    copytext.select();
    copytext.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copytext.value);
}
var para = document.getElementById('d');
var date = new Date();
para.innerHTML = date.getFullYear();
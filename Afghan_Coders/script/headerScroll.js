function scroller() {
    let header = document.getElementById('nav');
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
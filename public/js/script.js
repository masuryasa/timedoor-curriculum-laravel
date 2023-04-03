function showCompleteText() {
    var dots = document.getElementById("dots");
    var more = document.getElementById("more");
    var moreButton = document.getElementById("more-btn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        moreButton.innerHTML = "Read more";
        more.style.display = "none";
    } else {
        dots.style.display = "none";
        moreButton.innerHTML = "Read less";
        more.style.display = "inline";
    }
}

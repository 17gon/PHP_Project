function toggleNavBar() {
    let x = document.getElementById("links");
    if (x.style.display === "flex") {
      x.style.display = "none";
    } else {
      x.style.display = "flex";
    }
  }

document.addEventListener("DOMContentLoaded", function () {
    const burgerIcon = document.getElementById("burgerIcon");
    const links = document.getElementById("links");

    burgerIcon.addEventListener("click", function () {
        burgerIcon.classList.toggle("open");
        void links.offsetHeight; // Force redraw
        links.classList.toggle("open");
    });
});
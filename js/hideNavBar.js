let prevScrolls = window.scrollY;
window.onscroll = function() {
  let currentScrollPos = window.scrollY;
  let nav = document.getElementsByTagName('nav')[0]

  if (window.screen.width <= 400) {
    if (prevScrolls > currentScrollPos) {
      nav.style.top = "0";
    } else {
      nav.style.top = "-50px";
    }
    prevScrolls = currentScrollPos;
  }
}
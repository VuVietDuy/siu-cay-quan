window.onscroll = function () {
  const navbar = document.querySelector("#navbar");

  if (window.pageYOffset > 0) {
    navbar.classList.add("position-fixed");
    navbar.classList.add("start-0");
    navbar.classList.add("top-0");
    navbar.classList.add("end-0");
    navbar.classList.add("h-4");
    navbar.classList.remove("bg-transparent");
    navbar.classList.remove("h-6");
  } else {
    navbar.classList.remove("position-fixed");
    navbar.classList.remove("start-0");
    navbar.classList.remove("top-0");
    navbar.classList.remove("end-0");
    navbar.classList.add("h-6");
    navbar.classList.remove("h-4");
    navbar.classList.add("bg-transparent");
  }
};

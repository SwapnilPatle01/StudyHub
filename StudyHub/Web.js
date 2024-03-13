const faqs = document.querySelectorAll(".faqq");

faqs.forEach((faq) => {
  faq.addEventListener("click", () => {
    faq.classList.toggle("active");
  });
});

// Get the modal
var modal = document.getElementById("id01");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

const mobileNav = document.querySelector(".moblie-navbar-btn");
const navHeader = document.querySelector(".nav");

mobileNav.addEventListener("click", () => {
  navHeader.classList.toggle("active");
});

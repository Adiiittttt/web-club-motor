// Efek scroll smooth
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// Toggle navigasi responsif
const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li');

  burger.addEventListener('click', () => {
    nav.classList.toggle('nav-active');
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = '';
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
      }
    });
    burger.classList.toggle('toggle');
  });
}

navSlide();

// Efek parallax pada elemen
window.addEventListener('scroll', function () {
  const parallax = document.querySelectorAll('.parallax');

  parallax.forEach((element) => {
    let scrollPosition = window.pageYOffset;

    element.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
  });
});

// Animasi pada elemen saat muncul di viewport
const animateOnScroll = () => {
  const elements = document.querySelectorAll('.animate-on-scroll');

  elements.forEach((element) => {
    const elementPosition = element.getBoundingClientRect().top;
    const viewport = window.innerHeight;

    if (elementPosition < viewport) {
      element.classList.add('animate');
    } else {
      element.classList.remove('animate');
    }
  });
};

window.addEventListener('scroll', animateOnScroll);
animateOnScroll();
document.addEventListener("DOMContentLoaded", function () {
  const currentPath = window.location.pathname;
  const links = document.querySelectorAll(".nav-link");

  links.forEach(link => {
    if (link.dataset.link === currentPath) {
      link.classList.add("text-black", "font-bold");
      link.classList.remove("text-zinc-500");
    }
  });
});
$(window).on('load', function () {
  $('#preloader').fadeOut(2000); // fade out in 0.5s
});
var swiper = new Swiper(".hero", {
  autoplay: {
    delay: 3000,
    disableOnInteraction: true,
  },
});

var swiper = new Swiper(".certified", {
  // spaceBetween: 30,
  // centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    320: {
      slidesPerView: 3,
    },
    640: {
      slidesPerView: 4,
    },
    768: {
      slidesPerView: 5,
    },
    1024: {
      slidesPerView: 6,
    }
  }
});
var swiper = new Swiper(".tesitmonial", {

  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },


});

const sideNav = document.getElementById('sideNav');
const overlay = document.getElementById('overlay');
const openNav = document.getElementById('openNav');
const closeNav = document.getElementById('closeNav');

openNav.addEventListener('click', function () {
  sideNav.style.width = '320px';
  overlay.classList.remove('hidden');
  overlay.classList.add('opacity-50');
});

function closeSideNav() {
  sideNav.style.width = '0';
  overlay.classList.remove('opacity-50');
  setTimeout(() => {
    overlay.classList.add('hidden');
  }, 300);
}

closeNav.addEventListener('click', closeSideNav);
overlay.addEventListener('click', closeSideNav);

function toggleAccordion(id) {
  const item = document.getElementById(id);
  const isHidden = item.classList.contains('hidden');
  const allItems = document.querySelectorAll('[id^="accordion-item"]');

  // Close all items
  allItems.forEach((i) => {
    i.classList.add('hidden');
    i.previousElementSibling.querySelector('svg').style.transform = 'rotate(0deg)';
  });

  // Open the clicked item
  if (isHidden) {
    item.classList.remove('hidden');
    item.previousElementSibling.querySelector('svg').style.transform = 'rotate(180deg)';
  }
}
var swiper = new Swiper(".mySwiper2", {
  slidesPerView: "auto",
  spaceBetween: 10,
});
document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper("#demotestimonial", {
    loop: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1700: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });
});


var swiper = new Swiper(".blogcontainer", {
  slidesPerView: "auto",
  spaceBetween: 20,
  loop: true,  // Enables infinite looping
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    320: {  // Mobile
      slidesPerView: 1,
      spaceBetween: 10
    },
    768: {  // Tablet
      slidesPerView: 2,
      spaceBetween: 15
    },
    1200: { // Desktop
      slidesPerView: 3,
      spaceBetween: 20
    },
    1650: { // Desktop
      slidesPerView: 4,
      spaceBetween: 20
    },

  }
});




// api script start


// api script start
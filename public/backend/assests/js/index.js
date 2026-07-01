var swiper = new Swiper(".hero", {
  autoplay: {
    delay: 3000,
    disableOnInteraction: true,
  },
});

var swiper = new Swiper(".certified", {
    // spaceBetween: 30,
    // centeredSlides: true,
    loop:true,
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

    loop:true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
   

  });
  
  const sideNav = document.getElementById('sideNav');
  const overlay = document.getElementById('overlay');
  const openNav = document.getElementById('openNav');
  const closeNav = document.getElementById('closeNav');

  openNav.addEventListener('click', function() {
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



// Check for Laravel session messages and show toast


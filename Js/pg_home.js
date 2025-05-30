const swiper = new Swiper('.swiper', {
  loop: true,
 
 
slidesPerView: 4,       // 4 cards por vez no desktop
spaceBetween: 32,       // espaçamento entre os cards
centeredSlides: true,   // centraliza o grupo de slides
slidesPerGroup: 1,      // passa 1 card por clique
 
pagination: {
  el: '.swiper-pagination',
  clickable: true,
},
 
navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},
 
breakpoints: {
  0: {
    slidesPerView: 1,
    centeredSlides: false,
    spaceBetween: 16,
  },
  640: {
    slidesPerView: 2,
    centeredSlides: true,
    spaceBetween: 24,
  },
  1024: {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 28,
  },
  1280: {
    slidesPerView: 4,
    centeredSlides: true,
    spaceBetween: 32,
  }
}
});
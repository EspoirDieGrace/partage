var swiper = new Swiper(".swiper", {
  slidesPerView: 8,
  spaceBetween: 4,
  slidesPerGroup: 8,
  loop: true,
  loopFillGroupWithBlank: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
console.log(swiper);
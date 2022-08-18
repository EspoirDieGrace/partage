var swiper = new Swiper(".mySwiper", {
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
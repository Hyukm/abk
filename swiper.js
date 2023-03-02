/*--------------------------------
  おすすめ物件
--------------------------------*/
var swiper_recommend = new Swiper('.swiper.recommend_swiper', {

  loop: true,
  slidesPerView: 1,
  spaceBetween: 0,

  // レスポンシブブレーポイント（画面幅による設定）
  breakpoints: {
    // 画面幅が 640px 以上の場合（window width >= 640px）
    // 640: {
    //   slidesPerView: 1,
    //   spaceBetween: 0
    // },
    900: {
      slidesPerView: 2,
      spaceBetween: 10
    }
  },

  navigation: {
    nextEl: '.recommend_swiper_prev',
    prevEl: '.recommend_swiper_next',
  },
});


/*--------------------------------
  お部屋詳細
--------------------------------*/

var swiper_thumbnail = new Swiper(".swiper_thumbnail", {
  slidesPerView: 5,
  spaceBetween: 8,
  freeMode: true,
  direction: "none",
  followFinger: false,
  // watchSlidesProgress: true,
  // watchSlidesVisibility: false

});

var swiper_main = new Swiper(".swiper_main", {
  effect: "fade",
  loop: false,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper_thumbnail,
  },
});
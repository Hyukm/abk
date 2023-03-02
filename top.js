/*---------------------------------
  MV スライダー
-----------------------------------*/
var swipermain = new Swiper(".Swiper.top_swiper", {
  spaceBetween: 0,
  centeredSlides: true,
  speed: 1500,
  effect: "fade",
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

/*---------------------------------
  MV スライダー 一時停止
-----------------------------------*/
jQuery(window).on('load', function () {
  jQuery('.stopbtn').on('click', function () {
    var _class = jQuery(this).attr('class');
    if (_class == 'stopbtn stop') {
      jQuery(this)
        .addClass('start')
        .removeClass('stop');
      swipermain.autoplay.stop();
    } else {
      jQuery(this)
        .addClass('stop')
        .removeClass('start');
      swipermain.autoplay.start();
    }
  });
});

/*---------------------------------
  NEWS SP スライダー
-----------------------------------*/
var swipernews = new Swiper(".swiper.news_list", {
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});

// /*---------------------------------
//   フォームの選択肢「事業用」の処理
// -----------------------------------*/
jQuery('.multi_checkbox').click(function () {
  var now = jQuery(this).prop('checked');
  console.log(now);
  jQuery(this).parent().next().prop('checked', now);
  console.log(jQuery(this).parent().next().prop('checked'));
});

// /*---------------------------------
//   検索formタグでの切り替え
// -----------------------------------*/

// PC版のフォーム
jQuery('.pc_form .top_search_tags li').click(function () {
  // activeクラスを外す
  jQuery('.top_search_tags li').removeClass("active");
  jQuery('.form_search_item').removeClass("active");
  // 該当する要素にactiveクラスを付与する
  let selected_text = jQuery(this).text()
  if (selected_text == "詳細条件でさがす") {
    jQuery('.top_search_tags li:first-child').addClass("active")
    jQuery('.form_search_item_detail').addClass("active")
  } else {
    jQuery('.top_search_tags li:last-child').addClass("active")
    jQuery('.form_search_item_easy').addClass("active")
  }
  jQuery('.form_search_content')[0].reset();
});

// SP版のフォーム
jQuery('.sp_form .top_search_tags li').click(function () {
  // activeクラスを外す
  jQuery('.top_search_tags li').removeClass("active");
  jQuery('.form_search_item').removeClass("active");
  // 該当する要素にactiveクラスを付与する
  let selected_text = jQuery(this).text()
  if (selected_text == "詳細条件でさがす") {
    jQuery('.top_search_tags li:first-child').addClass("active")
    jQuery('.form_search_item_detail').addClass("active")
  } else {
    jQuery('.top_search_tags li:last-child').addClass("active")
    jQuery('.form_search_item_easy').addClass("active")
  }
  jQuery('.form_search_content.sp_form')[0].reset();
});
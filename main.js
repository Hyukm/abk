/*--------------------------------
  ハンバーガー
--------------------------------*/
jQuery(".navToggle").click(function () {
  jQuery(this).toggleClass('active');
});

jQuery(".navToggle").click(function () {
  jQuery(".globalMenu").toggleClass('active');
});

jQuery(".navToggle").click(function () {
  jQuery(".overlay").toggleClass('active');
});

jQuery(".navToggle").click(function () {
  jQuery(".pc_fixation").toggleClass('active');
});

//ハンバーガーメニュー領域外をクリックしたときの動作
jQuery(document).ready(function (jQuery) {
  var nav = jQuery('.navToggle');
  jQuery('.overlay').click(function () {
    //ここでnavの部分がactiveクラスを持っているか確認
    if (nav.hasClass('active')) {
      jQuery('.navToggle').removeClass('active');
    }
  });

  var nav = jQuery('.globalMenu');
  jQuery('.overlay').click(function () {
    if (nav.hasClass('active')) {
      jQuery('.globalMenu').removeClass('active');
    }
  });

  var nav = jQuery('.overlay');
  jQuery('.overlay').click(function () {
    if (nav.hasClass('active')) {
      jQuery('.overlay').removeClass('active');
    }
  });

  var nav = jQuery('.pc_fixation');
  jQuery('.overlay').click(function () {
    if (nav.hasClass('active')) {
      jQuery('.pc_fixation').removeClass('active');
    }
  });
});



/*--------------------------------
  アコーディオン
--------------------------------*/
jQuery('.title').on('click', function () {
  var findElm = jQuery(this).parents('.accordion_title').next('.box');
  jQuery(findElm).slideToggle(); //アコーディオンの上下動作

  if (jQuery(this).hasClass('close')) {
    jQuery(this).removeClass('close');
    jQuery(this).parents('.accordion_title').removeClass('close');
  } else {
    jQuery(this).addClass('close');
    jQuery(this).parents('.accordion_title').addClass('close');
  }
});


/*--------------------------------
  the_content 表 背景色
--------------------------------*/
jQuery("td:has(.table_title)").addClass("td_table_title");


/*--------------------------------
  MV上のみheader透明化
--------------------------------*/
// ⇩トップのみの条件を追加予定
// if( is_home() || is_front_page() ){ // トップページの時
//   jQuery(window).on('load resize', function(){
//   var winW = jQuery(window).width();
//   var devW = 640;
//     if (winW > devW) { // 641px以上の時
//       jQuery(window).scroll(function(){
//         if (jQuery(window).scrollTop() < 800) {
//           jQuery('.header_line').addClass('mv');
//         } else {
//           jQuery('.header_line').removeClass('mv');
//         }
//       });
//     }
//   });
// };


// jQuery(window).on('load resize', function(){
//   let path = location.href;
//   let top = is_front_page();
//   let width = jQuery(window).width();
//   if (path == "http://192.168.21.50/ABK/" && width > 640) {
//     jQuery(window).scroll(function(){
//       if (jQuery(window).scrollTop() < 800) {
//         jQuery('.header_line').addClass('mv');
//       } else {
//         jQuery('.header_line').removeClass('mv');
//       }
//     });
//   }
// });

/*--------------------------------
  エリアでさがす タブメニュー
--------------------------------*/

jQuery(function () {
  jQuery('.tab_menu li').click(function () {
    var index = jQuery('.tab_menu li').index(this);
    jQuery('.tab_contents > div').css('display', 'none');
    jQuery('.tab_contents > div').eq(index).fadeIn("slow");
    jQuery('.tab_menu li').removeClass('selected');
    jQuery(this).addClass('selected')
  });
});


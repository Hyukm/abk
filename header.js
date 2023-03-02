/*--------------------------------
  MV上のみheader透明化
--------------------------------*/
jQuery(window).on('load resize', function(){
var winW = jQuery(window).width();
var devW = 640;
  if (winW > devW) { // 641px以上の時
    jQuery(window).scroll(function(){
      if (jQuery(window).scrollTop() > 800) {
        jQuery('.header_line').addClass('mv');
      } else {
        jQuery('.header_line').removeClass('mv');
      }
    });
  }
});

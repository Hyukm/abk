<?php if (!(is_front_page() || is_singular('building') || is_page('for_owner'))) { ?>
    <section class="sec_contact footer_margin">
        <div class="wrapper flex">
            <div class="contact_left">
                <div class="contact_title">
                    <h2>お問い合わせ</h2>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/CONTACT.svg" alt="">
                    </div>
                </div>
                <div class="contact_information">
                    <div><span>Tel</span><span>045-252-7077</span></div>
                    <div>
                        <span>営業時間：09:00〜18:00</span>
                        <span>定休日：日曜日</span>
                    </div>
                </div>
            </div>
            <div class="contact_card">
                <div class="contact_card_inner">
                    <p>詳しい情報や現在の空室状況など、<br>お気軽にお問い合わせ下さい。</p>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn_arrow btn_yellow">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_contact_2.svg" alt=""><span>お問い合わせはこちら</span></div>
                    </a>
                </div>
                <span class="contact_card_corner_1"></span><span class="contact_card_corner_2"></span>
            </div>
        </div>
    </section>
<?php } ?>
<footer>
    <div class="wrapper">
        <div class="footer_content">
            <div class="footer_info">
                <div class="footer_info_top">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="株式会社ABK" class="footer_logo">
                    </a>
                    <div>
                        <p>
                            株式会社エー・ビー・ケー<br>
                            9:00~18:00（日曜定休日）
                        </p>
                        <p class="footer_address">
                            〒231-0045<br>
                            <a href="https://www.google.co.jp/maps/place/%E3%82%A8%E3%83%BC%E3%83%93%E3%83%BC%E3%82%B1%E3%83%BC/@35.4399979,139.6248118,17z/data=!3m1!5s0x60185c8c50cf0e61:0x7ff69f74fc6cf75f!4m9!1m2!2m1!1z56We5aWI5bed55yM5qiq5rWc5biC5Lit5Yy6IOS8iuWLouS9kOacqOeUujUtMTMwIOesrDEy5puZ44OT44OrMUY!3m5!1s0x60185c8c508c9ba9:0x3176b9d5522a1269!8m2!3d35.440024!4d139.626965!15sCkHnpZ7lpYjlt53nnIzmqKrmtZzluILkuK3ljLog5LyK5Yui5L2Q5pyo55S6NS0xMzAg56ysMTLmm5njg5Pjg6sxRlpPIk3npZ7lpYjlt50g55yMIOaoqua1nCDluIIg5LitIOWMuiDkvIrli6Ig5L2QIOacqOeUuiA1IDEzMCDnrKwgMTIg5puZIOODk-ODqyAxZpIBGXJlYWxfZXN0YXRlX3JlbnRhbF9hZ2VuY3ngAQA?hl=ja">
                                神奈川県横浜市中区<br class="pc_only">伊勢佐木町5-130<br class="sp_only">
                                第12曙ビル1F
                            </a>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_area.svg" alt="">
                        </p>
                    </div>
                </div>
                <div class="footer_info_bottom">
                    <a href="tel:045-252-7077">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tel.svg" alt="電話番号">
                        <span class="footer_tel font_YuMincho">045-252-7077</span>
                    </a>
                    <span class="footer_fax">FAX : 045-231-1633</span>
                </div>
            </div>
            <div class="footer_menu">
                <div class="pc_only">
                    <ul class="footer_line footer_menu_left">
                        <li class="footer_list">
                            <span>お部屋をさがす</span>
                            <ul class="footer_list_detail">
                                <li>
                                    <a href="<?php echo esc_url(home_url('/special/')); ?>">こだわりでさがす</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/location/')); ?>">エリア・地図でさがす</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/station/')); ?>">沿線・駅でさがす</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/?s=&detailedSearch#search_detail_form')); ?>">賃料でさがす</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/list/')); ?>">全物件一覧</a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/for_owner/')); ?>">
                                <span>管理会社をお探しのオーナー様へ</span>
                            </a>
                        </li>
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/for_beginners/')); ?>">
                                <span>不動産お役立ち情報</span>
                            </a>
                            <ul class="footer_list_detail">
                                <li>
                                    <a href="<?php echo esc_url(home_url('/for_beginners/move_into/')); ?>">入居準備マニュアル</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/for_beginners/glossary/')); ?>">不動産用語集</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/for_beginners/move_out/')); ?>">退去の流れ</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/for_beginners/flow/')); ?>">ご契約の流れ</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/for_beginners/point/')); ?>">お部屋探しのポイント</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="footer_line footer_menu_middle">
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/company/')); ?>">
                                <span>会社概要</span>
                            </a>
                            <ul class="footer_list_detail">
                                <li>
                                    <a href="<?php echo esc_url(home_url('/company/staff/')); ?>">スタッフ紹介</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/company/tranc/')); ?>">トランクルーム</a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/news/')); ?>">
                                <span>お知らせ</span>
                            </a>
                        </li>
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                                <span>お問い合わせ</span>
                            </a>
                            <ul class="footer_list_detail">
                                <li>
                                    <a href="<?php echo esc_url(home_url('/reserve/')); ?>">ご来店予約</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/request/')); ?>">物件リクエスト</a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/favorite/')); ?>">
                                <span>お気に入り</span>
                            </a>
                        </li>
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/history/')); ?>">
                                <span>閲覧履歴</span>
                            </a>
                        </li>
                        <li class="footer_list">
                            <a href="<?php echo esc_url(home_url('/privacy/')); ?>">
                                <span>個人情報保護方針</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="footer_line footer_menu_right">
                        <li class="footer_list">
                            <span>グループ会社</span>
                            <ul class="footer_list_detail">
                                <li>
                                    <a href='https://www.yokohama-weekly.jp/'>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer1.jpg" alt="横浜ウィークリーマンションワイルーム">
                                    </a>
                                </li>
                                <li>
                                    <a href='http://www.abk.co.jp/'>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer2.jpg" alt="横浜ウィークリーマンション">
                                    </a>
                                </li>
                                <li>
                                    <a href='http://www.abk.jp/'>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer3.jpg" alt="イーフラット　コストパフォーマンス重視のあなたに">
                                    </a>
                                </li>
                                <li>
                                    <a href='http://www.ywmm.jp/'>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer4.jpg" alt="法人専用横浜マンスリーマンション">
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="sp_only">
                    <ul class="accordion-area">
                        <li>
                            <div class="accordion_title">
                                <span class="title">お部屋を探す</span>
                            </div>
                            <div class="box">
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/special/')); ?>">こだわりでさがす</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/location/')); ?>">エリア・地図でさがす</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/station/')); ?>">沿線・駅でさがす</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/?s=&detailedSearch#search_detail_form')); ?>">賃料でさがす</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/list/')); ?>">全物件一覧</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="no_accordion">
                            <a href="<?php echo esc_url(home_url('/for_owner/')); ?>">管理会社をお探しのオーナー様へ</a>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <a href="<?php echo esc_url(home_url('/for_beginners/')); ?>">不動産お役立ち情報</a><span class="title"></span>
                            </div>
                            <div class="box">
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/for_beginners/move_into/')); ?>">入居準備マニュアル</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/for_beginners/glossary/')); ?>">不動産用語集</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/for_beginners/move_out/')); ?>">退去の流れ</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/for_beginners/flow/')); ?>">ご契約の流れ</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/for_beginners/point/')); ?>">お部屋探しのポイント</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <a href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a><span class="title"></span>
                            </div>
                            <div class="box">
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/company/staff/')); ?>">スタッフ紹介</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/company/tranc/')); ?>">トランクルーム</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="no_accordion">
                            <a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a><span class="title"></span>
                            </div>
                            <div class="box">
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/reserve/')); ?>">ご来店予約</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/request/')); ?>">物件リクエスト</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="no_accordion">
                            <a href="<?php echo esc_url(home_url('/favorite/')); ?>">お気に入り</a>
                        </li>
                        <li class="no_accordion">
                            <a href="<?php echo esc_url(home_url('/history/')); ?>">閲覧履歴</a>
                        </li>
                        <li class="no_accordion">
                            <a href="<?php echo esc_url(home_url('/privacy/')); ?>">個人情報保護方針</a>
                        </li>
                    </ul>
                    <ul class="footer_banner">
                        <li>
                            <a href='https://www.yokohama-weekly.jp/'>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer1.jpg" alt="横浜ウィークリーマンションワイルーム">
                            </a>
                        </li>
                        <li>
                            <a href='http://www.abk.jp/'>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer3.jpg" alt="イーフラット　コストパフォーマンス重視のあなたに">
                            </a>
                        </li>
                        <li>
                            <a href='http://www.abk.co.jp/'>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer2.jpg" alt="横浜ウィークリーマンション">
                            </a>
                        </li>
                        <li>
                            <a href='http://www.ywmm.jp/'>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer4.jpg" alt="法人専用横浜マンスリーマンション">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p class="copyright">
        <small>©2022 ABK Co.,Ltd.</small>
    </p>
    <div class="cookie_content hidden" id="cookie">
        <div>
            <p>当サイトではお客様により良いサービスを提供するため、Cookieを使用しています。<br>当サイトをご利用いただく際には、当社の<span><a href="<?php echo esc_url(home_url('/cookie/')); ?>">クッキーポリシー</a></span>に同意いただいたものとみなします。</p>
        </div>
        <button class="cookie_btn">
            <span>同意して閉じる</span>
        </button>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
    <meta charset="utf-8">
    <?php /*<title>株式会社ABK</title>*/ ?>
    <meta property="og:image" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ファビコン -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <!-- アップルタッチアイコン -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">

    <?php wp_head() ?>
</head>

<body class="pc_fixation">
    <header>
        <?php
        $ua = $_SERVER['HTTP_USER_AGENT'];
        if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
        ?>
            <div class="header_line mv">
            <?php } else { ?>
                <div class="header_line">
                <?php } ?>
                <div class="overlay"></div>
                <div class="header_left">
                    <div class="header_logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="株式会社ABK">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_white.png" alt="株式会社ABK">
                        </a>
                    </div>
                </div>
                <div class="header_right">
                    <a href="<?php echo esc_url(home_url('/for_owner/')); ?>" class="header_link_owner">管理会社をお探しの<br>オーナー様へ</a>
                    <nav>
                        <ul class="global_menu">
                            <li class="global_menu_list">
                                <a href="<?php echo esc_url(home_url('/history/')); ?>">
                                    <img class="top_nav_icon" src="<?php echo get_template_directory_uri(); ?>/img/icon_history.svg" alt="">
                                    <span>閲覧履歴</span>
                                </a>
                            </li>
                            <li class="global_menu_list">
                                <a href="<?php echo esc_url(home_url('/favorite/')); ?>">
                                    <img class="top_nav_icon" src="<?php echo get_template_directory_uri(); ?>/img/icon_favorite.svg" alt="">
                                    <span>お気に入り</span>
                                </a>
                            </li>
                        </ul>
                        <div class="navToggle">
                            <span></span>
                            <span></span>
                            <span>MENU</span>
                        </div>
                        <nav class="globalMenu">
                            <div class="hum_content">
                                <div class="hum_image">
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM1.jpg" alt="横浜の風景"> -->
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM2.jpg" alt="横浜の風景"> -->
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM3.jpg" alt="横浜の風景"> -->
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM4.jpg" alt="横浜の風景"> -->
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM5.jpg" alt="横浜の風景"> -->
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM6.jpg" alt="横浜の風景"> -->
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM7.jpg" alt="横浜の風景"> -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/img_HM8.jpg" alt="横浜の風景">
                                    <div class="hum_inner">
                                        <p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tel.svg" alt="">
                                            <span class="font_YuMincho">045-252-7077</span>
                                        </p>
                                        <a href="<?php echo esc_url(home_url('/reserve/')); ?>" class="hum_btn font_YuMincho">ご来店予約はこちら</a>
                                        <a href="<?php echo esc_url(home_url('/request/')); ?>" class="hum_btn font_YuMincho">物件リクエストはこちら</a>
                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hum_inner_contact hum_btn font_YuMincho">お問い合わせはこちら</a>
                                    </div>
                                </div>
                                <div class="hum_menu">
                                    <div class="hum_menu_inner">
                                        <div class="hum_menu_favorite">
                                            <div class="hum_menu_title">
                                                <h2 class="font_YuMincho">Search<span>お部屋検索</span></h2>
                                            </div>
                                            <div class="hum_yellow">
                                                <a class="hum_favorite font_YuMincho" href="<?php echo esc_url(home_url('/history/')); ?>">閲覧履歴</a>
                                                <a class="hum_favorite font_YuMincho" href="<?php echo esc_url(home_url('/favorite/')); ?>">お気に入り</a>
                                            </div>
                                        </div>
                                        <ul class="simple_search_list">
                                            <li>
                                                <a href="<?php echo esc_url(home_url('/special/')); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_choosy.svg" alt="">
                                                    <span class="font_YuMincho">こだわりでさがす</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url(home_url('/location/')); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_area.svg" alt="">
                                                    <span class="font_YuMincho">エリア・地図でさがす</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url(home_url('/station/')); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train_blue.svg" alt="">
                                                    <span class="font_YuMincho">沿線・駅でさがす</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url(home_url('/?s=&detailedSearch#search_detail_form')); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_rent.svg" alt="">
                                                    <span class="font_YuMincho">賃料でさがす</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="accordion-area font_YuMincho">
                                            <li class="no_accordion">
                                                <a href="<?php echo esc_url(home_url('/list/')); ?>">全物件一覧</a>
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
                                            <li class="no_accordion">
                                                <a href="<?php echo esc_url(home_url('/privacy/')); ?>">個人情報保護方針</a>
                                            </li>
                                        </ul>
                                        <div class="hum_inner sp_only">
                                            <p>
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tel.svg" alt="">
                                                <span class="font_YuMincho">045-252-7077</span>
                                            </p>
                                            <a href="<?php echo esc_url(home_url('/reserve/')); ?>" class="hum_btn font_YuMincho">ご来店予約はこちら</a>
                                            <a href="<?php echo esc_url(home_url('/request/')); ?>" class="hum_btn font_YuMincho">物件リクエストはこちら</a>
                                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hum_inner_contact hum_btn font_YuMincho">お問い合わせはこちら</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </nav>
                </div>
                </div>
    </header>
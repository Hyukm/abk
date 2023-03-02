<?php
/*
Template Name: トップページ
*/
?>
<?php
// -------------------------------------------------------------------------------------------------
// 定数定義　検索条件key
// -------------------------------------------------------------------------------------------------
// 所在地
const LOCATION = "location";
// 交通機関
const STATION = "station";
// 建物種別
const BUILDING_TYPE = "building_type_2";
// 賃料
const LOW_PRICE = "low_price";
const HIGH_PRICE = "high_price";
// 敷金・礼金・保証金0
const ZERO_MONEY = "zero_money";
// 間取りタイプ
const FLOOR_PLAN_TYPE = "floor_plan_type";
// 専有面積
const LOW_AREA = "low_area";
const HIGH_AREA = "high_area";
// 設備情報
const EQUIPMENTS = "equipments";
// 駅徒歩
const WALK_TIME_TO_STATION = "walk_time_to_station";
// 築年数
const BUILDING_OLD = "building_old";
// 契約内容
const CONTRACT_DETAILS = "contract_details";
// こだわりカテゴリー
const SPECIAL_CAT = "special_cat";
// 並び替え
const ORDER = "order";
// カンタン検索
const EASY_SEARCH = "easy_search";
// ------------------------------------------------------------------------------
// 検索に関連するCookieを削除する
// ------------------------------------------------------------------------------
// 所在地
delCookie(LOCATION);
// 交通機関
delCookie(STATION);
// 建物種別
delCookie(BUILDING_TYPE);
// 賃料
delCookie(LOW_PRICE);
delCookie(HIGH_PRICE);
// 敷金・礼金・保証金0
delCookie(ZERO_MONEY);
// 間取りタイプ
delCookie(FLOOR_PLAN_TYPE);
// 専有面積
delCookie(LOW_AREA);
delCookie(HIGH_AREA);
// 設備情報
delCookie(EQUIPMENTS);
// 駅徒歩
delCookie(WALK_TIME_TO_STATION);
// 築年数
delCookie(BUILDING_OLD);
// 契約内容
delCookie(CONTRACT_DETAILS);
// こだわりカテゴリー
delCookie(SPECIAL_CAT);
// 並び替え
delCookie(ORDER);
// カンタン検索
delCookie(EASY_SEARCH);
?>
<?php get_header(); ?>
<main>
    <section class="sec_top">
        <div class="top_img">
            <div class="Swiper top_swiper">
                <div class="swiper-wrapper">
                    <?php
                    $customFields = get_post_custom();
                    ?>
                    <?php if ($customFields["mv1_mv_img"][0] != "") : ?>
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            // カスタムフィールド（get_post_custom）出力
                            // PC画像
                            $mv_img_id = $customFields["mv${i}_mv_img"][0];
                            $src = wp_get_attachment_image_src($mv_img_id, 'full');
                            // SP画像
                            $sp_mv_img_id = $customFields["mv${i}_sp_mv_img"][0];
                            $sp_src = wp_get_attachment_image_src($sp_mv_img_id, 'full');
                            // alt
                            $alt = get_post_meta($mv_img_id, '_wp_attachment_image_alt', true);
                            $sp_alt = get_post_meta($sp_mv_img_id, '_wp_attachment_image_alt', true);
                            // ACF出力
                            // キャッチコピー
                            $group = get_field("mv${i}");
                            $mv_catch_copy = $group["mv_catch_copy"];
                            // ボタンテキスト
                            $mv_button_text = $group["mv_button_text"];
                            // リンクURL
                            $mv_link = $group["mv_link"];
                        ?>

                            <?php if (!empty($mv_img_id)) { ?>
                                <a class="swiper-slide slider-item" href="<?php echo $mv_link; ?>">
                                    <div class="swiper-slide slider-item">
                                        <?php
                                        $ua = $_SERVER['HTTP_USER_AGENT'];
                                        $browser = ((strpos($ua, 'iPhone') !== false) || (strpos($ua, 'iPod') !== false) || (strpos($ua, 'Android') !== false));
                                        if ($browser == true) {
                                            $browser = 'sp';
                                        }
                                        if ($browser == 'sp') {
                                        ?>
                                            <!-- SP用 -->
                                            <img src="<?php echo $sp_src[0]; ?>" alt="<?php echo $sp_alt; ?>">
                                        <?php } else { ?>
                                            <!-- TB・PC用 -->
                                            <img src="<?php echo $src[0]; ?>" alt="<?php echo $alt; ?>">
                                        <?php } ?>
                                        <h1 class="font_YuMincho top_text"><span><?php echo $mv_catch_copy; ?></span></h1>
                                        <div class="btn_line btn_arrow">
                                            <img src="<?php echo $src[0]; ?>" alt="<?php echo $alt; ?>">
                                            <div>
                                                <p><?php echo $mv_button_text; ?></p><span>View</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    <?php endif ?>
                </div>
                <div class="top_swiper_pagination">
                    <!-- ページネーション -->
                    <div class="swiper-pagination"></div>
                    <!-- 停止ボタン -->
                    <p class="stopbtn stop"></p>
                </div>
            </div>
        </div>
        <div class="scrolldown1">
            <span>Scroll</span>
        </div>
    </section>
    <section class="sec_search">
        <div class="wrapper">
            <div class="top_search">
                <div class="search_title">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_search.svg" alt="">
                    <h2 class="font_YuMincho">物件をさがす</h2>
                </div>
                <ul class="search_menu">
                    <li class="search_conditions">
                        <a href="<?php echo esc_url(home_url('/special/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_choosy.svg" alt="">
                            <div>
                                <span>こだわり</span><span>でさがす</span>
                            </div>
                        </a>
                    </li>
                    <li class="search_conditions">
                        <a href="<?php echo esc_url(home_url('/location/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_area.svg" alt="">
                            <div>
                                <span>エリア・地図</span><span>でさがす</span>
                            </div>
                        </a>
                    </li>
                    <li class="search_conditions">
                        <a href="<?php echo esc_url(home_url('/station/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train _blue.svg" alt="">
                            <div>
                                <span>沿線・駅</span><span>でさがす</span>
                            </div>
                        </a>
                    </li>
                    <li class="search_conditions">
                        <a href="<?php echo esc_url(home_url('/?s=&detailedSearch#search_detail_form')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_rent.svg" alt="">
                            <div>
                                <span>賃料</span><span>でさがす</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <form class="form_search_content pc_form" action="<?php echo home_url(); ?>">
                <!-- タグ -->
                <ul class="top_search_tags">
                    <li class="top_search_tag active">詳細条件でさがす</li>
                    <li class="top_search_tag">カンタン検索</li>
                </ul>
                <!-- 検索するためには必要 -->
                <input type="hidden" name="s" id="s" value="">
                <!-- 他の画面からの検索かどうかを判断するためのデータ -->
                <input id="detailedSearch" name="detailedSearch" type="hidden" value="true">
                <div class="form_search_item form_search_item_detail active">
                    <div class="search_item_column">
                        <span class="search_detail">建物種別</span>
                        <ul>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="building_type_2[]" value="mansion">
                                    <span class="item_detail">マンション</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="building_type_2[]" value="apartment">
                                    <span class="item_detail">アパート</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="building_type_2[]" value="detached_house">
                                    <span class="item_detail">戸建</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input class="multi_checkbox" type="checkbox" name="building_type_2[]" value="office">
                                    <span class="item_detail">事業用</span>
                                </label>
                                <input type="checkbox" name="building_type_2[]" value="store">
                            </li>
                        </ul>
                    </div>
                    <div class="search_item_row">
                        <span class="two_letters">賃料</span>
                        <div class="content_right">
                            <div class="form_select">
                                <select name="low_price">
                                    <option value="">選択してください</option>
                                    <option value="下限なし">下限なし</option>
                                    <option value="30000">3万円</option>
                                    <option value="35000">3.5万円</option>
                                    <option value="40000">4万円</option>
                                    <option value="45000">4.5万円</option>
                                    <option value="50000">5万円</option>
                                    <option value="55000">5.5万円</option>
                                    <option value="60000">6万円</option>
                                    <option value="65000">6.5万円</option>
                                    <option value="70000">7万円</option>
                                    <option value="75000">7.5万円</option>
                                    <option value="80000">8万円</option>
                                    <option value="85000">8.5万円</option>
                                    <option value="90000">9万円</option>
                                    <option value="95000">9.5万円</option>
                                    <option value="100000">10万円</option>
                                    <option value="105000">10.5万円</option>
                                    <option value="110000">11万円</option>
                                    <option value="115000">11.5万円</option>
                                    <option value="120000">12万円</option>
                                    <option value="125000">12.5万円</option>
                                    <option value="130000">13万円</option>
                                    <option value="135000">13.5万円</option>
                                    <option value="140000">14万円</option>
                                    <option value="145000">14.5万円</option>
                                    <option value="150000">15万円</option>
                                    <option value="200000">20万円</option>
                                    <option value="250000">25万円</option>
                                    <option value="300000">30万円</option>
                                    <option value="400000">40万円</option>
                                    <option value="500000">50万円</option>
                                    <option value="1000000">100万円</option>
                                </select>
                            </div>
                            <div class="bar_limit">
                                <span>～</span>
                            </div>
                            <div class="form_select">
                                <select name="high_price">
                                    <option value="">選択してください</option>
                                    <option value="30000">3万円</option>
                                    <option value="35000">3.5万円</option>
                                    <option value="40000">4万円</option>
                                    <option value="45000">4.5万円</option>
                                    <option value="50000">5万円</option>
                                    <option value="55000">5.5万円</option>
                                    <option value="60000">6万円</option>
                                    <option value="65000">6.5万円</option>
                                    <option value="70000">7万円</option>
                                    <option value="75000">7.5万円</option>
                                    <option value="80000">8万円</option>
                                    <option value="85000">8.5万円</option>
                                    <option value="90000">9万円</option>
                                    <option value="95000">9.5万</option>
                                    <option value="100000">10万円</option>
                                    <option value="105000">10.5万円</option>
                                    <option value="110000">11万円</option>
                                    <option value="115000">11.5万円</option>
                                    <option value="120000">12万円</option>
                                    <option value="125000">12.5万円</option>
                                    <option value="130000">13万円</option>
                                    <option value="135000">13.5万円</option>
                                    <option value="140000">14万円</option>
                                    <option value="145000">14.5万円</option>
                                    <option value="150000">15万円</option>
                                    <option value="200000">20万円</option>
                                    <option value="250000">25万円</option>
                                    <option value="300000">30万円</option>
                                    <option value="400000">40万円</option>
                                    <option value="500000">50万円</option>
                                    <option value="1000000">100万円</option>
                                    <option value="上限なし">上限なし</option>
                                </select>
                            </div>
                            <ul>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="zero_money" value="敷金・礼金・保証金0" id="敷金・礼金・保証金0">
                                        <span class="item_detail">敷金・礼金・保証金0</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="search_item_row">
                        <span class="search_detail">築年数</span>
                        <div class="form_select select_single">
                            <select name="building_old">
                                <option value="">指定無し</option>
                                <option value="3">3年以内</option>
                                <option value="5">5年以内</option>
                                <option value="10">10年以内</option>
                            </select>
                        </div>
                    </div>
                    <div class="search_item_row">
                        <span class="search_detail">
                            駅徒歩
                        </span>
                        <div class="form_select select_single">
                            <select name="walk_time_to_station">
                                <option value="">指定無し</option>
                                <option value="5">5分以内</option>
                                <option value="7">7分以内</option>
                                <option value="10">10分以内</option>
                                <option value="15">15分以内</option>
                            </select>
                        </div>
                    </div>
                    <div class="search_item_column">
                        <span class="search_detail">間取り</span>
                        <div>
                            <ul>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="1r" id="1R">
                                        <span class="item_detail">1R</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="1k" id="1K">
                                        <span class="item_detail">1K</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="1dk" id="1DK">
                                        <span class="item_detail">1DK</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="1ldk" id="1LDK">
                                        <span class="item_detail">1LDK</span>
                                    </label>
                            </ul>
                            <ul>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="2k" id="2K">
                                        <span class="item_detail">2K</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="2dk" id="2DK">
                                        <span class="item_detail">2DK</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="2ldk" id="2lDK">
                                        <span class="item_detail">2LDK</span>
                                    </label>
                                </li>
                            </ul>
                            <ul>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="3k" id="3K">
                                        <span class="item_detail">3K</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="3dk" id="3DK">
                                        <span class="item_detail">3DK</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="3ldk" id="3lDK">
                                        <span class="item_detail">3LDK</span>
                                    </label>
                                </li>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="floor_plan_type[]" value="over4k" id="4K~">
                                        <span class="item_detail">4K～</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="search_item_column">
                        <span class="two_letters">設備</span>
                        <ul>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="equipments[]" value="2階以上" id="2階以上">
                                    <span class="item_detail">2階以上</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="equipments[]" value="オートロック" id="オートロック">
                                    <span class="item_detail">オートロック</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="equipments[]" value="バス・トイレ別" id="バス・トイレ別">
                                    <span class="item_detail">バス・トイレ別</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="equipments[]" value="駐車場有" id="駐車場有">
                                    <span class="item_detail">駐車場有</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="equipments[]" value="pet" id="ペット相談">
                                    <span class="item_detail">ペット相談</span>
                                </label>
                            </li>
                            <li class="search_detail_list">
                                <label>
                                    <input type="checkbox" name="equipments[]" value="室内洗濯機置場" id="室内洗濯機置場">
                                    <span class="item_detail">室内洗濯機置場</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form_search_item form_search_item_easy">
                    <div class="search_item_column">
                        <span class="search_detail">カンタン検索条件</span>
                        <ul>
                            <?php
                            $easy_searchs = get_terms("easy_search", array('hide_empty' => true, 'parent' => 0));
                            foreach ($easy_searchs as $easy_search) : ?>
                                <li class="search_detail_list">
                                    <label>
                                        <input type="checkbox" name="easy_search[]" value="<?php echo $easy_search->slug ?>" id="<?php echo $easy_search->name ?>">
                                        <span class="item_detail"><?php echo $easy_search->name ?></span>
                                    </label>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>

                <div class="button">
                    <button class="btn_blue btn_arrow font_YuMincho">お部屋を検索する</button>
                </div>
            </form>
            <form class="form_search_content sp_form" action="<?php echo home_url(); ?>">
                <!-- タグ -->
                <ul class="top_search_tags">
                    <li class="top_search_tag active">詳細条件でさがす</li>
                    <li class="top_search_tag">カンタン検索</li>
                </ul>
                <!-- 検索するためには必要 -->
                <input type="hidden" name="s" id="s" value="">
                <!-- 他の画面からの検索かどうかを判断するためのデータ -->
                <input id="detailedSearch" name="detailedSearch" type="hidden" value="true">

                <div class="sp_only form_search_item form_search_item_detail active">
                    <ul class="accordion-area">
                        <li>
                            <div class="accordion_title">
                                <span class="title">建物種別</span>
                            </div>
                            <div class="box">
                                <ul>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="building_type_2" value="mansion">
                                            <span class="item_detail">マンション</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="building_type_2" value="apartment">
                                            <span class="item_detail">アパート</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="building_type_2" value="detached_house">
                                            <span class="item_detail">戸建</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input class="multi_checkbox" type="checkbox" name="building_type_2[]" value="office">
                                            <span class="item_detail">事業用</span>
                                        </label>
                                        <input type="checkbox" name="building_type_2[]" value="store">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <span class="title">賃料</span>
                            </div>
                            <div class="box sp_select">
                                <ul>
                                    <li>
                                        <select name="low_price">
                                            <option value="">選択してください</option>
                                            <option value="下限なし">下限なし</option>
                                            <option value="30000">3万円</option>
                                            <option value="35000">3.5万円</option>
                                            <option value="40000">4万円</option>
                                            <option value="45000">4.5万円</option>
                                            <option value="50000">5万円</option>
                                            <option value="55000">5.5万円</option>
                                            <option value="60000">6万円</option>
                                            <option value="65000">6.5万円</option>
                                            <option value="70000">7万円</option>
                                            <option value="75000">7.5万円</option>
                                            <option value="80000">8万円</option>
                                            <option value="85000">8.5万円</option>
                                            <option value="90000">9万円</option>
                                            <option value="95000">9.5万</option>
                                            <option value="100000">10万円</option>
                                            <option value="105000">10.5万円</option>
                                            <option value="110000">11万円</option>
                                            <option value="115000">11.5万円</option>
                                            <option value="120000">12万円</option>
                                            <option value="125000">12.5万円</option>
                                            <option value="130000">13万円</option>
                                            <option value="135000">13.5万円</option>
                                            <option value="140000">14万円</option>
                                            <option value="145000">14.5万円</option>
                                            <option value="150000">15万円</option>
                                            <option value="200000">20万円</option>
                                            <option value="250000">25万円</option>
                                            <option value="300000">30万円</option>
                                            <option value="400000">40万円</option>
                                            <option value="500000">50万円</option>
                                            <option value="1000000">100万円</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="high_price">
                                            <option value="">選択してください</option>
                                            <option value="30000">3万円</option>
                                            <option value="35000">3.5万円</option>
                                            <option value="40000">4万円</option>
                                            <option value="45000">4.5万円</option>
                                            <option value="50000">5万円</option>
                                            <option value="55000">5.5万円</option>
                                            <option value="60000">6万円</option>
                                            <option value="65000">6.5万円</option>
                                            <option value="70000">7万円</option>
                                            <option value="75000">7.5万円</option>
                                            <option value="80000">8万円</option>
                                            <option value="85000">8.5万円</option>
                                            <option value="90000">9万円</option>
                                            <option value="95000">9.5万</option>
                                            <option value="100000">10万円</option>
                                            <option value="105000">10.5万円</option>
                                            <option value="110000">11万円</option>
                                            <option value="115000">11.5万円</option>
                                            <option value="120000">12万円</option>
                                            <option value="125000">12.5万円</option>
                                            <option value="130000">13万円</option>
                                            <option value="135000">13.5万円</option>
                                            <option value="140000">14万円</option>
                                            <option value="145000">14.5万円</option>
                                            <option value="150000">15万円</option>
                                            <option value="200000">20万円</option>
                                            <option value="250000">25万円</option>
                                            <option value="300000">30万円</option>
                                            <option value="400000">40万円</option>
                                            <option value="500000">50万円</option>
                                            <option value="1000000">100万円</option>
                                            <option value="上限なし">上限なし</option>
                                        </select>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="zero_money" value="敷金・礼金・保証金0" id="敷金・礼金・保証金0">
                                            <span class="item_detail">敷金・礼金・保証金0</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <span class="title">築年数</span>
                            </div>
                            <div class="box sp_select">
                                <ul>
                                    <li>
                                        <select name="building_old">
                                            <option value="">指定無し</option>
                                            <option name="building_old" value="3" id="3年未満">3年以内</option>
                                            <option name="building_old" value="5" id="5年未満">5年以内</option>
                                            <option name="building_old" value="10" id="10年未満">10年以内</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <span class="title">駅徒歩</span>
                            </div>
                            <div class="box sp_select">
                                <ul>
                                    <li>
                                        <select name="walk_time_to_station">
                                            <option value="" id="駅徒歩_指定しない">指定無し</option>
                                            <option value="5" id="5分以内">5分以内</option>
                                            <option value="7" id="7分以内">7分以内</option>
                                            <option value="10" id="10分以内">10分以内</option>
                                            <option value="15" id="15分以内">15分以内</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <span class="title">間取り</span>
                            </div>
                            <div class="box">
                                <ul>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="1r" id="1R">
                                            <span class="item_detail">1R</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="1k" id="1K">
                                            <span class="item_detail">1K</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="1dk" id="1DK">
                                            <span class="item_detail">1DK</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="1ldk" id="1LDK">
                                            <span class="item_detail">1LDK</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="2k" id="2K">
                                            <span class="item_detail">2K</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="2dk" id="2DK">
                                            <span class="item_detail">2DK</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="2ldk" id="2lDK">
                                            <span class="item_detail">2LDK</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="3k" id="3K">
                                            <span class="item_detail">3K</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="3dk" id="3DK">
                                            <span class="item_detail">3DK</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="3ldk" id="3lDK">
                                            <span class="item_detail">3LDK</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="floor_plan_type[]" value="over4k" id="4K~">
                                            <span class="item_detail">4K〜</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion_title">
                                <span class="title">設備</span>
                            </div>
                            <div class="box">
                                <ul>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="equipments[]" value="2階以上" id="2階以上">
                                            <span class="item_detail">2階以上</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="equipments[]" value="オートロック" id="オートロック">
                                            <span class="item_detail">オートロック</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="equipments[]" value="バス・トイレ別" id="バス・トイレ別">
                                            <span class="item_detail">バス・トイレ別</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="equipments[]" value="駐車場有" id="駐車場有">
                                            <span class="item_detail">駐車場有</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="equipments[]" value="pet" id="ペット相談">
                                            <span class="item_detail">ペット相談</span>
                                        </label>
                                    </li>
                                    <li class="search_detail_list">
                                        <label>
                                            <input type="checkbox" name="equipments[]" value="室内洗濯機置場" id="室内洗濯機置場">
                                            <span class="item_detail">室内洗濯機置場</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sp_only form_search_item form_search_item_easy">
                    <ul>
                        <?php
                        $easy_searchs = get_terms("easy_search", array('hide_empty' => true, 'parent' => 0));
                        foreach ($easy_searchs as $easy_search) : ?>
                            <li class="search_detail_list">
                                <div class="box">
                                    <label>
                                        <input type="checkbox" name="easy_search[]" value="<?php echo $easy_search->slug ?>" id="<?php echo $easy_search->name ?>">
                                        <span class="item_detail"><?php echo $easy_search->name ?></span>
                                    </label>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="button">
                    <button class="btn_blue btn_arrow font_YuMincho">お部屋を検索する</button>
                </div>
            </form>
        </div>
    </section>
    <!-- NEW ROOM -->
    <section class="sec_new_room">
        <div class="wrapper">
            <div class="sp_new_room">
                <img class="new_room_text" src="<?php echo get_template_directory_uri(); ?>/img/icon_newroom.svg" alt="">
            </div>
            <div class="top_new_room">
                <h2 class="font_YuMincho">新着物件</h2>
                <a class="btn_line btn_arrow" href="<?php echo esc_url(home_url('/list/')); ?>">物件一覧を見る</a>
            </div>
            <div class="room_card">
                <ul>
                    <?php
                    $args = array(
                        'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
                        'paged'          => get_query_var('paged') ?: 1, // 何ページ目の記事を取得するか.
                        'post_status'    => 'publish', // 公開している記事のみ
                        'posts_per_page' => 3, // 1ページに表示する記事数.
                        'post_parent__not_in' => array(0), // 親を持たない投稿を除外する
                        's' => get_search_query() // 必ず記載が必要
                    );
                    $the_query = new WP_query($args);
                    if ($the_query->have_posts()) :
                    ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <!--▼ 繰り返しここから -->
                            <li class="new_room_card">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    $building_image1 = get_field('room_image2');
                                    $img = $building_image1['image'];
                                    $src = wp_get_attachment_image_src($img, 'medium');
                                    $caption = $building_image1['caption'];
                                    ?>
                                    <?php if (!empty($src[0])) { ?>
                                        <img src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="img">
                                    <?php } else { ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="img">
                                    <?php } ?>
                                    <div class="new_room_card_detail">
                                        <div class="new_room_title">
                                            <?php $parent_id = $post->post_parent; // 親ページのIDを取得
                                            ?>
                                            <?php
                                            $building_type_2 = get_the_terms($parent_id, 'building_type_2');
                                            $building_type_1 = get_the_terms($parent_id, 'building_type_1');

                                            if ($building_type_1 && $building_type_2) :
                                                foreach ($building_type_1 as $post_term_1) :
                                                    if ($post_term_1->name === '賃貸物件') {
                                                        foreach ($building_type_2 as $post_term_2) : ?>
                                                            <span class="tag_yellow">賃貸<?php echo $post_term_2->name; ?></span>
                                                        <?php endforeach;
                                                    } else if ($post_term_1->name === '売買物件') {
                                                        foreach ($building_type_2 as $post_term_2) : ?>
                                                            <span class="tag_yellow">売買<?php echo $post_term_2->name; ?></span>
                                                        <?php endforeach;
                                                    } else {
                                                        foreach ($building_type_2 as $post_term_2) : ?>
                                                            <span class="tag_yellow"><?php echo $post_term_2->name; ?></span>
                                            <?php endforeach;
                                                    }
                                                endforeach;
                                            endif ?>
                                            <?php $building_name = get_field('building_name', $parent_id) ? get_field('building_name', $parent_id) : "-" ?>
                                            <?php $room_number = get_field('room_number') ? get_field('room_number') : "-" ?>
                                            <h3><?php echo $building_name; ?> <?php echo $room_number; ?></h3>
                                            <?php $recommend_building_text = get_field('recommend_building_text', $parent_id) ? get_field('recommend_building_text', $parent_id) : "-" ?>
                                            <p><?php echo $recommend_building_text; ?></p>
                                        </div>
                                        <div class="new_room_price">
                                            <?php $floor_plan_type = get_the_terms($post->id, 'floor_plan_type'); //間取りタイプタグを取得
                                            ?>
                                            <?php if (!empty($floor_plan_type)) : ?>
                                                <?php foreach ($floor_plan_type as $term) : ?>
                                                    <span class="tag_blue"><?php echo $term->name; ?></span>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <?php $num = get_post_meta($post->ID, 'price', true); //家賃を取得
                                            ?>
                                            <?php if (!empty($num)) { ?>
                                                <span class="red_bold"><?php echo number_format($num); ?><span class="red_text">円</span>
                                                <?php } else { ?>
                                                    <span class="red_bold"><?php echo " - "; ?><span class="red_text">円</span></span>
                                                <?php } ?>
                                        </div>
                                        <div class="new_room_train">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train.svg" alt="">
                                            <?php $building_nearest_station1 = get_field('building_nearest_station1', $parent_id);  ?>
                                            <?php if ($building_nearest_station1["line"] != "" || $building_nearest_station1["station"] != "") :
                                                $place = $building_nearest_station1["line"] . $building_nearest_station1["station"];
                                            else :
                                                $place = " - ";
                                            endif;
                                            ?>
                                            <?php $walk_time_to_station = $building_nearest_station1["walk_time_to_station"] ? $building_nearest_station1["walk_time_to_station"] : " - " ?>
                                            <p>
                                                <?php echo $place ?>から徒歩<?php echo $walk_time_to_station ?>分
                                            </p>

                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!--▼ 繰り返しここまで -->
                        <?php endwhile; ?>
                    <?php wp_reset_postdata();
                    endif; ?>
                </ul>
            </div>
            <a class="btn_blue btn_arrow sp_only_flex" href="<?php echo esc_url(home_url('/list/')); ?>">物件一覧を見る</a>
        </div>
    </section>
    <!-- OWNERS -->
    <section class="sec_owners">
        <div class="owners_cover">
            <div class="wrapper">
                <div class="owners_left">
                    <h2 class="font_YuMincho">管理会社をお探しの<br>オーナー様へ</h2>
                    <p>長年培ったノウハウと独自のサポート体制で物件価値を最大化し、オーナー様の悩みを解決します。<br>賃貸管理でお困りごとがございましたら、まずはエー・ビー・ケーまでお気軽にご相談ください。</p>
                    <a class="btn_line btn_arrow" href="<?php echo esc_url(home_url('/for_owner/')); ?>">詳しく知る</a>
                </div>
                <div class="owners_right">
                    <img src="http://suumo.jp/edit/rewrite/help/img/logo_suumo_m.gif" alt="リクルートの不動産・住宅サイト SUUMO(スーモ)" width="130" height="50" border="0">
                    <img class="banner" src="https://www.athome.co.jp/help/images/logo_150_45.gif" alt="不動産・賃貸のアットホーム" width="150" height="45" border="0">
                    <img class="banner" src="https://banner.homes.co.jp/link/homes_banner_130x50.png" alt="不動産・住宅情報サイト【LIFULL HOME'S/ライフルホームズ】" width="130" height="50" border="0">
                </div>
            </div>
        </div>
    </section>
    <!-- OWNERS -->
    <section class="sec_news">
        <div class="wrapper">
            <div class="news_img">
                <img class="news_text" src="<?php echo get_template_directory_uri(); ?>/img/icon_news.svg" alt="">
            </div>
            <div class="news_title">
                <h2 class="font_YuMincho">お知らせ</h2>
                <a class="btn_line btn_arrow" href="<?php echo esc_url(home_url('/news/')); ?>">詳しく知る</a>
            </div>
            <div class="news_list swiper">
                <ul>
                    <?php
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => '5',
                        'taxonomy' => 'news_cat',
                    );
                    $the_query = new WP_query($args);
                    if ($the_query->have_posts()) :
                    ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <!--▼ 繰り返しここから -->
                            <li class="news_list_detail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail', array('class' => 'img')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="img">
                                    <?php endif; ?>
                                    <div class="news_topic">
                                        <h3><?php the_title(); ?></h3>
                                        <div>
                                            <?php $news_cat = get_the_terms($post->id, 'news_cat'); //ピックアップタグを取得
                                            ?>
                                            <?php if (!empty($news_cat)) : ?>
                                                <?php foreach ($news_cat as $term) : ?>
                                                    <span class="tag_yellow"><?php echo $term->name; ?></span>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <time><?php the_time('Y.m.d'); ?></time>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!--▼ 繰り返しここまで -->
                        <?php endwhile; ?>
                    <?php wp_reset_postdata();
                    endif; ?>
                </ul>
                <ul class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => '5',
                        'taxonomy' => 'news_cat',
                    );
                    $the_query = new WP_query($args);
                    if ($the_query->have_posts()) :
                    ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <!--▼ 繰り返しここから -->
                            <li class="swiper-slide">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="img">
                                    <?php endif; ?>
                                    <div class="news_topic">
                                        <h3><?php the_title(); ?></h3>
                                        <div>
                                            <?php $news_cat = get_the_terms($post->id, 'news_cat'); //ピックアップタグを取得
                                            ?>
                                            <?php if (!empty($news_cat)) : ?>
                                                <?php foreach ($news_cat as $term) : ?>
                                                    <span class="tag_yellow"><?php echo $term->name; ?></span>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <time><?php the_time('Y.m.d'); ?></time>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!--▼ 繰り返しここまで -->
                        <?php endwhile; ?>
                    <?php wp_reset_postdata();
                    endif; ?>
                </ul>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <a class="btn_line btn_arrow sp_only_flex" href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ一覧を見る</a>
        </div>
    </section>
    <!-- BEGINNERS -->
    <section class="sec_beginners">
        <div class="wrapper">
            <div class="beginners_title">
                <h2 class="font_YuMincho">初めての方へ</h2>
                <p>物件選びのポイントや、ご契約の流れなど、<br>不動産に関するお役立ち情報をまとめました。</p>
            </div>
            <div class="beginners_text">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_beginners.svg" alt="">
            </div>
            <div class="beginners_content">
                <img class="beginners_img" src="<?php echo get_template_directory_uri(); ?>/img/img_beginners1.jpg" alt="家族画像">
                <ul class="beginners_info">
                    <li>
                        <a href="<?php echo esc_url(home_url('/for_beginners/point/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_beginners1.svg" alt="">
                            <span class="font_YuMincho">お部屋探しのポイント</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/for_beginners/flow/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_beginners2.svg" alt="">
                            <span class="font_YuMincho">ご契約の流れ</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/for_beginners/glossary/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_beginners3.svg" alt="">
                            <span class="font_YuMincho">不動産用語集</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/for_beginners/move_into/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_beginners4.svg" alt="">
                            <span class="font_YuMincho">入居準備マニュアル</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/for_beginners/move_out/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_beginners5.svg" alt="">
                            <span class="font_YuMincho">退去の流れ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ORIGINAL CONTENT -->
    <section class="sec_original_content">
        <div class="wrapper">
            <ul class="content">
                <li class="content_detail">
                    <a href="<?php echo esc_url(home_url('/request/')); ?>">
                        <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/img_original1-1.jpg" alt="物件画像">
                        <span class="font_YuMincho">物件リクエスト</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_arrow_contents.svg" alt="">
                    </a>
                </li>
                <li class="content_detail">
                    <a href="<?php echo esc_url(home_url('/company/tranc/')); ?>">
                        <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/img_original2-1.jpg" alt="トランクルーム画像">
                        <span class="font_YuMincho">トランクルーム</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_arrow_contents.svg" alt="">
                    </a>
                </li>
                <li class="content_detail">
                    <a href="<?php echo esc_url(home_url('/company/staff/')); ?>">
                        <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/img_oroginal3-1.jpg" alt="スタッフ画像">
                        <span class="font_YuMincho">スタッフ紹介</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_arrow_contents.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- CONTACT -->
    <section class="sec_contact">
        <div class="wrapper">
            <div class="text_contact">
                <h2 class="font_YuMincho">CONTACT</h2>
                <p>物件情報や最新の空室状況、<br>お部屋探しのお悩みなど何でもご相談ください。</p>
            </div>
            <div class="contact_content">
                <div class="tel_contact">
                    <p>お電話でのお問い合わせ</p>
                    <p class="font_YuMincho tel_text">Tel<span class="font_YuMincho">045-252-7077</span></p>
                </div>
                <div class="page_contact">
                    <a class="btn_line btn_arrow" href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせはこちら</a>
                    <a class="btn_line btn_arrow" href="<?php echo esc_url(home_url('/reserve/')); ?>">ご来店予約はこちら</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(''); ?>
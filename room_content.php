<!-- 読み込みファイル → single-building.php -->
<!-- お部屋の親となる物件のIDを取得 -->
<?php
$post_id = get_the_ID();
$parents_id = get_post_ancestors($post_id, "building", "post_type")[0];
$parents_slug = get_post_field('post_name', $parents_id);
?>

<!-- パンくずリスト -->
<section class="breadcrumbs no_print_out">
    <div class="wrapper">
        <div class="aioseo-breadcrumbs">
            <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" title="トップページ">トップページ</a></span>
            <span class="aioseo-breadcrumb-separator">›</span>
            <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/list/')); ?>" title="全物件一覧">全物件一覧</a></span>
            <span class="aioseo-breadcrumb-separator">›</span>
            <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/list/')); ?>/<?php echo $parents_slug ?>" title="<?php echo get_the_title($parents_id) ?>"><?php echo get_the_title($parents_id) ?></a></span>
            <span class="aioseo-breadcrumb-separator">›</span>
            <span class="aioseo-breadcrumb"><?php echo get_the_title() ?></span>
        </div>
    </div>
</section>

<section class="sec_room_first">
    <div class="wrapper">
        <!-- お部屋名 -->
        <div class="composite_title composite_title_1">
            <h1>
                <!-- 物件名 --><?php echo get_the_title($parents_id) ?>
                <!-- 号室 --><?php the_field("room_number") ?>
            </h1>
            <p>
                <!-- 詳細ページ用 見出し --><?php the_field("recommend_title") ?>
            </p>
        </div>
        <!-- </div> -->
        <!-- </section> -->
        <!-- <section class="sec_room_swiper"> -->
        <!-- <div class="wrapper"> -->
        <div class="room_swiper">
            <div class="swiper swiper_main">
                <div class="swiper-wrapper">
                    <!-- 物件写真 -->
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $group = get_field("building_image${i}", $parents_id);
                        if ($group) :
                            $images = $group["image"];
                            if ($images) :
                                //wp_get_attachment_image_src(画像ID, '画像サイズ')で画像情報を取得
                                $src = wp_get_attachment_image_src($images, 'full');
                                $caption = $group["caption"];

                                //画像URLは配列の[0]にあるので、それを利用して画像出力
                                echo '<div class="swiper-slide">';
                                echo '<img src="' . $src[0] . '" alt="' . $caption . '">';
                                echo '<div class="swiper-caption">' . $caption . '</div></div>';
                            endif;
                    ?>
                        <?php endif ?>
                    <?php } ?>

                    <!-- お部屋写真 -->
                    <?php
                    for ($i = 1; $i <= 30; $i++) {
                        $group = get_field("room_image${i}");
                        if ($group) :
                            $images = $group["image"];
                            if ($images) :
                                //wp_get_attachment_image_src(画像ID, '画像サイズ')で画像情報を取得
                                $src = wp_get_attachment_image_src($images, 'full');
                                $caption = $group["caption"];

                                //画像URLは配列の[0]にあるので、それを利用して画像出力
                                echo '<div class="swiper-slide">';
                                echo '<img src="' . $src[0] . '" alt="' . $caption . '">';
                                echo '<div class="swiper-caption">' . $caption . '</div></div>';
                            endif;
                    ?>
                        <?php endif ?>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="swiper swiper_thumbnail">
                <div class="swiper-wrapper">
                    <!-- 物件写真 -->
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $group = get_field("building_image${i}", $parents_id);
                        if ($group) :
                            $images = $group["image"];
                            if ($images) :
                                //wp_get_attachment_image_src(画像ID, '画像サイズ')で画像情報を取得
                                $src = wp_get_attachment_image_src($images, 'full');
                                $caption = $group["caption"];

                                //画像URLは配列の[0]にあるので、それを利用して画像出力
                                echo '<div class="swiper-slide">';
                                echo '<img src="' . $src[0] . '" alt="' . $caption . '">';
                                echo '</div>';

                            endif;
                    ?>
                        <?php endif ?>
                    <?php } ?>

                    <!-- お部屋写真 -->
                    <?php
                    for ($i = 1; $i <= 30; $i++) {
                        $group = get_field("room_image${i}");
                        if ($group) :
                            $images = $group["image"];
                            if ($images) :
                                //wp_get_attachment_image_src(画像ID, '画像サイズ')で画像情報を取得
                                $src = wp_get_attachment_image_src($images, 'full');
                                $caption = $group["caption"];

                                //画像URLは配列の[0]にあるので、それを利用して画像出力
                                echo '<div class="swiper-slide">';
                                echo '<img src="' . $src[0] . '" alt="' . $caption . '">';
                                echo '</div>';
                            endif;
                    ?>
                        <?php endif ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 物件情報 -->
<section class="sec_room_introduction">
    <div class="wrapper">
        <div class="composite_title composite_title_2">
            <h2>物件情報</h2>
            <div class="btn_room_action">
                <div><a href="#" name="btn_print" class="btn_print" onclick="window.print();return false;" s>印刷する</a></div>
                <div class="p-main" data-btn_pageid="<?php echo $post_id ?>">
                    <div class="p-fav_button flex">
                        <span class="__text">お気に入り</span>
                        <span class="__icon"></span>
                    </div>
                </div>
            </div>
        </div>
        <dl class="definition_list_primary">
            <dt>物件名</dt>
            <dd class="cell_long">
                <!-- 物件名 --><?php echo get_the_title($parents_id) ?>
                <!-- 号室 --><?php the_field("room_number") ?>
                <!-- 建物種別 -->
                <?php
                $building_type_2 = get_the_terms($parents_id, 'building_type_2');
                $building_type_1 = get_the_terms($parents_id, 'building_type_1');
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
                <!-- 物件空き情報 --><span class="tag_yellow"><?php the_field("room_state") ?></span>
            </dd>
            <dt>料金</dt>
            <dd class="cell_long">
                <dl>
                    <dt>賃料</dt>
                    <dd><strong>
                            <!-- 賃料 --><?php $price = get_field("price") ? number_format((float)get_field("price")) : "-" ?><?php echo $price ?>円
                        </strong></dd>
                    <dt>管理料</dt>
                    <dd>
                        <!-- 管理料：金額 --><?php $management_fee = get_field("management_fee") ? number_format((float)get_field("management_fee")) : "-" ?><?php echo $management_fee ?>
                        <!-- 管理料：単位 --><?php the_field("management_fee_unit") ?>
                    </dd>
                    <dt>敷金</dt>
                    <dd>
                        <!-- 敷金：金額 --><?php $security_deposit = get_field("security_deposit") ? number_format((float)get_field("security_deposit")) : "-" ?><?php echo $security_deposit ?>
                        <!-- 敷金：単位 --><?php the_field("security_deposit_unit") ?>
                    </dd>
                    <dt>礼金</dt>
                    <dd>
                        <!-- 礼金：金額 --><?php $key_money = get_field("key_money") ? number_format((float)get_field("key_money")) : "-" ?><?php echo $key_money ?>
                        <!-- 礼金：単位 --><?php the_field("key_money_unit") ?>
                    </dd>
                </dl>
            </dd>
            <dt>所在地</dt>
            <dd class="cell_short">
                <?php if (get_field("building_prefecture", $parents_id) != "" || get_field("building_municipalities", $parents_id) != "" || get_field("building_access", $parents_id) != "") : ?>
                    <!-- 都道府県 --><?php the_field("building_prefecture", $parents_id) ?>
                    <!-- 市区町村 --><?php the_field("building_municipalities", $parents_id) ?>
                    <!-- 番地 --><?php the_field("building_access", $parents_id) ?>
                <?php else : ?>
                    -
                <?php endif ?>
            </dd>
            <dt>間取り/面積</dt>
            <dd class="cell_short">
                <!-- 間取り -->
                <?php
                $post_terms = get_the_terms($post->id, 'floor_plan_type');
                if ($post_terms) :
                    foreach ($post_terms as $post_term) :
                        $floor_plan_type = $post_term->name;
                    endforeach;
                else :
                    $floor_plan_type = "-";
                endif
                ?>
                <?php echo $floor_plan_type ?> /
                <!-- 面積 --><?php $occupied_area = get_field("occupied_area") ? get_field("occupied_area") : "-" ?><?php echo $occupied_area ?>㎡
            </dd>
            <dt>最寄り駅</dt>
            <dd class="cell_short">
                <?php $group = get_field('building_nearest_station1', $parents_id);  ?>
                <?php if ($group["line"] != "" || $group["station"] || "") : ?>
                    <!-- 線 --><?php echo $group["line"] ?>
                    <!-- 駅--><?php echo $group["station"] ?>
                <?php else : ?>
                    -
                <?php endif ?>
                <?php if ($group["walk_time_to_station"] != "") : ?>
                    <!-- 徒歩 所要時間 -->徒歩<?php echo $group["walk_time_to_station"] ?>分
                <?php endif ?>
            </dd>
            <dt>築年月</dt>
            <dd class="cell_short">
                <!-- 築年月 --><?php $building_old = get_field("building_old", $parents_id) ? get_field("building_old", $parents_id) : "-" ?><?php echo $building_old ?>
            </dd>
            <dt>所在階</dt>
            <dd class="cell_short">
                <!-- 所在階 --><?php $floor = get_field("floor") ? get_field("floor") : "-" ?><?php echo $floor ?>階
            </dd>
            <dt>方位</dt>
            <dd class="cell_short">
                <!-- 方位 --><?php $direction = get_field("direction") ? get_field("direction") : "-" ?><?php echo $direction ?>
            </dd>
        </dl>
    </div>
</section>

<!-- 設備・備品 -->
<?php
$post_terms = get_the_terms($post->id, 'equipments');
if ($post_terms) :
?>
    <section class="sec_room_facility no_print_out">
        <div class="wrapper">
            <h2>設備・備品</h2>
            <ul class="list_room_facility">
                <?php
                foreach ($post_terms as $post_term) :
                    echo "<li>" . $post_term->name . "</li>";
                endforeach;
                ?>
            </ul>
            <!-- 設備 その他 --><?php $other_equipment = get_field("other_equipment") ? get_field("other_equipment") : "-" ?><?php echo "<p>その他設備：" . $other_equipment . "</p>" ?>

        </div>
    </section>
<?php endif ?>

<!-- ポイント -->
<section class="sec_room_point">
    <div class="wrapper">
        <div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_staff.png" alt=""></div>
        <div class="point_contents">
            <div>
                <h2>物件ポイント</h2>
                <div>
                    <!-- 物件ポイント --><?php $building_PR = get_field("building_PR", $parents_id) ? get_field("building_PR", $parents_id) : "-" ?><?php echo $building_PR ?>
                </div>
            </div>
            <div>
                <h2>お部屋ポイント</h2>
                <div>
                    <!-- お部屋ポイント --><?php $room_PR = get_field("room_PR") ? get_field("room_PR") : "-" ?><?php echo $room_PR ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- お問い合わせ -->
<?php /*
<section class="sec_contact no_print_out">
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
                <a href="<?php echo esc_url(home_url('/building_contact/')); ?>?id=<?php echo get_the_ID() ?>&room_name=<?php echo get_the_title($parents_id) ?> <?php the_field("room_number") ?>" class="btn_arrow btn_yellow">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_contact_2.svg" alt=""><span>お問い合わせはこちら</span></div>
                </a>
                <a href="<?php the_permalink($parents_id); ?>?=<?php echo get_the_ID() ?>" class="btn_clear btn_arrow">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_building.svg" alt=""><span>建物の他の部屋を見る</span></div>
                </a>
            </div>
            <span class="contact_card_corner_1"></span><span class="contact_card_corner_2"></span>
        </div>
    </div>
</section>
*/ ?>

<section class="sec_owner_contact">
    <div class="wrapper">
        <div class="owner_h2">
            <h2>お問い合わせ</h2>
            <span>Contact</span>
        </div>
        <p class="font_YuMincho">詳しい情報や現在の空室状況など、お気軽にお問い合わせ下さい。</p>
        <div class="owner_contact_contents">
            <div class="contact_information">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tel_owner.svg" alt="">
                <div><span>Tel</span><span>045-252-7077</span></div>
                <div><span>FAX</span><span>045-231-1633</span></div>
                <div><span>メール</span><span>info@abk.co.jp</span></div>
                <div>
                    <span>営業時間：09:00〜18:00</span>
                    <span>定休日：日曜日</span>
                </div>
            </div>
            <div class="contact_button">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_contact_owner.svg" alt="">
                <a href="<?php echo esc_url(home_url("/building_contact/")); ?>?id=<?php echo get_the_ID() ?>&room_name=<?php echo get_the_title($parents_id) ?> <?php the_field("room_number") ?>" class="btn_arrow btn_yellow btn_select_room">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_contact_2.svg" alt="">
                        <span>お問い合わせはこちら</span>
                    </div>
                </a>
                <a href="<?php the_permalink($parents_id); ?>?=<?php echo get_the_ID() ?>" class="btn_clear btn_arrow">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_building.svg" alt=""><span>建物の他の部屋を見る</span></div>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- 立地・アクセス -->
<section class="sec_room_facility no_print_out">
    <div class="wrapper">
        <?php if (get_field("googlemap_tag", $parents_id)) : ?>
            <h2>立地・アクセス</h2>
            <div class="googlemap">
                <!--GoogleMap埋め込みタグ--><?php the_field("googlemap_tag", $parents_id) ?>
            </div>
            <div class="googlemap_address">
                <p>
                    <!--郵便番号-->〒<?php the_field("building_postcode", $parents_id) ?>
                    <!--都道府県--><?php the_field("building_prefecture", $parents_id) ?>
                    <!--市区町村--><?php the_field("building_municipalities", $parents_id) ?>
                    <!--番地--><?php the_field("building_access", $parents_id) ?>
                </p>
                <p>
                    <!--GoogleMapリンク--><a href="<?php the_field("googlemap_link", $parents_id) ?>">GoogleMapを開く</a>
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- 周辺施設 -->
<?php
$customFields = get_post_custom($parents_id);
?>
<?php if ($customFields["institution1_image"][0] != "") : ?>
    <section class="sec_room_facility no_print_out">
        <div class="wrapper">
            <h2>周辺施設</h2>
            <div class="facility_card_block flex">
                <!-- 説明テキストあり -->
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    $institution_img_id = $customFields["institution${i}_image"][0];
                    $institution_img = wp_get_attachment_url($institution_img_id);
                    $src = wp_get_attachment_image_src($institution_img_id, 'full');
                    $alt = get_post_meta($institution_img_id, '_wp_attachment_image_alt', true);
                    $type = $customFields["institution${i}_type"][0];
                    $name = $customFields["institution${i}_name"][0];
                    $distance = $customFields["institution${i}_distance"][0];
                    $discription = $customFields["institution${i}_discription"][0];
                ?>

                    <?php if (!empty($name) && !empty($discription)) { ?>
                        <div class="facility_card">
                            <div class="facility_card_inner">
                                <?php if (!empty($src[0])) { ?>
                                    <img src="<?php echo $src[0]; ?>" alt="<?php echo $name; ?>" class="facility_card_img">
                                <?php } else { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="facility_card_img">
                                <?php } ?>
                                <div class="facility_card_information">
                                    <span class="tag_yellow"><?php echo $type; ?></span>
                                    <span><?php echo $name; ?></span>
                                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_blue.svg" alt=""><span>約<?php echo $distance; ?>m</span></div>
                                </div>
                            </div>
                            <p><?php echo $discription; ?></p>
                        </div>
                    <?php } ?>
                <?php } ?>

                <!-- 説明テキストなし -->
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    $institution_img_id = $customFields["institution${i}_image"][0];
                    $institution_img = wp_get_attachment_url($institution_img_id);
                    $src = wp_get_attachment_image_src($institution_img_id, 'full');
                    $alt = get_post_meta($institution_img_id, '_wp_attachment_image_alt', true);
                    $type = $customFields["institution${i}_type"][0];
                    $name = $customFields["institution${i}_name"][0];
                    $distance = $customFields["institution${i}_distance"][0];
                    $discription = $customFields["institution${i}_discription"][0];
                ?>

                    <?php if (!empty($name) && empty($discription)) { ?>
                        <div class="facility_card">
                            <div class="facility_card_inner">
                                <?php if (!empty($src[0])) { ?>
                                    <img src="<?php echo $src[0]; ?>" alt="<?php echo $name; ?>" class="facility_card_img">
                                <?php } else { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="facility_card_img">
                                <?php } ?>
                                <div class="facility_card_information">
                                    <span class="tag_yellow"><?php echo $type; ?></span>
                                    <span><?php echo $name; ?></span>
                                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_blue.svg" alt=""><span>約<?php echo $distance; ?>m</span></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php endif ?>

<!-- 物件概要 -->
<section class="sec_room_introduction room_overview">
    <div class="wrapper">
        <h2>物件概要</h2>
        <dl class="definition_list_primary">
            <dt>物件名</dt>
            <dd class="cell_long">
                <!-- 物件名 --><?php echo get_the_title($parents_id) ?>
                <!-- 号室 --><?php the_field("room_number") ?>
                <!-- 建物種別 -->
                <?php
                $building_type_2 = get_the_terms($parents_id, 'building_type_2');
                $building_type_1 = get_the_terms($parents_id, 'building_type_1');
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
                <!-- 物件空き情報 --><span class="tag_yellow"><?php the_field("room_state") ?></span>
            </dd>
            <dt>所在地</dt>
            <dd class="cell_long">
                <?php if (get_field("building_postcode", $parents_id) != "") : ?>
                    <!--郵便番号-->〒<?php the_field("building_postcode", $parents_id) ?>
                <?php endif ?>
                <?php if (get_field("building_prefecture", $parents_id) != "" || get_field("building_municipalities", $parents_id) != "" || get_field("building_access", $parents_id) != "") : ?>
                    <!-- 都道府県 --><?php the_field("building_prefecture", $parents_id) ?>
                    <!-- 市区町村 --><?php the_field("building_municipalities", $parents_id) ?>
                    <!-- 番地 --><?php the_field("building_access", $parents_id) ?>
                <?php else : ?>
                    -
                <?php endif ?>
            </dd>
            <dt>所在階/総階数</dt>
            <dd class="cell_short">
                <!-- 所在階/総階数 -->
                <?php $floor = get_field("floor") ? get_field("floor") : "-" ?><?php echo $floor ?>
                /
                <?php $building_floor = get_field("building_floor", $parents_id) ? get_field("building_floor", $parents_id) : "-" ?><?php echo $building_floor ?>階
            </dd>

            <dt>間取り/間取り詳細</dt>
            <dd class="cell_short">
                <!-- 間取り -->
                <?php
                $post_terms = get_the_terms($post->id, 'floor_plan_type');
                if ($post_terms) :
                    foreach ($post_terms as $post_term) :
                        $floor_plan_type = $post_term->name;
                    endforeach;
                else :
                    $floor_plan_type = "-";
                endif;
                ?>
                <?php echo $floor_plan_type ?> /
                <!-- 間取り詳細 --><?php $floor_plan_detail = get_field("floor_plan_detail") ? get_field("floor_plan_detail") : "-" ?><?php echo $floor_plan_detail ?>
            </dd>

            <dt>物件構造</dt>
            <dd class="cell_short">
                <!-- 建物構造 --><?php $building_structure = get_field("building_structure", $parents_id) ? get_field("building_structure", $parents_id) : "-" ?><?php echo $building_structure ?>
            </dd>

            <dt>築年月</dt>
            <dd class="cell_short">
                <!-- 築年月 --><?php $building_old = get_field("building_old", $parents_id) ? get_field("building_old", $parents_id) : "-" ?><?php echo $building_old ?>
            </dd>

            <dt>総戸数</dt>
            <dd class="cell_short">
                <!-- 総戸数 --><?php $building_unit = get_field("building_unit", $parents_id) ? get_field("building_unit", $parents_id) : "-" ?><?php echo $building_unit ?>
            </dd>

            <dt>方位</dt>
            <dd class="cell_short">
                <!-- 方位 --><?php $direction = get_field("direction") ? get_field("direction") : "-" ?><?php echo $direction ?>
            </dd>

            <dt>入居可能予定日</dt>
            <dd class="cell_short">
                <!-- 即入居 -->
                <?php
                $immediate_move_in = get_field("immediate_move-in");
                if ($immediate_move_in == 1) : ?>
                    即入居可
                <?php endif ?>
                <!-- 入居可能予定日 --><?php $immediate_movein_day = get_field("immediate_move-in_day", $parents_id) ? get_field("immediate_move-in_day", $parents_id) : "-" ?><?php echo $immediate_movein_day ?>
            </dd>

            <dt>専有面積</dt>
            <dd class="cell_short">
                <!-- 専有面積 --><?php $occupied_area = get_field("occupied_area") ? get_field("occupied_area") : "-" ?><?php echo $occupied_area ?>㎡
            </dd>

            <dt>最寄り駅</dt>
            <dd class="cell_long">

                <!-- 最寄り駅1 --><?php $group = get_field('building_nearest_station1', $parents_id);  ?>
                <?php if ($group["line"] != "" || $group["station"] != "") : ?>
                    <!-- 線 駅 徒歩所要時間 --><?php echo $group["line"] ?> <?php echo $group["station"] ?>まで 徒歩<?php echo $group["walk_time_to_station"] ?>分／
                    <!-- バス所要時間 バス停までの徒歩所要時間 -->バス<?php echo $group["bus_time"] ?>分（バス停まで徒歩<?php echo $group["walk_time_to_busstop"] ?>分）<br>
                    備考：<?php echo $group["other"] ?>
                <?php else : ?>
                    -
                <?php endif ?>

                <!-- 最寄り駅2 --><?php $group = get_field('building_nearest_station2', $parents_id);  ?>
                <?php if ($group["line"] != "" || $group["station"] != "") : ?>
                    <hr>
                    <!-- 線 駅 徒歩所要時間 --><?php echo $group["line"] ?> <?php echo $group["station"] ?>まで 徒歩<?php echo $group["walk_time_to_station"] ?>分／
                    <!-- バス所要時間 バス停までの徒歩所要時間 -->バス<?php echo $group["bus_time"] ?>分（バス停まで徒歩<?php echo $group["walk_time_to_busstop"] ?>分）<br>
                    備考：<?php echo $group["other"] ?>
                <?php endif ?>

            </dd>

            <dt>設備</dt>
            <!--設備-->
            <dd class="cell_long">
                <?php
                $post_terms = get_the_terms($post->id, 'equipments');
                if ($post_terms) :
                    foreach ($post_terms as $post_term) :
                        echo  $post_term->name;
                        echo "｜";
                    endforeach;
                else :
                    echo "-";
                endif;
                ?><br>
                <!-- 設備 その他 --><?php $other_equipment = get_field("other_equipment") ? get_field("other_equipment") : "-" ?><?php echo "その他設備：" . $other_equipment ?>

            </dd>

            <dt>取引形態</dt>
            <dd class="cell_short">
                <!-- 取引形態 --><?php $transaction_form = get_field("transaction_form") ? get_field("transaction_form") : "-" ?><?php echo $transaction_form ?>
            </dd>

            <dt>償却/敷引</dt>
            <dd class="cell_short">
                <!-- 償却 --><?php $amortization = get_field("amortization") ? number_format((float)get_field("amortization")) : "-" ?><?php echo $amortization ?>
                <!-- 償却：単位 --><?php $amortization_unit = get_field("amortization_unit") ? get_field("amortization_unit") : "-" ?><?php echo $amortization_unit ?> /
                <!-- 敷引 --><?php $apply = get_field("apply") ? number_format((float)get_field("apply")) : "-" ?><?php echo $apply ?>
                <!-- 敷引：単位 --><?php $apply_unit = get_field("apply_unit") ? get_field("apply_unit") : "-" ?><?php echo $apply_unit ?>
            </dd>

            <dt>契約内容</dt>
            <dd class="cell_short">
                <!-- 契約内容 --><?php $contract_details = get_field("contract_details") ? get_field("contract_details") : "-" ?><?php echo $contract_details ?>
            </dd>

            <dt>契約期間</dt>
            <dd class="cell_short">
                <!-- 契約期間 --><?php $contract_period = get_field("contract_period") ? get_field("contract_period") : "-" ?><?php if ($contract_period) : echo $contract_period . '年';
                                                                                                                            endif; ?>
            </dd>

            <dt>更新料</dt>
            <dd class="cell_long">
                <!-- 更新料 --><?php $renewal_fee = get_field("renewal_fee") ? number_format((float)get_field("renewal_fee")) : "-" ?><?php echo $renewal_fee ?>
                <!-- 更新料：単位 --><?php $renewal_fee_unit = get_field("renewal_fee_unit") ? get_field("renewal_fee_unit") : "-" ?><?php echo $renewal_fee_unit ?>
            </dd>

            <dt>保証会社</dt>
            <dd class="cell_short">
                <?php $group = get_field('acting_guarantor');  ?>
                <!-- 保証：加入 --><?php $join = $group["join"] ? $group["join"] : "- " ?><?php echo $join ?><br>
                <!-- 保証：会社名 --><?php $company_name = $group["company_name"] ? $group["company_name"] : "- " ?><?php echo $company_name ?><br>
                <!-- 保証：備考 -->備考:<?php $remarks = $group["remarks"] ? $group["remarks"] : "-" ?><?php echo $remarks ?><br>
                <!-- 保証金 --><?php $deposit = get_field("deposit") ? number_format((float)get_field("deposit")) : "-" ?><?php echo $deposit ?>
                <!-- 保証金：単位 --><?php $deposit_unit = get_field("deposit_unit") ? get_field("deposit_unit") : "" ?><?php echo $deposit_unit ?>
            </dd>

            <dt>保険</dt>
            <dd class="cell_short">
                <?php $group = get_field('insurance');  ?>
                <!-- 保険：加入 --><?php $join = $group["join"] ? $group["join"] : "- " ?><?php echo $join ?><br>
                <!-- 保険：保険名 --><?php $name = $group["name"] ? $group["name"] : "- " ?><?php echo $name ?><br>
                <!-- 保険：金額 --><?php $price = $group["price"] ? $group["price"] : "- " ?><?php echo $price ?>円<br>
                <!-- 保険：年 --><?php $year = $group["year"] ? $group["year"] : "- " ?><?php echo $year ?>年
            </dd>

            <dt>料金・その他</dt>
            <dd class="cell_long">
                <!--料金・その他--><?php $other_price = get_field("other_price") ? get_field("other_price") : "-" ?><?php echo $other_price ?>
            </dd>

            <dt>備考・特記事項</dt>
            <dd class="cell_long">
                <!--備考・特記事項--><?php $remarks = get_field("remarks") ? get_field("remarks") : "-" ?><?php echo $remarks ?>
            </dd>
        </dl>
    </div>
</section>


<!-- お問い合わせ -->
<section class="sec_contact no_print_out">
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
                <a href="<?php echo esc_url(home_url("/building_contact/")); ?>?id=<?php echo get_the_ID() ?>&room_name=<?php echo get_the_title($parents_id) ?> <?php the_field("room_number") ?>" class="btn_arrow btn_yellow">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_contact_2.svg" alt=""><span>お問い合わせはこちら</span></div>
                </a>
                <a href="<?php the_permalink($parents_id); ?>?=<?php echo get_the_ID() ?>" class="btn_clear btn_arrow">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_building.svg" alt=""><span>建物の他の部屋を見る</span></div>
                </a>
            </div>
            <span class="contact_card_corner_1"></span><span class="contact_card_corner_2"></span>
        </div>
    </div>
</section>

<section class="sec_recommend">
    <?php
    $around_room_posts = get_field('around_room');
    $similar_room_posts = get_field('similar_room');
    if ($around_room_posts || $similar_room_posts) :
    ?>
        <!-- 周辺の募集中のお部屋・条件が近いお部屋 -->
        <?php
        if ($around_room_posts) :
        ?>
            <!-- 周辺の募集中のお部屋 -->
            <section class="sec_recommend_list no_print_out">
                <div class="wrapper">
                    <div class="recommend_title">
                        <h2>周辺の募集中のお部屋</h2>
                        <p><?php echo get_the_title($parents_id) ?>周辺の募集中のお部屋です</p>
                    </div>
                    <div class="swiper recommend_swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($around_room_posts as $post) :
                                $post_id = get_the_ID();
                                $parents_id = get_post_ancestors($post_id, "building", "post_type")[0];
                                $parents_slug = get_post_field('post_name', $parents_id);
                            ?>
                                <div class="swiper-slide">
                                    <div class="recommend_card">
                                        <a href="<?php the_permalink($post); ?>">
                                            <div class="recommend_card_title">
                                                <!-- 建物種別 -->
                                                <?php
                                                $building_type_2 = get_the_terms($parents_id, 'building_type_2');
                                                $building_type_1 = get_the_terms($parents_id, 'building_type_1');
                                                if ($building_type_1 && $building_type_2) :
                                                    foreach ($building_type_1 as $post_term_1) :
                                                        if ($post_term_1->name === '賃貸物件') {
                                                            foreach ($building_type_2 as $post_term_2) : ?>
                                                                <span class="tag_blue">賃貸<?php echo $post_term_2->name; ?></span>
                                                            <?php endforeach;
                                                        } else if ($post_term_1->name === '売買物件') {
                                                            foreach ($building_type_2 as $post_term_2) : ?>
                                                                <span class="tag_blue">売買<?php echo $post_term_2->name; ?></span>
                                                            <?php endforeach;
                                                        } else {
                                                            foreach ($building_type_2 as $post_term_2) : ?>
                                                                <span class="tag_blue"><?php echo $post_term_2->name; ?></span>
                                                <?php endforeach;
                                                        }
                                                    endforeach;
                                                endif ?>
                                                <span>
                                                    <!-- 物件名 --><?php echo get_the_title($parents_id) ?>
                                                    <!-- 号室 --><?php the_field("room_number") ?>
                                                </span>
                                            </div>

                                            <?php
                                            $room_image2 = get_field('room_image2');
                                            $img = $room_image2['image'];
                                            $src = wp_get_attachment_image_src($img, 'medium');
                                            $caption = $room_image2['caption'];
                                            ?>
                                            <?php if (!empty($src[0])) { ?>
                                                <img class="recommend_card_img img" src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="img">
                                            <?php } else { ?>
                                                <img class="recommend_card_img img" src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="img">
                                            <?php } ?>

                                            <div class="recommend_card_content">
                                                <div class="flex">
                                                    <p><?php the_field("recommend_title") ?></p>
                                                    <div class="recommend_card_information">
                                                        <div>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train.svg" alt="">
                                                            <?php $building_nearest_station1 = get_field('building_nearest_station1', $parents_id);  ?>
                                                            <span><?php echo $building_nearest_station1["station"] ?>から徒歩<?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span>
                                                        </div>
                                                        <div>
                                                            <?php
                                                            $post_terms = get_the_terms($post->id, 'floor_plan_type');
                                                            if ($post_terms) :
                                                                foreach ($post_terms as $post_term) :
                                                                    $floor_plan_type = $post_term->name;
                                                                endforeach;
                                                            else :
                                                                $floor_plan_type = "-";
                                                            endif;
                                                            ?>
                                                            <span class="tag_yellow"><?php echo $floor_plan_type ?></span>
                                                            <span class="red_bold"><strong><?php $price = get_field("price") ? number_format((float)get_field("price")) : "-" ?></strong><?php echo $price ?>円</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="recommend_swiper_prev btn_arrow"></div>
                        <div class="recommend_swiper_next btn_arrow"></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        if ($similar_room_posts) :
        ?>
            <!-- 条件が近いお部屋 -->
            <section class="sec_recommend_list no_print_out">
                <div class="wrapper">
                    <div class="recommend_title">
                        <h2>条件が近いお部屋</h2>
                        <p><?php echo get_the_title($parents_id) ?>に条件が近いお部屋です</p>
                    </div>
                    <div class="swiper recommend_swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($similar_room_posts as $post) :
                                $post_id = get_the_ID();
                                $parents_id = get_post_ancestors($post_id, "building", "post_type")[0];
                                $parents_slug = get_post_field('post_name', $parents_id);
                            ?>
                                <div class="swiper-slide">
                                    <div class="recommend_card">
                                        <a href="<?php the_permalink($post); ?>">
                                            <div class="recommend_card_title">
                                                <!-- 建物種別 -->
                                                <?php
                                                $building_type_2 = get_the_terms($parents_id, 'building_type_2');
                                                $building_type_1 = get_the_terms($parents_id, 'building_type_1');
                                                if ($building_type_1 && $building_type_2) :
                                                    foreach ($building_type_1 as $post_term_1) :
                                                        if ($post_term_1->name === '賃貸物件') {
                                                            foreach ($building_type_2 as $post_term_2) : ?>
                                                                <span class="tag_blue">賃貸<?php echo $post_term_2->name; ?></span>
                                                            <?php endforeach;
                                                        } else if ($post_term_1->name === '売買物件') {
                                                            foreach ($building_type_2 as $post_term_2) : ?>
                                                                <span class="tag_blue">売買<?php echo $post_term_2->name; ?></span>
                                                            <?php endforeach;
                                                        } else {
                                                            foreach ($building_type_2 as $post_term_2) : ?>
                                                                <span class="tag_blue"><?php echo $post_term_2->name; ?></span>
                                                <?php endforeach;
                                                        }
                                                    endforeach;
                                                endif ?>
                                                <span>
                                                    <!-- 物件名 --><?php echo get_the_title($parents_id) ?>
                                                    <!-- 号室 --><?php the_field("room_number") ?>
                                                </span>
                                            </div>

                                            <?php
                                            $room_image2 = get_field('room_image2');
                                            $img = $room_image2['image'];
                                            $src = wp_get_attachment_image_src($img, 'medium');
                                            $caption = $room_image2['caption'];
                                            ?>
                                            <?php if (!empty($src[0])) { ?>
                                                <img class="recommend_card_img img" src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="img">
                                            <?php } else { ?>
                                                <img class="recommend_card_img img" src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="img">
                                            <?php } ?>

                                            <div class="recommend_card_content">
                                                <div class="flex">
                                                    <p><?php the_field("recommend_title") ?></p>
                                                    <div class="recommend_card_information">
                                                        <div>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train.svg" alt="">
                                                            <?php $building_nearest_station1 = get_field('building_nearest_station1', $parents_id);  ?>
                                                            <span><?php echo $building_nearest_station1["station"] ?>から徒歩<?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span>
                                                        </div>
                                                        <div>
                                                            <?php
                                                            $post_terms = get_the_terms($post->id, 'floor_plan_type');
                                                            if ($post_terms) :
                                                                foreach ($post_terms as $post_term) :
                                                                    $floor_plan_type = $post_term->name;
                                                                endforeach;
                                                            else :
                                                                $floor_plan_type = "-";
                                                            endif;
                                                            ?>
                                                            <span class="tag_yellow"><?php echo $floor_plan_type ?></span>
                                                            <span class="red_bold"><strong><?php $price = get_field("price") ? number_format((float)get_field("price")) : "-" ?></strong><?php echo $price ?>円</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="recommend_swiper_prev btn_arrow"></div>
                        <div class="recommend_swiper_next btn_arrow"></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php endif; ?>
</section>
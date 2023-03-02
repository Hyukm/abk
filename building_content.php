<!-- 読み込みファイル → single-building.php -->
<!-- パンくずリスト-->
<section class="breadcrumbs">
    <div class="wrapper">
        <div class="aioseo-breadcrumbs">
            <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" title="トップページ">トップページ</a></span>
            <span class="aioseo-breadcrumb-separator">›</span>
            <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/list/')); ?>" title="全物件一覧">全物件一覧</a></span>
            <span class="aioseo-breadcrumb-separator">›</span>
            <span class="aioseo-breadcrumb"><?php echo get_the_title() ?></span>
        </div>
    </div>
</section>
<section>
    <?php $building_id = get_the_ID() ?>
    <div class="wrapper">
        <?php $title = get_field('building_name') != "" ? get_field('building_name') : "-" ?>
        <h1><?php echo $title ?></h1>
        <div class="flex property_basic_information">
            <?php
            $building_image1 = get_field('building_image1');
            $img = $building_image1['image'];
            $src = wp_get_attachment_image_src($img, 'full');
            $caption = $building_image1['caption'];
            ?>
            <?php if (!empty($src[0])) { ?>
                <img src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="pbi_img">
            <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="pbi_img">
            <?php } ?>
            <div class="pbi_middle">
                <div>
                    <?php
                    $building_type_2 = get_the_terms($post->id, 'building_type_2');
                    $building_type_1 = get_the_terms($post->id, 'building_type_1');

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
                </div>
                <p><?php the_field("building_PR") ?></p>
                <div class="pbi_middle_table">
                    <dl>
                        <dt>築年月</dt>
                        <?php $build_yearmonth = get_field('building_old') != "" ? get_field('building_old') : "-" ?>
                        <dd><?php echo $build_yearmonth  ?></dd>
                    </dl>
                    <dl>
                        <dt>構造</dt>
                        <?php $structure = get_field('building_structure') != "" ? get_field('building_structure') : "-" ?>
                        <dd><?php echo $structure ?></dd>
                    </dl>
                    <dl>
                        <dt>総戸数</dt>
                        <?php $unit = get_field('building_unit') != "" ? get_field('building_unit') : "-" ?>
                        <dd><?php echo $unit ?>戸</dd>
                    </dl>
                    <dl>
                        <dt>総階数</dt>
                        <?php $floorNum = get_field('building_floor') != "" ? get_field('building_floor') : "- " ?>
                        <dd><?php echo $floorNum ?>階</dd>
                    </dl>
                </div>
            </div>
            <div class="pbi_right address_access">
                <?php if (get_field("building_prefecture") && get_field("building_municipalities") && get_field("building_access")) : ?>
                    <div>
                        <h3><img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_yellow.svg" alt="">所在地</h3>
                        <p><?php the_field("building_prefecture") ?> <?php the_field("building_municipalities") ?> <?php the_field("building_access") ?></p>
                    </div>
                <?php endif ?>
                    <div>
                        <h3><img src="<?php echo get_template_directory_uri(); ?>/img/icon_train_yellow.svg" alt="">アクセス</h3>
                        <ul>
                <?php $building_nearest_station1 = get_field('building_nearest_station1');  ?>
                <?php $building_nearest_station2 = get_field('building_nearest_station2');  ?>
                <?php if ($building_nearest_station1["line"]) : ?>
                            <li><?php echo $building_nearest_station1["line"] ?><br class="tb_none"><?php echo $building_nearest_station1["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span></li>
                <?php endif ?>
                <?php if ($building_nearest_station2["line"]) : ?>
                            <li><?php echo $building_nearest_station2["line"] ?><br class="tb_none"><?php echo $building_nearest_station2["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station2["walk_time_to_station"] ?>分</span></li>
                <?php endif ?>
                    </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="wrapper">
        <h2>お部屋一覧</h2>
        <!-- サブクエリの条件の取得 -->
        <?php
        $args = array(
            'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
            'paged'          => get_query_var('paged') ?: 1, // 何ページ目の記事を取得するか.
            'posts_per_page' => -1, // 1ページに表示する記事数.
            'post_parent__in' => [get_the_ID()], // 表示されている物件の子(お部屋)を取得する
            's' => get_search_query() // 必ず記載が必要
        );

        // サブクエリの発行
        $the_query = new WP_Query($args);
        ?>

        <p><?php echo $the_query->found_posts; ?>件のお部屋が該当しました</p>

        <?php
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                $the_query->the_post();

                get_template_part('template-parts/room_card');

            endwhile;

            if ($the_query->max_num_pages > 0) {
                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => 'page/%#%/',
                    'current' => max(1, $paged),
                    'total' => $the_query->max_num_pages,
                    'prev_text' => '<<', //次への表示指定
                    'next_text' => '>>' //前への表示指定
                ));
            };

        else :
        ?>
            <p>一件も表示されていません</p>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php if (get_field("googlemap_tag") != "" && get_post_meta($building_id, 'googlemap_link', true) != "") : ?>
    <section>
        <div class="wrapper">
            <h2>立地・アクセス</h2>
            <div class="gmap">
                <?php the_field("googlemap_tag") ?>
                <div class="flex">
                    <p><?php echo get_post_meta($building_id, 'building_prefecture', true) ?> <?php echo get_post_meta($building_id, 'building_municipalities', true) ?> <?php echo get_post_meta($building_id, 'building_access', true) ?></p>
                    <a href="<?php echo get_post_meta($building_id, 'googlemap_link', true) ?>">GoogleMapで開く</a>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<?php
$customFields = get_post_custom($building_id);
?>
<?php if ($customFields["institution1_image"][0] != "") : ?>
    <section>
        <div class="wrapper">
            <h2>周辺施設</h2>
            <div class="facility_card_block flex">

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

                    <!-- 説明テキストあり -->
                    <?php if (!empty($name) && !empty($discription)) { ?>
                        <div class="facility_card">
                            <div class="facility_card_inner">
                                <?php if (!empty($src[0])) { ?>
                                    <img src="<?php echo $src[0]; ?>" alt="<?php echo $alt; ?>" class="facility_card_img">
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
                                    <img src="<?php echo $src[0]; ?>" alt="" class="facility_card_img">
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
<section class="sec_contact">
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
                <a href="<?php echo esc_url(home_url('/building_contact/')); ?>?id=<?php echo get_the_ID() ?>&building_name=<?php echo get_the_title() ?>" class="btn_arrow btn_yellow">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/icon_contact_2.svg" alt=""><span>お問い合わせはこちら</span></div>
                </a>
            </div>
            <span class="contact_card_corner_1"></span><span class="contact_card_corner_2"></span>
        </div>
    </div>
</section>
<?php
$posts = get_field('recommend_building');
if ($posts) :
?>
    <section class="sec_recommend_list">
        <div class="wrapper">
            <div class="recommend_title">
                <h2>おすすめ物件</h2>
                <p><?php the_field("building_name") ?>を見た方におすすめの物件です</p>
            </div>
            <div class="swiper recommend_swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($posts as $post) : ?>
                        <div class="swiper-slide">
                            <div class="recommend_card">
                                <a href="<?php the_permalink($post); ?>">
                                    <div class="recommend_card_title">
                                        <?php
                                        $building_type_2 = get_the_terms($post->id, 'building_type_2');
                                        $building_type_1 = get_the_terms($post->id, 'building_type_1');

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
                                        <span><?php the_field("building_name") ?></span>
                                    </div>
                                    <?php
                                    $building_image1 = get_field('building_image1');
                                    $img = $building_image1['image'];
                                    $src = wp_get_attachment_image_src($img, 'full');
                                    $caption = $building_image1['caption'];
                                    ?>
                                    <?php if (!empty($src[0])) { ?>
                                        <img src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="recommend_card_img img">
                                    <?php } else { ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="recommend_card_img img">
                                    <?php } ?>
                                    <div class="recommend_card_content">
                                        <div class="flex">
                                            <p><?php the_field("recommend_building_text") ?></p>
                                            <div class="recommend_card_information">
                                                <div>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train.svg" alt="">
                                                    <?php $building_nearest_station1 = get_field('building_nearest_station1');  ?>
                                                    <span><?php echo $building_nearest_station1["station"] ?>から徒歩<?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span>
                                                </div>
                                                <div>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_blue.svg" alt="">
                                                    <span><?php the_field("building_prefecture") ?> <?php the_field("building_municipalities") ?></span>
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
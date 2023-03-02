<!-- 読み込みファイル　→　page-room_archive.php, single-building.php, search.php -->

<!-- お部屋の親となる物件のIDを取得 -->
<?php
$post_id = get_the_ID();
$parents_id = get_post_ancestors($post_id, "building", "post_type")[0];
?>

<article class="room_container">
    <a href="<?php the_permalink($post); ?>" class="room_container_link"></a>
    <div class="p-main" data-btn_pageid="<?php echo $post_id ?>">
        <div class="p-fav_button flex pc_fav">
            <span class="__text">お気に入り</span>
            <span class="__icon"></span>
        </div>
    </div>
    <div class="flex">
        <?php
        $room_image1 = get_field('room_image1');
        $img = $room_image1['image'];
        $src = wp_get_attachment_image_src($img, 'full');
        $caption = $room_image1['caption'];
        ?>
        <?php if(!empty($src[0])) { ?>
            <img src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="room_image">
        <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="room_image">
        <?php } ?>
        <div class="room_details">
            <h3 class="room_details_title"><?php echo get_the_title($parents_id) ?> <?php the_field("room_number") ?></h3>
        <?php if(!empty($src[0])) { ?>
            <img src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="room_image">
        <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="room_image">
        <?php } ?>
            <p class="room_details_recommend"><?php the_field("recommend_title") ?></p>
            <div class="flex room_details_main">
                <div class="flex">
                    <h4 class="room_details_tag">賃料/管理費</h4>
                    <?php 
                    $price = get_field("price") ? number_format((float)get_field("price")) : "-";
                    $management_fee = get_field("management_fee") ? number_format((float)get_field("management_fee")) : 1;
                    $management_fee_unit = get_field("management_fee_unit");
                    ?>
                    <span><strong><?php echo $price ?><span>円</span></strong> / <?php echo $management_fee ?><?php echo $management_fee_unit ?></span>
                </div>
                <div class="flex">
                    <h4 class="room_details_tag">間取り/面積</h4>
                    <?php
                    $area = get_field("occupied_area") != "" ? get_field("occupied_area") : "-";
                    $post_terms = get_the_terms($post->id, 'floor_plan_type');
                    if ($post_terms) :
                    foreach ($post_terms as $post_term) :
                        $floor_plan_type = $post_term->name;
                    endforeach;
                    else :
                    $floor_plan_type = "-";
                    endif ; ?>
                    <span><strong><?php echo $floor_plan_type ?></strong> / <?php echo $area ?>㎡</span>
                </div>
            </div>

            <ul class="flex room_details_table">
                <li>
                    <h4>敷金・礼金</h4>
                    <div>
                        <div class="flex">
                            <span class="room_details_icon">敷</span>
                            <?php $security_deposit = get_field("security_deposit") != "" ? number_format((float)get_field("security_deposit")) : "-"; ?>
                            <p><?php echo $security_deposit ?><?php the_field("security_deposit_unit") ?></p>
                        </div>
                        <div class="flex">
                            <span class="room_details_icon">礼</span>
                            <?php $security_deposit = get_field("key_money") != "" ? number_format((float)get_field("key_money")) : "-"; ?>
                            <p><?php echo $security_deposit ?><?php the_field("key_money_unit") ?></p>
                        </div>
                    </div>
                </li>
                <li>
                    <h4>築年数</h4>
                    <div class="flex">
                        <?php $build_yearmonth = get_field("building_old", $parents_id) != "" ? get_field("building_old", $parents_id) : "-"; ?>
                        <p><?php echo $build_yearmonth ?></p>
                    </div>
                </li>
                <li>
                    <h4>所在階</h4>
                    <div class="flex">
                        <?php $build_yearmonth = get_field("floor") != "" ? get_field("floor") : "-"; ?>
                        <p><?php echo $build_yearmonth ?>階</p>
                    </div>
                </li>
                <li>
                    <h4>方位</h4>
                    <div class="flex">
                        <?php $direction = get_field("direction") != "" ? get_field("direction") : "-"; ?>
                        <p><?php echo $direction ?></p>
                    </div>
                </li>
                <li>
                    <h4>入居可能予定</h4>
                    <div class="flex">
                        <p><?php the_field("immediate_move-in_day") ?></p>
                        <?php 
                        $room_state = get_field("room_state");
                        if($room_state == "募集中") { ?>
                            <span class="tag_red"><?php the_field("room_state") ?></span>
                        <?php } else { ?>
                            <span class="tag_gray_blue"><?php the_field("room_state") ?></span>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>

        <!-- アクセスの最寄り駅1 --><?php $building_nearest_station1 = get_field('building_nearest_station1', $parents_id);  ?>
        <!-- 所在地の都道府県 --><?php $building_prefecture = get_field('building_prefecture', $parents_id);  ?>

        <?php if (!is_singular("building")) : ?>
        <div class="tb_room_access_location">
            <!-- アクセス -->
            <?php $building_nearest_station2 = get_field('building_nearest_station2', $parents_id);  ?>
            <div class="flex">
                <?php if (($building_nearest_station1["line"] != "" || $building_nearest_station1["station"] != "") && $building_nearest_station1["walk_time_to_station"] != "") : ?>
                <!-- <figure> -->
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train_yellow.svg" alt="">
                <!-- </figure> -->
                <p>
                    <!-- 最寄り駅1 --><?php echo $building_nearest_station1["line"] ?>  <?php echo $building_nearest_station1["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span>
                </p>
                <?php endif ?>
                <?php if (($building_nearest_station2["line"] != "" || $building_nearest_station2["station"] != "") && $building_nearest_station2["walk_time_to_station"] != "") : ?>
                <p>
                    <!-- 最寄り駅2 --><?php echo $building_nearest_station2["line"] ?>  <?php echo $building_nearest_station2["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station2["walk_time_to_station"] ?>分</span>
                </p>
                <?php endif ?>
            </div>    

            <!-- 所在地 -->
            <?php $building_municipalities = get_field('building_municipalities', $parents_id);  ?>
            <?php $building_access = get_field('building_access', $parents_id);  ?>
            <div class="flex">
            <?php if ($building_prefecture != "" && $building_municipalities != "" && $building_access != "") : ?>
                <!-- <figure> -->
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_yellow.svg" alt="">
                <!-- </figure> -->
                <p>
                    <!-- 市区町村 --><?php echo $building_municipalities ?>
                    <!-- 番地 --><?php echo $building_access ?>
                </p>
                <?php endif ?>
            </div>
        </div>

        <div class="sp_room_access_location">
            <!-- 所在地 -->
            <?php $building_municipalities = get_field('building_municipalities', $parents_id);  ?>
            <?php $building_access = get_field('building_access', $parents_id);  ?>
            <div class="flex">
            <?php if ($building_prefecture != "" && $building_municipalities != "" && $building_access != "") : ?>
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_yellow.svg" alt="">
                </figure>
                <p>
                    <!-- 市区町村 --><?php echo $building_municipalities ?>
                    <!-- 番地 --><?php echo $building_access ?>
                </p>
                <?php endif ?>
            </div>

            <!-- アクセス -->
            <?php if ($building_nearest_station1["station"] != "") : ?>
            <div class="flex">
                <?php if (($building_nearest_station1["line"] != "" || $building_nearest_station1["station"] != "") && $building_nearest_station1["walk_time_to_station"] != "") : ?>
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train_yellow.svg" alt="">
                </figure>
                <p>
                    <!-- 最寄り駅1 --><?php echo $building_nearest_station1["line"] ?>  <?php echo $building_nearest_station1["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span>
                </p>
                <?php endif ?>
                <?php $building_nearest_station2 = get_field('building_nearest_station2', $parents_id);  ?>
                <?php if (($building_nearest_station2["line"] != "" || $building_nearest_station2["station"] != "") && $building_nearest_station2["walk_time_to_station"] != "") : ?>
                <p class="room_second_nearest_station">
                    <!-- 最寄り駅2 --><?php echo $building_nearest_station2["line"] ?>  <?php echo $building_nearest_station2["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station2["walk_time_to_station"] ?>分</span>
                </p>
                <?php endif ?>
            </div>
            <?php endif ?>
        </div>

        <?php endif ?>  

        <div class="room_btns">
            <a href="<?php the_permalink($post); ?>" class="btn_line">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_room.svg" alt="">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_room_white.svg" alt="">
                    <p>お部屋詳細を見る</p>
                </div>
            </a>
            <a href="<?php echo esc_url(home_url('/building_contact/')); ?>?id=<?php echo get_the_ID() ?>&room_name=<?php echo get_the_title($parents_id) ?> <?php the_field("room_number") ?>" class="btn_blue">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_contact.svg" alt="">
                    <p>お問い合わせ</p>
                </div>
            </a>
        </div>
        <div class="p-main sp_fav" data-btn_pageid="<?php echo $post_id ?>">
            <div class="p-fav_button flex">
                <span class="__text">お気に入り</span>
                <span class="__icon"></span>
            </div>
        </div>
    </div>

    <?php if (!is_singular("building")) : ?>
    <div class="flex pc_room_access_location">
        <!-- アクセス -->
        <?php if ($building_nearest_station1["station"] != "") : ?>
        <div class="flex">
            <?php if (($building_nearest_station1["line"] != "" || $building_nearest_station1["station"] != "") && $building_nearest_station1["walk_time_to_station"] != "") : ?>
            <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_train_yellow.svg" alt="">
            </figure>
            <p>
                <!-- 最寄り駅1 --><?php echo $building_nearest_station1["line"] ?>  <?php echo $building_nearest_station1["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span>
            </p>
            <?php endif ?>
            <?php $building_nearest_station2 = get_field('building_nearest_station2', $parents_id);  ?>
            <?php if (($building_nearest_station2["line"] != "" || $building_nearest_station2["station"] != "") && $building_nearest_station2["walk_time_to_station"] != "") : ?>
            <p class="room_second_nearest_station">
                <!-- 最寄り駅2 --><?php echo $building_nearest_station2["line"] ?>  <?php echo $building_nearest_station2["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station2["walk_time_to_station"] ?>分</span>
            </p>
            <?php endif ?>
        </div>
        <?php endif ?>

        <!-- 所在地 -->
        <?php $building_municipalities = get_field('building_municipalities', $parents_id);  ?>
        <?php $building_access = get_field('building_access', $parents_id);  ?>
        <?php if ($building_prefecture != "" && $building_municipalities != "" && $building_access != "") : ?>
        <div class="flex">
            <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_yellow.svg" alt="">
            </figure>
            <p>
                <!-- 市区町村 --><?php echo $building_municipalities ?>
                <!-- 番地 --><?php echo $building_access ?>
            </p>
        </div>
        <?php endif ?>
    </div>

    <?php endif ?>
</article>
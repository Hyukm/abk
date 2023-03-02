<!-- 読み込みファイル　→　page-building.php -->

<!-- お部屋の親となる物件のIDを取得 -->

<article class="building_card_article">
    <a href="<?php the_permalink($post); ?>" class="room_container_link"></a>
    <div class="flex building_card">
        
        <?php
        $building_image1 = get_field('building_image1');
        $img = $building_image1['image'];
        $src = wp_get_attachment_image_src($img, 'full');
        $caption = $building_image1['caption'];
        ?>
        <?php if(!empty($src[0])) { ?>
            <img src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="building_card_img">
        <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="building_card_img">
        <?php } ?>
        <div class="building_card_middle">
            <?php $title = get_field('building_name') != "" ? get_field('building_name') : "-" ?>
            <h2><?php echo $title ?></h2>

            <?php if(!empty($src[0])) { ?>
                <img src="<?php echo $src[0]; ?>" alt="<?php echo $caption; ?>" class="building_card_img">
            <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing" class="building_card_img">
            <?php } ?>

            <?php
            $building_type_2 = get_the_terms($post->id, 'building_type_2');
            $building_type_1 = get_the_terms($post->id, 'building_type_1');
            if ($building_type_1 && $building_type_2) :
                foreach ($building_type_1 as $post_term_1) :
                    if ($post_term_1->name === '賃貸物件') {
                        foreach ($building_type_2 as $post_term_2) :?>
                            <span class="tag_blue">賃貸<?php echo $post_term_2->name; ?></span>
                        <?php endforeach; 
                    } else if ($post_term_1->name === '売買物件') {
                        foreach ($building_type_2 as $post_term_2) :?>
                            <span class="tag_blue">売買<?php echo $post_term_2->name; ?></span>
                        <?php endforeach; 
                    } else {
                        foreach ($building_type_2 as $post_term_2) :?>
                            <span class="tag_blue"><?php echo $post_term_2->name; ?></span>
                        <?php endforeach; 
                    }
                endforeach; 
            endif ?>

            <p class="sp_only"><?php the_field("building_municipalities") ?> <?php the_field("building_access") ?></p>
                
            <?php if (get_field("building_PR") != "") : ?>
            <p><?php the_field("building_PR") ?></p>
            <?php else : ?>
            <p>-</p>
            <?php endif ?>
            <div class="pbi_middle_table">
                <dl>
                    <dt>築年月</dt>
                    <?php $build_yearmonth = get_field("building_old") != "" ? get_field("building_old") : "-" ?>
                    <dd><?php echo $build_yearmonth ?></dd>
                </dl>
                <dl>
                    <dt>構造</dt>
                    <?php $structure = get_field("building_structure") != "" ? get_field("building_structure") : "-" ?>
                    <dd><?php echo $structure ?></dd>
                </dl>
                <dl>
                    <dt>総戸数</dt>
                    <?php $unit = get_field("building_unit") != "" ? get_field("building_unit") : "-" ?>
                    <dd><?php echo $unit ?>戸</dd>
                </dl>
                <dl>
                    <dt>総階数</dt>
                    <?php $floorNum = get_field("building_floor") != "" ? get_field("building_floor") : "-" ?>
                    <dd><?php echo $floorNum ?>階</dd>
                </dl>
            </div>
        </div>
        <div class="building_card_right address_access">
            <div>
                <div>
                    <p><img src="<?php echo get_template_directory_uri(); ?>/img/icon_area_yellow.svg" alt=""><?php the_field("building_municipalities") ?> <?php the_field("building_access") ?></p>
                </div>
                <div>
                    <h3><img src="<?php echo get_template_directory_uri(); ?>/img/icon_train_yellow.svg" alt="">アクセス</h3>
                    <ul>
                        <?php $building_nearest_station1 = get_field('building_nearest_station1');  ?>
                        <?php if ($building_nearest_station1["line"] != "") : ?>
                        <li><?php echo $building_nearest_station1["line"] ?><br class="tb_none"><?php echo $building_nearest_station1["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station1["walk_time_to_station"] ?>分</span></li>
                        <?php else : ?>
                        <li>-</li>
                        <?php endif; ?>

                        <?php $building_nearest_station2 = get_field('building_nearest_station2');  ?>
                        <?php if ($building_nearest_station2["line"] != "") : ?>
                        <li><?php echo $building_nearest_station2["line"] ?><br class="tb_none"><?php echo $building_nearest_station2["station"] ?>から徒歩<span class="red_bold"><?php echo $building_nearest_station2["walk_time_to_station"] ?>分</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <a href="<?php the_permalink($post); ?>" class="btn_blue btn_arrow">物件詳細を見る</a>
        </div>
    </div>
</article>
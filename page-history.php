<?php get_header(); ?>
    <main>
        
        <!-- パンくずリスト -->
        <section class="breadcrumbs">
            <div class="wrapper">
                <div class="aioseo-breadcrumbs">
                    <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" title="トップページ">トップページ</a></span>
                    <span class="aioseo-breadcrumb-separator">›</span>
                    <span class="aioseo-breadcrumb">閲覧履歴</span>
                </div>
            </div>
        </section>
        <section class="page_default">
            <div class="wrapper">
                <h1>閲覧履歴</h1>

                <!-- サブクエリの条件の取得 -->
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                if (isset($_COOKIE["history_item"])) {
                    $cookie = $_COOKIE['history_item']; // 文字列（string型）
                    $history = substr($cookie, 1, -1);
                    $history = explode(",", $history); // 文字列の最初と最後の文字を削除
                    $history = array_map('intval', $history);
                    $args = array(
                        'post_type' => 'building', // 投稿タイプを指定
                        'paged' => $paged,
                        'post__in' => $history,
                        'posts_per_page' => 30,
                        'orderby'=>'post__in', // Cookieで登録した配列順
                        'post_parent__not_in' => array(0), // 親を持たない投稿(親)を除外する
                    );

                    // サブクエリの発行
                $the_query = new WP_Query($args);
                ?>

                <p><span class="red_bold"><?php echo $the_query->found_posts; ?></span>件のお部屋が該当しました</p>

                <?php
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        
                        get_template_part('template-parts/room_card');

                    endwhile;

                    if ($the_query->max_num_pages > 0) {
                        echo "<div class='room_pager'>";
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => 'page/%#%/',
                            'current' => max(1, $paged),
                            'total' => $the_query->max_num_pages,
                            'prev_text' => '<<', //次への表示指定
                            'next_text' => '>>'//前への表示指定
                        ));
                        echo "</div>";
                    };

                else :
                    ?>
                    <p>履歴はありません</p>
                    <?php
                endif;
                wp_reset_postdata();
                    
                } else { ?>
                    <p>履歴はありません</p>
                <?php } ?>
            </div>
        </section>

    </main>
<?php get_footer(); ?>
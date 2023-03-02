<!-- サブクエリの条件の取得 -->
<?php
$args = array(
    'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
    'paged'          => get_query_var('paged') ?: 1, // 何ページ目の記事を取得するか.
    'posts_per_page' => 30, // 1ページに表示する記事数.
    'post_parent' => 0, // 親を持たない投稿（物件）を指定
    'order' => "ASC", // 昇順
    'orderby' => "title", // タイトルで並び替え
    's' => get_search_query() // 必ず記載が必要
);

// サブクエリの発行
$the_query = new WP_Query($args);
?>

<?php get_header(); ?>
    <main>
        <section class="breadcrumbs">
            <div class="wrapper">
                <div class="aioseo-breadcrumbs">
                    <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" title="トップページ">トップページ</a></span>
                    <span class="aioseo-breadcrumb-separator">›</span>
                    <span class="aioseo-breadcrumb">全物件一覧</span>
                </div>
            </div>
        </section>
        <section>
            <div class="wrapper">
                <h1>全物件一覧</h1>
                <p><span class="red_bold"><?php echo $the_query->found_posts; ?></span>件の物件が該当しました</p>

                <?php
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        
                        get_template_part('template-parts/building_card');

                    endwhile;

                    if ($the_query->max_num_pages > 0) {
                        echo "<div class='room_pager'>";
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => 'page/%#%/',
                            // 'format' => '?paged=%#%',
                            'current' => max(1, $paged),
                            'total' => $the_query->max_num_pages,
                            'prev_text' => '<<', //次への表示指定
                            'next_text' => '>>'//前への表示指定
                        ));
                        echo "</div>";
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
    </main>
<?php get_footer(); ?>
<?php get_header(); ?>
<main>
    <!-- パンくずリスト -->
    <section class="breadcrumbs">
        <div class="wrapper">
            <?php if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs(); ?>
        </div>
    </section>
    <section>
        <div class="wrapper">
            <h1>不動産お役立ち情報</h1>
            <ul class="picky_content">

            <?php // 投稿タイプを指定して親の投稿一覧を表示
            $args = array(
                'post_type' => 'for_beginners', // 投稿タイプを指定
                'order' => "ASC", // 投稿の古い順に出力
            );
            $the_query = new WP_Query($args); if($the_query->have_posts()):
            ?>
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

                <li>
                    <div class="picky_detail">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing">
                            <?php endif ; ?>
                            <h2><?php the_title();//タイトル?></h2>
                        </a>
                    </div>
                    <p><?php $directory_text = get_field('directory_text'); ?><?php echo $directory_text; ?></p>
                </li>

            <?php endwhile; ?>
            <?php endif; ?>
            
            </ul>
        </div>
    </section>
</main>
<?php get_footer(); ?>
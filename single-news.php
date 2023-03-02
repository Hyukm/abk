<?php get_header(); ?>
<main>
<!-- パンくずリスト -->
<section class="breadcrumbs">
    <div class="wrapper">
        <div class="aioseo-breadcrumbs">
            <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" title="トップページ">トップページ</a></span>
            <span class="aioseo-breadcrumb-separator">›</span>
            <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/news/')); ?>" title="お知らせ">お知らせ</a></span>
            <span class="aioseo-breadcrumb-separator">›</span>
            <span class="aioseo-breadcrumb"><?php the_title() ?></span>
        </div>
    </div>
</section>
    <section class="single_news">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <div class="post_page flex">

                <!-- 左カラム -->
                <div class="post_list">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post_thumbnail">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </div>
                    <?php endif ; ?>
                    <div class="post_contents">
                        <time><?php the_time('Y年m月d日'); //投稿年月日
                                ?></time>
                        <?php
                        $terms_cat = get_the_terms($post->ID, 'news_cat');
                        if (!empty($terms_cat)) : ?>
                            <?php foreach ($terms_cat as $term) : ?>
                                <!--表示するカテゴリーがあるとき LOOP-->
                                <span class="tag_yellow"><?php echo $term->name; ?></span>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <!--表示するカテゴリーがないとき-->
                            <span class="tag_yellow"><?php echo '未分類'; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="the_content">
                        <?php the_content(); //本文
                        ?>
                    </div>
                    
                </div>

                <!-- 右カラム -->
                <?php get_sidebar('news'); ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
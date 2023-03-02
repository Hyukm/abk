<?php get_header(); ?>

<main class="no_triangle">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section>
                <div class="h1_img">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing">
                    <?php endif; ?>
                    <h1><?php the_title(); ?></h1>
                </div>
                <!-- パンくずリスト -->
                <section class="breadcrumbs beginners_breadcrumbs">
                    <div class="wrapper">
                        <?php if (function_exists('aioseo_breadcrumbs')) aioseo_breadcrumbs(); ?>
                    </div>
                </section>
                <div class="wrapper">
                    <div class="the_content">
                        <?php the_content(); //本文　
                        ?>
                    </div>
                </div>
            </section>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>
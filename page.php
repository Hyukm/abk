<?php get_header(); ?>
<?php if (is_page(array('company', 'staff', 'tranc'))) { ?>
    <main class="no_triangle">
        <section>
            <div class="h1_img">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full'); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/now_printing.png" alt="now_printing">
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>
            </div>
        </section>
        <section class="breadcrumbs">
            <div class="wrapper">
                <?php if (function_exists('aioseo_breadcrumbs')) aioseo_breadcrumbs(); ?>
            </div>
        </section>
        <section>
            <div class="wrapper">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="the_content">
                            <?php the_content(); //本文 
                            ?>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div>記事が見つかりません。</div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php } else { ?>
    <main>
        <section class="breadcrumbs">
            <div class="wrapper">
                <?php if (function_exists('aioseo_breadcrumbs')) aioseo_breadcrumbs(); ?>
            </div>
        </section>
        <section>
            <div class="wrapper">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="the_content">
                            <?php the_content(); //本文 
                            ?>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div>記事が見つかりません。</div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php } ?>
<?php get_footer(); ?>
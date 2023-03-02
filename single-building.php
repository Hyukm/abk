<?php get_header(); ?>

<main>
    <!-- 物件の場合 -->
    <?php if ($post->post_parent == 0) : ?>
        <div class="building_content">
            <?php get_template_part('template-parts/building_content'); ?>
        </div>
        <!-- お部屋の場合 -->
    <?php else : ?>
        <div data-pageid="<?php echo get_the_ID() ?>" class="room_content">
            <?php get_template_part('template-parts/room_content'); ?>
        </div>
    <?php endif ?>
</main>

<?php get_footer(); ?>
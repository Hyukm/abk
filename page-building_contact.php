<?php
    // フォームの初期処理としてCF7に関連するCookieを削除
    // cf7msm_cookie_removeはプラグインからの参考に作成
    cf7msm_cookie_remove( 'cf7msm-step' );
    cf7msm_cookie_remove( 'cf7msm_posted_data' );
    cf7msm_cookie_remove( 'cf7msm_prev_urls' );
    cf7msm_cookie_remove( 'cf7msm-first-step' );
    cf7msm_cookie_remove( 'cf7msm_big_cookie' );
?>

<?php get_header(); ?>
<div class="form__modal modal__bg" id="modal">
    <div class="modal__content">
        <div class="modal_title">
            <h3 class="ja">お問い合わせ、お申込みご利用時の注意事項</h3>
        </div>
        <ol class="modal_text">
            <li>
                <p><span>ブラウザーの戻るボタンに対応しておりません。</span><br>前の画面に戻る場合は画面下部の「戻る」ボタンをご使用ください。</p>
            </li>
            <li>
                <p><span>複数画面（タブやブラウザ）での操作はできません。</span><br>他のタブやブラウザを利用して複数のお問い合わせ、またはお申込みを同時に行うことはできません。<br>※ サイト側で同時お申込みを検知した場合は、お申込みを中断しＴＯＰ画面に戻ります。<br>その場合はお手数をおかけしますが始めから入力し直していただきますようよろしくお願いいたします。</p>
            </li>
            <li>
                <p><span>インターネット接続にて問題が発生した場合、自動的にタイムアウトします。</span><br>タイムアウトが発生した場合は、お手数をおかけしますが始めから入力し直していただきますようよろしくお願いいたします。</p>
            </li>
        </ol>
        <div class="modal_btn">
            <button class="btn_search btn_blue btn_arrow agree_btn">同意して入力画面に進む</button>
            <a href="javascript:history.back()">前の画面に戻る</a>
        </div>
    </div>
</div>
<main>
    <section class="breadcrumbs">
        <div class="wrapper">
            <?php if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs(); ?>
        </div>
    </section>
    <section>
        <div class="wrapper">
            <h1>お問い合わせ</h1>
            <h2>お問い合わせ物件</h2>
            <div>
            <?php
                // クエリからお部屋の投稿IDを取得
                $id = $_GET["id"];
                $room_name = $_GET["room_name"];
                $parents_slug = get_post_field( 'post_name', intval($id) );

                // お部屋の投稿IDだった場合 ------------------------------------------
                $args = array(
                    'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
                    'posts_per_page' => 1, // 1ページに表示する記事数.
                    'post_parent__not_in' => array(0), // 親を持たない投稿を除外する
                    'p' => $id,
                );
                
                // サブクエリの発行
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        
                        get_template_part('template-parts/room_card');
    
                    endwhile;
                endif;
                // ---------------------------------------------------------------------

                // 物件の投稿IDだった場合 -----------------------------------------------
                $args = array(
                    'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
                    'posts_per_page' => 1, // 1ページに表示する記事数.
                    'post_parent' => 0, // 親を持たない投稿（物件）を指定
                    'p' => $id,
                );
                
                // サブクエリの発行
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        
                        get_template_part('template-parts/building_card');
    
                    endwhile;
                ?>
                
                <div class="page_contact">
                    <a class="btn_yellow btn_arrow btn_select_room" href="<?php echo esc_url(home_url('/list/')); ?><?php echo $parents_slug ?>">お部屋を選択する</a>
                </div>
                
                <?php
                endif;
                wp_reset_postdata();
                // --------------------------------------------------------------------
            ?>
            </div>
            <h2>上記物件について問い合わせる</h2>
            <?php echo do_shortcode('[contact-form-7 id="33" title="物件お問い合わせ"]'); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
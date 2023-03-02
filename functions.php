<?php

//テーマサポート
add_theme_support('menus');
add_theme_support('title-tag');
add_theme_support('post-thumbnails',);

// 画像のアップロード時のトリミングサイズ追加
add_image_size('thumb_main', 640, 360, true);
add_image_size('thumb_side', 360, 200, true);

//Gutenberg デフォルトスタイルを有効化
add_action('after_setup_theme', 'nxw_setup_theme');
function nxw_setup_theme()
{
    add_theme_support('wp-block-styles');
}

//Gutenberg 幅広・全幅の対応
add_theme_support('align-wide');

//ダッシュボードにある項目を消す
function remove_dashboard_widget()
{
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); //サイトヘルスステータス
    // remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //概要
    // remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //アクティビティ
    // remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //クイックドラフト
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); //WordPressニュース
    // remove_action('welcome_panel', 'wp_welcome_panel'); //ようこそ
    remove_meta_box('wp_mail_smtp_reports_widget_lite', 'dashboard', 'normal'); //SMTP
    remove_meta_box('aioseo-overview', 'dashboard', 'normal'); //AIO
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');


// 管理画面上の投稿を削除
function remove_menus()
{

    remove_menu_page('edit.php'); // 投稿.
    remove_menu_page('edit-comments.php'); // コメント
}
add_action('admin_menu', 'remove_menus', 999);

//css
function abk_style()
{
    //GoogleFonts
    echo
    ' <link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo
    '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo
    '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">' . "\n";

    if (is_front_page() || is_home()) {
        wp_enqueue_style('sanitize', '//unpkg.com/sanitize.css', array());
        wp_enqueue_style('yakuhan', '//cdn.jsdelivr.net/npm/yakuhanjp@3.4.1/dist/css/yakuhanjp.min.css', array(), '1.0.0');
        wp_enqueue_style('swiper', '//unpkg.com/swiper@7/swiper-bundle.min.css', array());
        wp_enqueue_style('common-css', get_template_directory_uri() . '/css/common.css', array(), '1.0.0');
        wp_enqueue_style('top', get_template_directory_uri() . '/css/top.css', array(), '1.0.0');
    } else {
        wp_enqueue_style('sanitize', '//unpkg.com/sanitize.css', array());
        wp_enqueue_style('yakuhan', '//cdn.jsdelivr.net/npm/yakuhanjp@3.4.1/dist/css/yakuhanjp.min.css', array(), '1.0.0');
        wp_enqueue_style('common-css', get_template_directory_uri() . '/css/common.css', array(), '1.0.0');
        wp_enqueue_style('pages-css', get_template_directory_uri() . '/css/pages.css', array(), '1.0.0');
        wp_enqueue_style('room-css', get_template_directory_uri() . '/css/room.css', array(), '1.0.0');
    }

    // datepicker
    if (is_page('reserve')) {
        wp_enqueue_style('datepicker', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css', array());
    }

    // swiper
    if (is_singular('building')) {
        wp_enqueue_style('swiper', '//unpkg.com/swiper@7/swiper-bundle.min.css', array());
    }

    // 管理会社をお探しのオーナー様へ
    if (is_page('for_owner')) {
        wp_enqueue_style('for_owner', get_template_directory_uri() . '/css/for_owner.css', array(), '1.0.0');
    }

    // お部屋詳細印刷用
    if (is_singular('building')) {
        wp_enqueue_style('print_out', get_template_directory_uri() . '/css/room_printout.css', array());
    }

    // 会社概要、トランクルーム
    if (is_page(array('company', 'tranc'))) {
        wp_enqueue_style('scroll-hint', get_template_directory_uri() . '/css/scroll-hint.css', array(), '1.0.0');
    }

    if (is_singular('for_beginners')) {
        wp_enqueue_style('scroll-hint', get_template_directory_uri() . '/css/scroll-hint.css', array());
    }
}
add_action('wp_enqueue_scripts', 'abk_style');

// js
function abk_script()
{
    if (is_front_page() || is_home()) {
        wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', array(), '', true);
        wp_enqueue_script('cookie', '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', array(), '', true);
        // wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '', true);
        wp_enqueue_script('swiper-bundle', '//unpkg.com/swiper@7/swiper-bundle.min.js', array(), '', true);
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '', true);
        wp_enqueue_script('cookiePolicy', get_template_directory_uri() . '/js/cookiePolicy.js', array(), '', true);
        wp_enqueue_script('header', get_template_directory_uri() . '/js/header.js', array(), '', true);
        wp_enqueue_script('top', get_template_directory_uri() . '/js/top.js', array(), '', true);
    } else {
        wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', array(), '', true);
        wp_enqueue_script('cookie', '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', array(), '', true);
        wp_enqueue_script('cookiePolicy', get_template_directory_uri() . '/js/cookiePolicy.js', array(), '', true);
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '', true);
    }

    // 物件詳細・お部屋詳細
    if (is_singular("building")) {
        wp_enqueue_script('history', get_template_directory_uri() . '/js/history.js', array(), '', true);
        wp_enqueue_script('swiper-bundle', '//unpkg.com/swiper@7/swiper-bundle.min.js', array(), '', true);
        wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.js', array(), '', true);
    }

    // お部屋の個別ページ、お部屋のアーカイブ、候補リスト、閲覧履歴、検索ページ、所在地のタクソノミーアーカイブ、沿線のタクソノミーアーカイブ
    if (is_singular("building") || is_page("room_archive") || is_page("favorite") || is_page("history") || is_tax("location") || is_tax("station") || is_search()) {
        wp_enqueue_script('favorite', get_template_directory_uri() . '/js/favorite.js', array(), '', true);
    }

    // datepicker
    if (is_page("reserve")) {
        wp_enqueue_script('datepicker', get_template_directory_uri() . '/js/datepicker.js', array(), '', true);
        wp_enqueue_script('datepicker2', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), '', true);
        wp_enqueue_script('datepicker3', '//ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js', array(), '', true);
    }
    // CF7のCookieが残っていた場合はリロードする・同意したらモーダルが消える・複数タブ検知のモーダルを出力する
    // お問い合わせ、来店予約、物件お問い合わせ、物件リクエスト
    if (is_page(array("contact", "reserve", "building_contact", "request"))) {
        wp_enqueue_script('modal', get_template_directory_uri() . '/js/modal.js', array(), '', true);
        wp_enqueue_script('loadByCF7Cookie', get_template_directory_uri() . '/js/loadByCF7Cookie.js', array(), '', true);
        wp_enqueue_script('resetCache', get_template_directory_uri() . '/js/resetCache.js', array(), '', true);
    }
    // 一定時間置きにCF7のCookieが存在するか確かめる機能
    // お問い合わせ確認画面、来店予約確認画面、物件お問い合わせ確認画面、物件リクエスト確認画面
    if (is_page(array("contact_confirm", "reserve_confirm", "building_contact_confirm", "request_confirm"))) {
        wp_enqueue_script('checkCF7Cookie', get_template_directory_uri() . '/js/checkCF7Cookie.js', array(), '', true);
    }

    // 会社概要、トランクルーム
    if (is_page(array("company", "tranc"))) {
        wp_enqueue_script('scroll-hint.min', get_template_directory_uri() . '/js/scroll-hint.min.js', array(), '', true);
    }

    if (is_singular('for_beginners')) {
        wp_enqueue_script('scroll-hint.min', get_template_directory_uri() . '/js/scroll-hint.min.js', array(), '', true);
    }
}
add_action('wp_enqueue_scripts', 'abk_script');

// 投稿(お知らせ)のアーカイブページを作成する
// function post_has_archive($args, $post_type)
// {
//     if (!is_main_site()) {
//         $args['rewrite'] = true; // リライトを有効にする
//         $args['has_archive'] = 'members'; // 任意のスラッグ名
//         $args['label'] = 'ブログ'; //管理画面左ナビに「投稿」の代わりに表示される
//     }
//     return $args;
// }
// add_filter('register_post_type_args', 'post_has_archive', 10, 2);

/*【出力カスタマイズ】年別アーカイブリストに年を表示する */
function my_get_archives_link($html)
{
    return preg_replace('/<\/a>/', '年</a>', $html);
}
add_filter('get_archives_link', 'my_get_archives_link');




//ビジュアルエディタにオリジナルのCSSを適用する
add_editor_style('css/editor-style.css');
//エディタ専用



// TinyMCE のカスタム
function custom_editor_settings($initArray)
{
    $initArray['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;';
    $initArray['fontsize_formats'] = '小さい=87.5% 普通=100% 大きい=150%';

    //文字色
    $custom_colors = '
    "20428C", "青",
    "B99E61", "黄",
    "DC0508", "赤",
    "fff", "白",
    ';
    $initArray['textcolor_map'] = '[' . $custom_colors . ']';
    // $initArray['textcolor_cols'] = 5; // 列数
    // $initArray['textcolor_rows'] = 1; // 行数


    //スタイル
    $style_formats = array(
        array(
            'title' => 'ボタン（グラデーション）',
            'inline' => 'a',
            'classes' => 'btn_blue btn_arrow'
        ),
        array(
            'title' => 'ボタン（ライン）',
            'inline' => 'a',
            'classes' => 'btn_line btn_arrow'
        ),
        array(
            'title' => 'カード①',
            'block' => 'div',
            'classes' => 'editor_card_1',
            'wrapper' => true
        ),
        array(
            'title' => 'カード①用 見出し',
            'inline' => 'span',
            'classes' => 'card_title'
        ),
        array(
            'title' => 'カード②',
            'block' => 'div',
            'classes' => 'editor_card_2',
            'wrapper' => true
        ),
        array(
            'title' => 'カード②用 見出し',
            'inline' => 'span',
            'classes' => 'card_title'
        ),
        array(
            'title' => '表用 タイトル',
            'selector' => 'table',
            'inline' => 'span',
            'classes' => 'table_title'
        ),
        // array(
        //     'title' => '表用 SP対応',
        //     // 'selector' => 'table',
        //     'block' => 'div',
        //     'classes' => 'table-wrapper',
        //     'exact' => true,
        //     'wrapper' => true
        // ),
        array(
            'title' => '横並び 枠組',
            'block' => 'div',
            'classes' => 'flex',
            'exact' => true,
            'wrapper' => true
        ),
        array(
            'title' => '横並び 要素',
            'inline' => 'span',
            'classes' => 'flex_content'
            // 'exact' => true,
            // 'wrapper' => true,
        ),
    );
    $initArray['style_formats'] = json_encode($style_formats);
    return $initArray;
}
add_filter('tiny_mce_before_init', 'custom_editor_settings');



//投稿エディタ内での各種自動変換を停止する
function my_customize_mce_options($init)
{
    global $allowedposttags;
    $init['valid_elements']          = '*[*]'; //空のタグの自動消去を無効化
    $init['extended_valid_elements'] = '*[*]'; //空のタグの自動消去を無効化
    $init['valid_children']          = '+a[' . implode('|', array_keys($allowedposttags)) . ']'; //aタグ内で全てのタグを使用可能にする
    $init['indent']                  = true;
    $init['wpautop']                 = false; //pタグの自動挿入を無効化
    $init['force_p_newlines'] = false; //pタグの自動挿入を無効化
    $init['force_br_newlines'] = true; //brタグの自動挿入を無効化
    $init['forced_root_block'] = ''; //pタグの自動挿入を無効化
    return $init;
}
add_filter('tiny_mce_before_init', 'my_customize_mce_options');
function change_excerpt_mblength($length)
{
    return 200;
}
add_filter('excerpt_mblength', 'change_excerpt_mblength');



// オートフォーマット関連の無効化
add_action('init', function () {
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('the_title', 'wpautop');
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_editor_content', 'wp_richedit_pre');
    // scf追加
    remove_filter('scf_the_content', 'wpautop');
});



// オートフォーマット関連の無効化 TinyMCE
add_filter('tiny_mce_before_init', function ($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = true;
    return $init;
});
function disable_page_wpautop()
{
    if (is_page()) remove_filter('the_content', 'wpautop');
}
add_action('wp', 'disable_page_wpautop');


// the_excerpt();の文字数を50字に (ニュース一覧)
function new_excerpt_mblength($length)
{
    return 80; //抜粋する文字数を50文字に設定
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');


// 検索条件を表示する
function display_search(array $array, string $title, string $other)
{
    if (count($array) == 0) {
        return;
    }

    $display_search = "";

    foreach ($array as $index => $search) {
        if ($other != "") {
            $display_search = $display_search . $search . $other;
        } else {
            $display_search .= $search;
        }

        if ($index !== array_key_last($array)) {
            // 最後(終端処理)
            $display_search .= "、";
        }
    }

    // 築年月の新築 / 1年未満の表記を修正する 
    if ($display_search == "1年未満") {
        $display_search = "新築 / 1年未満";
    }

    // 敷金・礼金・保証金0以外
    if ($title != $display_search) {
        return '<li>' . $title . ": " . $display_search . '</li>';
    } else { // 敷金・礼金・保証金0
        return '<li>' . $display_search . '</li>';
    }
}

// 賃料の出力にカンマを入れて出力する
function display_price_search(array $array, string $title, string $other)
{
    if (count($array) == 0) {
        return;
    }

    $display_search = "";

    foreach ($array as $index => $search) {
        $search = number_format(intval($search));
        if ($other != "") {
            $display_search = $display_search . $search . $other;
        } else {
            $display_search .= $search;
        }

        if ($index !== array_key_last($array)) {
            // 最後(終端処理)
            $display_search .= "、";
        }
    }

    return '<li>' . $title . ": " . $display_search . '</li>';
}


/**
 * 引き渡された検索条件をCookieに設定し値を返却する
 * 設定されていない場合はCookie値を返却する
 */
function addCookie($key)
{
    if (isset($_GET[$key])) {
        if (is_array($_GET[$key])) {
            for ($i = 0; $i < count($_GET[$key]); $i++) {
                setcookie($key . '[' . $i . ']', $_GET[$key][$i], "/");
            }
        } else {
            setcookie($key, $_GET[$key], "/");
            // echo $key . " ";
            // var_dump($_GET[$key]);
            // var_dump(isset($_GET[$key]));
            // echo "<br>";
        }
        return $_GET[$key];
    } else {
        if (isset($_COOKIE[$key])) { // Cookieが既に登録されている場合
            return isset($_GET['detailedSearch']) ? '' : $_COOKIE[$key];
        } else { // Cookieが登録されていない場合はから文字列を返す
            return "";
        }
    }
}

/**
 * 引き渡された検索条件をCookieから削除する
 */
function delCookie($key)
{
    if (isset($_COOKIE[$key])) {
        if (isset($_COOKIE[$key]) && is_array($_COOKIE[$key])) {
            for ($i = 0; $i < count($_COOKIE[$key]); $i++) {
                setcookie($key . '[' . $i . ']', '', time() - 3600, "/");
            }
        } else {
            setCookie($key, '', time() - 3600, "/");
        }
    }
}

/**
 * カスタムフィールドでチェックされた要素を全て含む検索条件を生成
 */
function createMetaQueryMultiSelect($key, $value)
{
    $args_custum_query[] = array(
        'key' => $key,
        'value' => $value,
        'compare' => '='
    );
    $args_custum_query['relation'] = 'AND';
    return $args_custum_query;
}

/**
 * カスタムタクソノミーのスラッグから値を取得
 */
function getValueByTaxonomySlug($slug, $taxonomy, $array)
{
    if (is_array($slug)) {
        for ($i = 0; $i < count($slug); $i++) {
            if ($slug[$i] == "over4k") {
                continue;
            }
            $object = get_term_by('slug', $slug[$i], $taxonomy);
            $array[] = $object->name;
        }
        // トップページのフォームの4k~の項目
        if (in_array("over4k", $slug)) {
            $array = array_merge($array, ["4R", "4K", "4SK", "4DK", "4LDK", "4SDK", "4SLDK", "5R", "5K", "5SK", "5DK", "5LDK", "5SDK", "5SLDK", "6R", "6K", "6SK", "6DK", "6LDK", "6SDK", "6SLDK", "7R", "7K", "7SK", "7DK", "7LDK", "7SDK", "7SLDK",]);
        }
    } else {
        $object = get_term_by('slug', $slug, $taxonomy);
        $array[] = $object->name;
    }

    return $array;
}


// ページャー
function pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2) + 1; //表示するページ数（５ページを表示）
    global $paged; //現在のページ値
    if (empty($paged)) $paged = 1; //デフォルトのページ
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages; //全ページ数を取得
        $page_all = $wp_query->found_posts;; //件数を取得
        $number_per_page = $wp_query->query_vars['posts_per_page'];; //一回の取得件数を取得
        if (!$pages) //全ページ数が空の場合は、１とする
        {
            $pages = 1;
        }
    }
    if (1 != $pages) //全ページが１でない場合はページネーションを表示する
    {
        echo "<div class=\"pager\">\n";
        echo "<ul class=\"pagination\">\n";
        //Prev：現在のページ値が１より大きい場合は表示
        if ($paged > 1) echo "<li class=\"pre\"><a href='" . get_pagenum_link($paged - 1) . "'><span></span></a></li>\n";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                //三項演算子での条件分岐
                echo ($paged == $i) ? "<li><a class=\"active\" href='" . get_pagenum_link($i) . "'><span>" . $i . "</span></a></li>\n" : "<li><a href='" . get_pagenum_link($i) . "'><span>" . $i . "</span></a></li>\n";
            }
        }
        //Next：総ページ数より現在のページ値が小さい場合は表示
        if ($paged < $pages) echo "<li class=\"next\"><a href=\"" . get_pagenum_link($paged + 1) . "\"><span></span></a></li>\n";
        echo "</ul>\n";
        echo "</div>\n";
    }
    // echo "pages(ページャーの総ページ数)";
    // echo $pages;
    // echo '<br>';
    // echo "paged(ページャーの現在のページ値)";
    // echo $paged;
    // echo '<br>';
    // echo "page_all(検索にヒットした件数)";
    // echo $page_all;
    // echo '<br>';
    // echo "number_per_page(一回の取得件数)";
    // echo $number_per_page;
    // echo '<br>';
}


// フォーム いずれか必須
// function my_wpcf7_validate($result, $tags)
// {
//     // お問い合わせ
//     $d1 = isset($_POST['tel_contact_8']) ? $_POST['tel_contact_8'] : '';
//     $d2 = isset($_POST['tel_contact_10']) ? $_POST['tel_contact_10'] : '';
//     $d3 = isset($_POST['text_contact_12']) ? $_POST['text_contact_12'] : '';
//     $d4 = isset($_POST['email_contact_14']) ? $_POST['email_contact_14'] : '';

//     if ($d1 === '' && $d2 === '' && $d3 === '' && $d4 === '') {
//         $result->invalidate('tel_contact_8', 'いずれかに入力してください。');
//         $result->invalidate('tel_contact_10', 'いずれかに入力してください。');
//         $result->invalidate('text_contact_12', 'いずれかに入力してください。');
//         $result->invalidate('email_contact_14', 'いずれかに入力してください。');
//     }

//     // お問い合わせ（お部屋）
//     $d5 = isset($_POST['tel_building_contact_9']) ? $_POST['tel_building_contact_9'] : '';
//     $d6 = isset($_POST['tel_building_contact_11']) ? $_POST['tel_building_contact_11'] : '';
//     $d7 = isset($_POST['text_building_contact_13']) ? $_POST['text_building_contact_13'] : '';
//     $d8 = isset($_POST['email_building_contact_15']) ? $_POST['email_building_contact_15'] : '';

//     if ($d5 === '' && $d6 === '' && $d7 === '' && $d8 === '') {
//         $result->invalidate('tel_building_contact_9', 'いずれかに入力してください。');
//         $result->invalidate('tel_building_contact_11', 'いずれかに入力してください。');
//         $result->invalidate('text_building_contact_13', 'いずれかに入力してください。');
//         $result->invalidate('email_building_contact_15', 'いずれかに入力してください。');
//     }

//     // 物件リクエスト
//     $d9 = isset($_POST['tel_request_6']) ? $_POST['tel_request_6'] : '';
//     $d10 = isset($_POST['tel_request_8']) ? $_POST['tel_request_8'] : '';
//     $d11 = isset($_POST['text_request_10']) ? $_POST['text_request_10'] : '';
//     $d12 = isset($_POST['email_request_12']) ? $_POST['email_request_12'] : '';

//     if ($d9 === '' && $d10 === '' && $d11 === '' && $d12 === '') {
//         $result->invalidate('tel_request_6', 'いずれかに入力してください。');
//         $result->invalidate('tel_request_8', 'いずれかに入力してください。');
//         $result->invalidate('text_request_10', 'いずれかに入力してください。');
//         $result->invalidate('email_request_12', 'いずれかに入力してください。');
//     }


//     // 来店予約
//     $d13 = isset($_POST['tel_reserve_14']) ? $_POST['tel_reserve_14'] : '';
//     $d14 = isset($_POST['email_reserve_16']) ? $_POST['email_reserve_16'] : '';

//     if ($d13 === '' && $d14 === '') {
//         $result->invalidate('tel_reserve_14', 'いずれかに入力してください。');
//         $result->invalidate('email_reserve_16', 'いずれかに入力してください。');
//     }

//     return $result;
// }
// add_filter('wpcf7_validate', 'my_wpcf7_validate', 11, 2);

// 管理画面にスタイルシートを読み込ませる
function admin_custom_css()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo("template_directory") . '/css/admin.css">';
}
add_action('admin_head', 'admin_custom_css');

// 管理画面にスクリプトを読み込ませる
function mytheme_admin_enqueue($hook)
{
    if ('post.php' != $hook) {
        return;
    }
    // jsファイルを追加
    wp_enqueue_script('my_admin_script', get_template_directory_uri() . '/js/admin.js');
}
add_action('admin_enqueue_scripts', 'mytheme_admin_enqueue');

// add_theme_support('title-tag')で効かないタイトルをカスタマイズする

// All In One SEO の固定ページタイトルタグを特定のページのみ変更する
function filter_aioseop_title_page($title)
{
    // 固定ページ sample のタイトル変更 
    $title = '検索結果';
    return $title;
};
add_filter('aioseop_title', 'filter_aioseop_title_page', 10, 1);



// お部屋経由のお申込みの場合
if (is_page("building_contact")) {
    function my_form_tag_filter($tag)
    {
        if (!is_array($tag)) {
            return $tag;
        }

        if (isset($_GET['room_name'])) {
            $name = $tag['name'];
            if ($name == 'room-name') {
                $tag['values'] = (array) $_GET['room_name'];
            }
        }

        return $tag;
    }
    add_filter('wpcf7_form_tag', 'my_form_tag_filter', 11);
}

/**
 * Contact Form のCookieを削除する
 */
function cf7msm_cookie_remove($var_name)
{
    $ret = '';
    $force_session = apply_filters('cf7msm_force_session', false);
    $allow_session = apply_filters('cf7msm_allow_session', $force_session);

    if ($allow_session && empty($_COOKIE['cf7msm_check'])) {
        if (isset($_SESSION[$var_name])) {
            unset($_SESSION[$var_name]);
        }
    } else {
        if (isset($_COOKIE[$var_name])) {
            setcookie(
                $var_name,
                '',
                1,
                COOKIEPATH,
                COOKIE_DOMAIN
            );
        }
    }
}

<?php

// -------------------------------------------------------------------------------------------------
// 定数定義　検索条件key
// -------------------------------------------------------------------------------------------------

// 所在地
const LOCATION = "location";
// 交通機関
const STATION = "station";
// 建物種別
const BUILDING_TYPE = "building_type_2";
// 賃料
const LOW_PRICE = "low_price";
const HIGH_PRICE = "high_price";
// 敷金・礼金・保証金0
const ZERO_MONEY = "zero_money";
// 間取りタイプ
const FLOOR_PLAN_TYPE = "floor_plan_type";
// 専有面積
const LOW_AREA = "low_area";
const HIGH_AREA = "high_area";
// 設備情報
const EQUIPMENTS = "equipments";
// 駅徒歩
const WALK_TIME_TO_STATION = "walk_time_to_station";
// 築年数
const BUILDING_OLD = "building_old";
// 契約内容
const CONTRACT_DETAILS = "contract_details";
// こだわりカテゴリー
const SPECIAL_CAT = "special_cat";
// 並び替え
const ORDER = "order";
// カンタン検索
const EASY_SEARCH = "easy_search";


// ---　処理ここから　-----------------------------------------------------------------------------------

// ------------------------------------------------------------------------------
// 他画面からの遷移の場合、Cookieを削除する
// ------------------------------------------------------------------------------

if (isset($_GET['detailedSearch'])) {

    // 所在地
    delCookie(LOCATION);
    // 交通機関
    delCookie(STATION);
    // 建物種別
    delCookie(BUILDING_TYPE);
    // 賃料
    delCookie(LOW_PRICE);
    delCookie(HIGH_PRICE);
    // 敷金・礼金・保証金0
    delCookie(ZERO_MONEY);
    // 間取りタイプ
    delCookie(FLOOR_PLAN_TYPE);
    // 専有面積
    delCookie(LOW_AREA);
    delCookie(HIGH_AREA);
    // 設備情報
    delCookie(EQUIPMENTS);
    // 駅徒歩
    delCookie(WALK_TIME_TO_STATION);
    // 築年数
    delCookie(BUILDING_OLD);
    // 契約内容
    delCookie(CONTRACT_DETAILS);
    // こだわりカテゴリー
    delCookie(SPECIAL_CAT);
    // 並び替え
    delCookie(ORDER);
    // カンタン検索
    delCookie(EASY_SEARCH);
}

// ------------------------------------------------------------------------------
// 検索条件取得 + Cookie登録
// ------------------------------------------------------------------------------

// 所在地
$location = addCookie(LOCATION);
// 交通機関
$station = addCookie(STATION);
// 建物種別
$building_type_2 = addCookie(BUILDING_TYPE);
// 賃料
$low_price = addCookie(LOW_PRICE);
$high_price = addCookie(HIGH_PRICE);

// 敷金・礼金・保証金0
$zero_money = addCookie(ZERO_MONEY);
// 間取りタイプ
$floor_plan_type = addCookie(FLOOR_PLAN_TYPE);
// 専有面積
$low_area = addCookie(LOW_AREA);
$high_area = addCookie(HIGH_AREA);
// 設備情報
$equipments = addCookie(EQUIPMENTS);
// 駅徒歩
$walk_time_to_time = addCookie(WALK_TIME_TO_STATION);
// 築年数
$building_old = addCookie(BUILDING_OLD);
// 契約内容
$contract_details = addCookie(CONTRACT_DETAILS);
// こだわりカテゴリー
$special_cat = addCookie(SPECIAL_CAT);
// 並び替え
$order = addCookie(ORDER);
// カンタン検索
$easy_search = addCookie(EASY_SEARCH);


// ------------------------------------------------------------------------------
// 検索条件の値取得
// ------------------------------------------------------------------------------

// 検索条件表示用の配列
$search_location = [];
$search_station = [];
$search_building_type = [];
$search_low_price = [];
$search_high_price = [];
$search_zero_money = [];
$search_floor_plan_type = [];
$search_low_area = [];
$search_high_area = [];
$search_equipments = [];
$search_walk_time = [];
$search_building_old = [];
$search_contract_details = [];
$search_special_cat = [];
$search_order = [];
$search_easy_search = [];

// 建物種別
if ($building_type_2 != "") {
    $search_building_type = getValueByTaxonomySlug($building_type_2, BUILDING_TYPE, $search_building_type);
}

// 所在地
if ($location != "") {
    $search_location = getValueByTaxonomySlug($location, LOCATION, $search_location);
}

// 交通機関
if ($station != "") {
    $search_station = getValueByTaxonomySlug($station, STATION, $search_station);
}

// 賃料
if ($low_price != "") {
    $search_low_price[] = $low_price;
}
if ($high_price != "") {
    $search_high_price[] = $high_price;
}

// 敷金・礼金・保証金0
if ($zero_money != "") {
    $search_zero_money[] = $zero_money;
}

// 間取りタイプ
if ($floor_plan_type != "") {
    $search_floor_plan_type = getValueByTaxonomySlug($floor_plan_type, FLOOR_PLAN_TYPE, $search_floor_plan_type);
}

// 専有面積
if ($low_area != "") {
    $search_low_area[] = $low_area;
}
if ($high_area != "") {
    $search_high_area[] = $high_area;
}

// 設備情報
if ($equipments != "") {
    // 20220913 検索条件表示がスラッグが表示されていたので自作関数を用いて訂正
    $search_equipments = getValueByTaxonomySlug($equipments, EQUIPMENTS, $search_equipments);
}

// 駅徒歩
if ($walk_time_to_time != "") {
    $search_walk_time[] = $walk_time_to_time;
}

// 築年数
if ($building_old != "") {
    $search_building_old[] = $building_old;
}

// 契約内容
if ($contract_details != "") {
    $search_contract_details[] = $contract_details;
}

// こだわりカテゴリー
if ($special_cat != "") {
    $search_special_cat = getValueByTaxonomySlug($special_cat, SPECIAL_CAT, $search_special_cat);
}

// 並び替え
if ($order != "") {
    if ($order == "high") {
        $search_order[] = "賃料が高い順";
    } else if ($order == "low") {
        $search_order[] = "賃料が安い順";
    }
}

// カンタン検索
if ($easy_search != "") {
    $search_easy_search = getValueByTaxonomySlug($easy_search, EASY_SEARCH, $search_easy_search);
}

// --------------------------------------------------------------------------------------
// WP Query生成(親：物件 の投稿IDを取得する)
// --------------------------------------------------------------------------------------

// 元の検索条件を設定

$building_args = array(
    'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
    'posts_per_page' => -1, // 1ページに表示する記事数.
    'post_parent' => 0, // 親を持たない投稿（物件）を指定
    's' => get_search_query() // 必ず記載が必要
);

// カスタムフィールド ---------------------------------------------------------------------

// 築年数
$strtotime_word = '-' . strval($building_old) . 'year';
$today = date("Ymd", strtotime($strtotime_word));

if ($building_old != '') {
    $wp_meta_query_for_building[] = array(
        'key' => BUILDING_OLD,
        'value' => $today,
        'compare' => '>=',
    );
}

// 駅徒歩
if ($walk_time_to_time != '') {
    $wp_meta_query_for_building[] = array(
        'key' => "building_nearest_station1_walk_time_to_station",
        'value' => intval($walk_time_to_time),
        'compare' => '<=',
        'type' => 'NUMERIC',
    );
    $wp_meta_query_for_building[] = array(
        'key' => "building_nearest_station1_walk_time_to_station",
        'value' => "",
        'compare' => '!=',
    );
}

// カスタムフィールド条件設定されている場合、meta_queryを追加
if (isset($wp_meta_query_for_building)) {
    $building_args['meta_query'] = $wp_meta_query_for_building;
}

// タクソノミー ---------------------------------------------------------------------

// 建物種別
if ($building_type_2 != '') {
    $wp_tax_query_for_building[] =
        array(
            'taxonomy' => BUILDING_TYPE,
            'field'    => 'slug',
            'terms'    => $building_type_2,
            'operator' => 'IN'
        );
}

// 所在地
if ($location != '') {
    $wp_tax_query_for_building[] =
        array(
            'taxonomy' => LOCATION,
            'field'    => 'slug',
            'terms'    => $location,
            'operator' => 'IN'
        );
}

// 交通機関
if ($station != '') {
    $wp_tax_query_for_building[] =
        array(
            'taxonomy' => STATION,
            'field'    => 'slug',
            'terms'    => $station,
            'operator' => 'IN'
        );
}

// // タクソノミーの条件設定されている場合、tax_queryを追加
if (isset($wp_tax_query_for_building)) {
    $building_args['tax_query'] = $wp_tax_query_for_building;
}

// デバック用
// ini_set('xdebug.var_display_max_children', -1);
// ini_set('xdebug.var_display_max_data', -1);
// ini_set('xdebug.var_display_max_depth', -1);
// echo '<pre>';
// var_dump($building_args);
// echo '</pre>';

// サブクエリの発行
$wp_query = new WP_Query($building_args);

$parent_ids = [];

if ($wp_query->have_posts()) :
    while ($wp_query->have_posts()) :
        $wp_query->the_post();
        $building_id = get_the_ID();
        $parent_ids[] = $building_id;
    endwhile;
endif;

wp_reset_postdata();

// サブクエリここまで　


// 親の物件でヒットしない場合はお部屋を持たないIDを格納
if (count($parent_ids) == 0) {
    $parent_ids[] = -1;
}

// --------------------------------------------------------------------------------------
// WP Query生成(子：お部屋)
// --------------------------------------------------------------------------------------

// 元の検索条件を設定

$paged = isset($_GET["page"]) ? $_GET["page"] : 1;
// $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$room_args = array(
    'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
    'post_status' => 'publish', //公開の記事だけ
    'paged' => $paged, // 何ページ目の記事を取得するか.
    'posts_per_page' => 30, // 1ページに表示する記事数.
    'post_parent__in' => $parent_ids, // 条件に適した親のID
    's' => get_search_query(), // 必ず記載が必要
);

// 並びかえの条件追加---------------------------------------------------------------------

if ($order != "") {
    $room_args += array(
        'meta_key' => 'price',
        'orderby' => 'meta_value_num',
        'order' => $order == 'high' ? 'DESC' : 'ASC',
    );
    $wp_meta_query_for_room[] = array(
        'key' => 'price',
        'value' => '',
        'compare' => '!='
    );
} else { // 20221022_並べ替えのデフォルトの設定を、タイトルの昇順にする
    $room_args += array(
        'orderby' => 'title', // タイトル順
        'order' => "ASC", // 昇順
    );
}


// カスタムフィールド ---------------------------------------------------------------------

// 賃料
if (strcmp($low_price, "") != 0 && strcmp($low_price, "下限なし") != 0) {
    $wp_meta_query_for_room[] = array(
        'key' => "price",
        'value' => intval($low_price),
        'compare' => '>=',
        'type' => 'NUMERIC',
    );
}
if (strcmp($high_price, "") != 0 && strcmp($high_price, "上限なし") != 0) {
    $wp_meta_query_for_room[] = array(
        'key' => "price",
        'value' => intval($high_price),
        'compare' => '<=',
        'type' => 'NUMERIC',
    );
}

// 専有面積 
if (strcmp($low_area, "") != 0 || strcmp($low_area, "下限なし") != 0) {
    $wp_meta_query_for_room[] = array(
        'key' => "occupied_area",
        'value' => intval($low_area),
        'compare' => '>=',
        'type' => 'NUMERIC',
    );
}
if (strcmp($high_area, "") != 0 && strcmp($high_area, "上限なし") != 0) {
    $wp_meta_query_for_room[] = array(
        'key' => "occupied_area",
        'value' => intval($high_area),
        'compare' => '<=',
        'type' => 'NUMERIC',
    );
}

// 敷金・礼金・保証金0
if ($zero_money != "") {
    $wp_meta_query_for_room[] = array(
        'key' => "security_deposit",
        'value' => array("0", "0ヶ月", "0ヵ月", "0円", "０", "０ヶ月", "０ヵ月", "０円"),
        'compare' => 'IN',
    );
    $wp_meta_query_for_room[] = array(
        'key' => "key_money",
        'value' => array("0", "0ヶ月", "0ヵ月", "0円", "０", "０ヶ月", "０ヵ月", "０円"),
        'compare' => 'IN',
    );
    $wp_meta_query_for_room[] = array(
        'key' => "deposit",
        'value' => array("0", "0ヶ月", "0ヵ月", "0円", "０", "０ヶ月", "０ヵ月", "０円"),
        'compare' => 'IN',
    );
}

// 契約内容
if ($contract_details != '') {
    $wp_meta_query_for_room[] = createMetaQueryMultiSelect(CONTRACT_DETAILS, $contract_details);
}


// カスタムフィールド条件設定されている場合、meta_queryを追加
if (isset($wp_meta_query_for_room)) {
    $room_args['meta_query'] = $wp_meta_query_for_room;
}

// タクソノミー ---------------------------------------------------------------------

// 間取りタイプ
if ($floor_plan_type == "over4k") {
    $wp_tax_query_for_room[] =
        array(
            'taxonomy' => FLOOR_PLAN_TYPE,
            'field'    => 'slug',
            'terms'    => ["4r", "4k", "4sk", "4dk", "4ldk", "4sdk", "4sldk", "5r", "5k", "5sk", "5dk", "5ldk", "5sdk", "5sldk", "6r", "6k", "6sk", "6dk", "6ldk", "6sdk", "6sldk", "7r", "7k", "7sk", "7dk", "7ldk", "7sdk", "7sldk"],
            'operator' => 'IN'
        );
} else if ($floor_plan_type != '') {
    $wp_tax_query_for_room[] =
        array(
            'taxonomy' => FLOOR_PLAN_TYPE,
            'field'    => 'slug',
            'terms'    => $floor_plan_type,
            'operator' => 'IN'
        );
}

// 設備情報
if ($equipments != '') {
    $wp_tax_query_for_room[] =
        array(
            'taxonomy' => EQUIPMENTS,
            'field'    => 'slug',
            'terms'    => $equipments,
            'operator' => 'IN'
        );
}

// こだわりカテゴリー
if ($special_cat != '') {
    $wp_tax_query_for_room[] =
        array(
            'taxonomy' => SPECIAL_CAT,
            'field'    => 'slug',
            'terms'    => $special_cat,
            'operator' => 'AND'
        );
}

// カンタン検索
if ($easy_search != '') {
    $wp_tax_query_for_room[] =
        array(
            'taxonomy' => EASY_SEARCH,
            'field'    => 'slug',
            'terms'    => $easy_search,
            'operator' => 'IN'
        );
}


// // タクソノミーの条件設定されている場合、tax_queryを追加
if (isset($wp_tax_query_for_room)) {
    $room_args['tax_query'] = $wp_tax_query_for_room;
}

// デバック用
// ini_set('xdebug.var_display_max_children', -1);
// ini_set('xdebug.var_display_max_data', -1);
// ini_set('xdebug.var_display_max_depth', -1);
// echo '<pre>';
// var_dump($wp_meta_query_for_room);
// echo '</pre>';
// echo '<pre>';
// var_dump($wp_tax_query_for_room);
// echo '</pre>';
// echo '<pre>';
// var_dump($wp_meta_query_for_room);
// echo '</pre>';

// サブクエリの発行
$wp_query = new WP_Query($room_args);
$number_post = $wp_query->found_posts;

// 検索でヒットせず全件表示をするかを示すフラグ
$all_display = false;

// 1件もヒットしなかった場合は全件表示
if ($number_post == 0) {
    wp_reset_postdata();
    $all_display = true;

    // 物件を全取得
    $building_args = array(
        'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
        'posts_per_page' => -1, // 1ページに表示する記事数.
        'post_parent' => 0, // 親を持たない投稿（物件）を指定
        's' => get_search_query() // 必ず記載が必要
    );

    $wp_query = new WP_Query($building_args);

    $parent_ids = [];

    // 物件のIDを取得
    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) :
            $wp_query->the_post();
            $building_id = get_the_ID();
            $parent_ids[] = $building_id;
        endwhile;
    endif;
    wp_reset_postdata();

    // お部屋を全取得
    $room_args = array(
        'post_type'      => 'building', // 絞り込み検索をする投稿タイプ.
        'post_status' => 'publish', //公開の記事だけ
        'paged' => $paged, // 何ページ目の記事を取得するか.
        'posts_per_page' => 30, // 1ページに表示する記事数.
        'post_parent__in' => $parent_ids, // 条件に適した親のID
        's' => get_search_query(), // 必ず記載が必要
    );

    // 並び替え
    if ($order != "") {
        $room_args += array(
            'meta_key' => 'price',
            'orderby' => 'meta_value_num',
            'order' => $order == 'high' ? 'DESC' : 'ASC',
        );
        $wp_meta_query_for_room[] = array(
            'key' => 'price',
            'value' => '',
            'compare' => '!='
        );
    } else {
        $room_args += array(
            'orderby' => 'title',
            'order' => "ASC",
        );
    }

    $wp_query = new WP_Query($room_args);
    $number_post = $wp_query->found_posts;
}

?>

<!-- 以降ページ出力部分 -->

<?php get_header(''); ?>

<main>
    <section class="breadcrumbs">
        <div class="wrapper">
            <div class="aioseo-breadcrumbs">
                <span class="aioseo-breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" title="トップページ">トップページ</a></span>
                <span class="aioseo-breadcrumb-separator">›</span>
                <span class="aioseo-breadcrumb">検索結果一覧</span>
            </div>
        </div>
    </section>
    <section class="page_default">
        <div class="wrapper">
            <h1>検索結果一覧</h1>
            <?php if ($all_display) : ?>
                <div class="search_results_none">
                    <p>検索条件に該当するお部屋が見つかりませんでした。全件表示します。</p>
                </div>
            <?php endif; ?>

            <div class="search_results_menu flex">
                <p><span class="red_bold"><?php echo $number_post; ?></span>件のお部屋が該当しました</p>
                <!-- 詳細検索フォーム読み込み -->
                <?php get_template_part('template-parts/form/form_order'); ?>
                <!-- 詳細検索フォームここまで -->
            </div>

            <div class="condition_list_wrapper">
                <ul class="condition_list">
                    <?php echo display_search($search_location, "所在地", "") ?>
                    <?php echo display_search($search_station, "交通機関", "駅") ?>
                    <?php echo display_search($search_building_type, "建物種別", "") ?>
                    <?php echo display_price_search($search_low_price, "賃料下限", "円") ?>
                    <?php echo display_price_search($search_high_price, "賃料上限", "円") ?>
                    <?php echo display_search($search_zero_money, "敷金・礼金・保証金0", "") ?>
                    <?php echo display_search($search_floor_plan_type, "間取りタイプ", "") ?>
                    <?php echo display_search($search_low_area, "専有面積下限", "㎡") ?>
                    <?php echo display_search($search_high_area, "専有面積上限", "㎡") ?>
                    <?php echo display_search($search_equipments, "設備情報", "") ?>
                    <?php echo display_search($search_walk_time, "駅徒歩", "分以内") ?>
                    <?php echo display_search($search_building_old, "築年数", "年未満") ?>
                    <?php echo display_search($search_contract_details, "契約内容", "") ?>
                    <?php echo display_search($search_special_cat, "こだわりカテゴリー", "") ?>
                    <?php echo display_search($search_order, "並び順", "") ?>
                    <?php echo display_search($search_easy_search, "カンタン検索", "") ?>
                </ul>
                <a href="#search_detail_form" class="condition_change">詳細条件を設定して検索する</a>
            </div>

            <?php
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();

                    get_template_part('template-parts/room_card');

                endwhile;


                if ($wp_query->max_num_pages > 0) {
                    echo "<div class='room_pager'>";
                    echo paginate_links(array(
                        // 'base' => home_url() . '%_%',
                        // 'format' => '/page/%#%/',
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => 'page=%#%',
                        'current' => max(1, $paged),
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => '<<', //次への表示指定
                        'next_text' => '>>' //前への表示指定
                    ));
                    echo "</div>";
                };

            // echo "get_quert_var(paged)";
            // echo get_query_var('paged');
            // echo "<br>";
            // echo "paged:(現在のページ数)";
            // echo $paged;
            // echo "<br>";
            // echo "pages:(総ページ数)";
            // echo $wp_query->max_num_pages;
            // echo "<br>";
            // echo "get";
            // echo var_dump($_GET);
            // echo "<br>";

            endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>

    <!-- 詳細検索フォーム読み込み -->
    <?php get_template_part('template-parts/form/form_detail', null, $args = array(
        "所在地" => $search_location,
        "交通機関" => $search_station,
        "建物種別" => $search_building_type,
        "賃料低" => $search_low_price,
        "賃料高" => $search_high_price,
        "間取りタイプ" => $search_floor_plan_type,
        "敷金・礼金・保証金0" => $search_zero_money,
        "専有面積下限" => $search_low_area,
        "専有面積上限" => $search_high_area,
        "設備" => $search_equipments,
        "駅徒歩" => $search_walk_time,
        "築年数" => $search_building_old,
        "契約内容" => $search_contract_details,
        "こだわりカテゴリー" => $search_special_cat,
    )); ?>
    <!-- 詳細検索フォームここまで -->

</main>


<?php get_footer(""); ?>
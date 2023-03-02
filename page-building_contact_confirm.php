<?php get_header(); ?>
<div class="form__modal_tabs form__modal modal__bg hidden" id="modal">
    <div class="modal__content">
        <div class="modal_title">
            <h3 class="ja">問題が発生しました</h3>
        </div>

        <p>お手数をおかけしますが、始めから入力し直していただきますようよろしくお願いいたします。</p>
        <small>※このメッセージが表示された場合、以下の問題が発生している可能性があります。</small>
        <ul class="modal_text">
            <li>
                <p><span>インターネット接続に問題がある</span><br>インターネット接続をご確認いただき、復旧後再度お申込みください。</p>
            </li>
            <li>
                <p><span>複数画面（タブ、ブラウザ）で同時にお問い合わせ、お申込みが行われている</span><br>複数画面での同時お申込みには対応しておりませんので、お問い合わせ、お申込みは１つの画面にて行うようお願いいたします。</p>
            </li>
            <li>
                <p><span>フォームの途中から入力が行われている。</span><br>フォームの途中（STEP2以降）からの入力はできませんので、フォームの初めから入力していただきますようお願いいたします。</p>
            </li>
        </ul>
        <p>上記をご確認頂き、症状が改善しない場合はお手数ですが弊社までご連絡ください。</p>
        <p><span class="bold">弊社問い合わせ先</span><br>TEL：<a href="tel:045-252-7077">045-252-7077</a> <br>mail：<a href="mailto:abk1@abk.co.jp">abk1@abk.co.jp</a></p>
        <div class="modal_btn">
            <a class="btn_search btn_blue btn_arrow" href="<?php echo esc_url(home_url('/')); ?>">トップ画面に遷移する</a>
        </div>
    </div>
</div>
<main>
    <section class="breadcrumbs">
        <div class="wrapper">
            <?php if (function_exists('aioseo_breadcrumbs')) aioseo_breadcrumbs(); ?>
        </div>
    </section>
    <section>
        <div class="wrapper">
            <h1>お問い合わせ確認画面</h1>
            <?php echo do_shortcode('[contact-form-7 id="34" title="物件お問い合わせ_確認画面"]'); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
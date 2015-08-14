<?php
// スタイルシートとスクリプトの読み込みコードを関数にまとめる
function portfol_scripts() {
	/*
	 * wp_enqueue_script() を使って functions.js を登録・読み込みキューに追加。
	 * jquery を依存指定し自動的に先に読み込ませる。
	 * 20140319 というバージョン文字列を URL のクエリーストリングに付加し
	 * バージョンの異なるファイルキャッシュがある場合は更新されるようにする。
	 * スクリプトをフッターエリアで読み込ませる（多くの場合この設定が望ましい）。
	*/
	// wp_enqueue_script( 'foundation-script', get_template_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), '20150813', true );
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '20150813', true );
}
// portfol_scripts() をサイト公開側で呼び出す。
add_action( 'wp_enqueue_scripts', 'portfol_scripts' );

// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
add_image_size( 'large', 916, 510, false );
add_image_size( 'medium', 630, 422, true );

// アイキャッチを切り抜く起点を左上にする
function my_awesome_image_resize_dimensions( $payload, $orig_w, $orig_h, $dest_w, $dest_h, $crop ){
    if( false ) return $payload;
    if ( $crop ) {
        $aspect_ratio = $orig_w / $orig_h;
        $new_w = min($dest_w, $orig_w);
        $new_h = min($dest_h, $orig_h);
        if ( !$new_w ) $new_w = intval($new_h * $aspect_ratio);
        if ( !$new_h ) $new_h = intval($new_w / $aspect_ratio);
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);
        $s_x = 0;
        $s_y = 0;
    } else {
        $crop_w = $orig_w;
        $crop_h = $orig_h;
        $s_x = 0;
        $s_y = 0;

        list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );
    }

    if ( $new_w >= $orig_w && $new_h >= $orig_h ) return false;
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'my_awesome_image_resize_dimensions', 10, 6 );

// サムネイルが出力される際に付随するwidth, heightを削除する
add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
    // width height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}

// ウィジェットの有効化
function footer_widgets_init() {
  register_sidebar(array(
   'name' => 'コンタクトフォームウィジェット',
   'description' => 'お問い合わせフォームを設置するウィジェット',
   'id' => 'contact-widget',
   'before_widget' => '',
   'after_widget' => '',
  ));
}
add_action( 'widgets_init', 'footer_widgets_init' );

// タクソノミーの実装
function portfolio_genre_init() {
  // 新規分類を作成
  register_taxonomy(
    'portfolio_genre',
    'post',
    array(
      'label' => __( '作品ジャンル' ),
      'rewrite' => array( 'slug' => 'genre' ),
      'hierarchical' => true, // 階層構造(カテゴリーっぽいUIに変わる)
      // 'capabilities' => array(
      //   'assign_terms' => 'edit_guides',
      //   'edit_terms' => 'publish_guides'
      // )
    )
  );
}
add_action( 'init', 'portfolio_genre_init' );

// archiveのページネーション
function pagerNavi($maxNum,$pCur){
    global $wp_rewrite;
    $paginate_base = get_pagenum_link(1);
    if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
        $paginate_format = '';
        $paginate_base = add_query_arg('paged','%#%');
    }
    else{
        $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
        user_trailingslashit('page/%#%/','paged');;
        $paginate_base .= '%_%';
    }
    echo paginate_links(array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $maxNum,
        'mid_size' => 4,
        'type' => 'list',
        'current' => ($pCur ? $pCur : 1),
        'prev_text' => '«',
        'next_text' => '»',
    ));
}

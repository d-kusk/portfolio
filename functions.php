<?php
// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
add_image_size( 'large', 916, 510, false );
add_image_size( 'medium', 630, 422, true );

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

<?php
// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
add_image_size( 'large', 916, 510, true );
add_image_size( 'medium', 630, 422, true );

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

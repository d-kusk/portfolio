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
   'id' => 'contact-widget'
  ));
}
add_action( 'widgets_init', 'footer_widgets_init' );

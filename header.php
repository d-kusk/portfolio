<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>
    <?php if ( !is_home() ) {wp_title( '|', true, 'right' );} elseif (is_404()) { ?>ページが見つかりませんでした。 | <?php }bloginfo('name');?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <?php get_template_part('header_ogp'); ?>
  </head>
  <body>
    <header class="groval-header">
      <nav class="top-bar" data-topbar="" role="navigation">
        <ul class="title-area">
          <li class="name">
            <h1>
              <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon">
            <a href="#"><span>Menu</span></a>
          </li>
        </ul>
        <section class="top-bar-section">
          <ul class="right">
            <?php
            if (is_front_page()) :
            ?>
            <li><a href="#about" class="scroll">About me</a></li>
            <li><a href="#skill" class="scroll">Skill</a></li>
            <li><a href="#portfolio" class="scroll">Portfolio</a></li>
            <li><a href="http://peng-note.com" target="_blank">Blog</a></li>
            <li><a href="#contact" class="scroll">Contact</a></li>
            <?php
            else :
            ?>
            <li><a href="<?php bloginfo('url'); ?>">Homeに戻る</a></li>
            <?php endif; ?>
          </ul>
        </section>
      </nav>
    </header>
<?php wp_head(); ?>
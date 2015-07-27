<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8" />
    <title>
    <?php
    global $page, $paged;
    if ( is_search() ) :
      wp_title('', true, 'left');
      echo " | ";
    else :
      wp_title('|', true, 'right');
    endif;
    bloginfo('name');
    if ( is_front_page() ) :
      echo " | ";
      bloginfo('description');
    endif;
    if ($paged >= 2 || $page >= 2) :
      echo " | " . sprintf('%sページ', max($paged, $page));
    endif;
    ?>
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <?php // get_template_part('header_ogp'); ?>
    <!--[if lt IE 9]>
    script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"
    script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class();?>>
    <header class="groval-header">
      <nav class="top-bar" data-topbar="" role="navigation">
        <ul class="title-area">
          <li class="name">
            <h1>
              <a href="<?php echo esc_url(home_url(); ?>"><?php bloginfo('name'); ?></a>
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
            <li><a href="<?php echo esc_url(home_url()); ?>">Homeに戻る</a></li>
            <?php endif; ?>
          </ul>
        </section>
      </nav>
    </header>

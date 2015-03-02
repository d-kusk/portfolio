<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
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
            <li><a href="#about">About me</a></li>
            <li><a href="#contact">Skill</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </section>
      </nav>
    </header>
<?php wp_head(); ?>
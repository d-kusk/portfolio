<?php get_header(); ?>
    <ul class="breadcrumbs">
      <li><a href="<?php echo get_option('home'); ?>">HOME</a></li>
      <?php foreach ( array_reverse(get_post_ancestors($post->ID)) as $parid ) { ?>
      <li><a href="<?php echo get_page_link( $parid );?>" title="<?php echo get_page($parid)->post_name; ?>">
      <?php echo get_page($parid)->post_name; ?></a></li>
      <?php } ?>
      <li><?php the_title(''); ?></li>
    </ul>
    <div class="row">
      <?php 
      if (have_posts()) :
        while (have_posts()) :
          the_post();
      ?>
      <div class="portfolio-item small-12 medium-6 large-4 columns">
        <a class="portfolio-item__thumbnail" href="<?php the_permalink(); ?>">
          <?php
          if (has_post_thumbnail())
            the_post_thumbnail('medium');
          ?>
        </a>
        <p class="portfolio-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        <div class="tech">
          <p>使用技術</p>
          <ul class="inline-list">
            <?php
            $posttags = get_the_tags();
            
            if ($posttags) {
              foreach($posttags as $tag) {
                echo '<li>' . $tag->name . ', </li>';
              }
            }
            ?>
          </ul>
        </div>
      <?php
        endwhile;
      endif;
      ?>
      </div>
    </div>
    <div class="row">
      <div class="small-6 small-centered medium-3 medium-uncentered columns">
        <div class="pagination-centered">
          <ul class="pagination">
            <li class="arrow unavailable">
              <a href="#">&laquo;</a>
            </li>
            <li class="current">
              <a href="#">1</a>
            </li>
            <li>
              <a href="#">2</a>
            </li>
            <li class="arrow">
              <a href="#">&raquo;</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
<?php get_footer(); ?>
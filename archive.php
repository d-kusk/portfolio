<?php get_header(); ?>
    <ul class="breadcrumbs">
      <li><a href="<?php echo home_url(); ?>">HOME</a></li>
      <?php foreach ( array_reverse(get_post_ancestors($post->ID)) as $parid ) { ?>
      <li><a href="<?php echo get_page_link( $parid );?>" title="<?php echo get_page($parid)->post_name; ?>">
      <?php echo get_page($parid)->post_name; ?></a></li>
      <?php } ?>
      <li><?php the_title(''); ?></li>
    </ul>
    <div class="row">
      <div class="small-12 columns">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
          <?php
          if (have_posts()) :
            while (have_posts()) :
              the_post();
          ?>
          <li class="portfolio-item" <?php post_class();?>>
            <a class="portfolio-item__thumbnail" href="<?php the_permalink(); ?>">
              <?php
              if (has_post_thumbnail())
                the_post_thumbnail('medium');
              ?>
              <div class="hover-items">
                <p class="hover-item">more<i class="fa fa-angle-right"></i></p>
              </div>
            </a>
            <p class="portfolio-item__title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </p>
            <div class="tech">
              <p>使用技術</p>
              <ul class="inline-list">
                <?php
                $posttags = get_the_tags();

                if ($posttags) {
                  foreach($posttags as $tag) {
                    echo '<li>' . $tag->name . '</li>';
                  }
                }
                ?>
              </ul>
            </div>
          </li>
          <?php
            endwhile;
          endif;
          ?>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="small-6 small-centered medium-3 medium-centered columns">
        <div class="pagination-centered">
          <ul class="pagination">
            <?php pagerNavi($wp_query->max_num_pages,$paged); ?>
          </ul>
        </div>
      </div>
    </div>
<?php get_footer(); ?>

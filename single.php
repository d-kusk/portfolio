<?php get_header(); ?>
    <main role="main">
      <ul class="breadcrumbs">
        <li><a href="<?php echo get_option('home'); ?>">HOME</a></li>
        <li><a href="<?php $cat = get_the_category(); $cat = $cat[0]; echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->cat_name; ?></a></li>
        <li><?php the_title(''); ?></li>
      </ul>
      <?php 
      if (have_posts()) :
        while (have_posts()) :
          the_post();
      ?>
      <div class="row">
        <div class="large-12 columns">
          <header class="production-header">
            <h1 class="production-header__title"><?php the_title(); ?></h1>
            <?php 
            $key="url";
            $url = get_post_meta($post->ID, $key, true);
            
            if(empty($url) == false) :// URLの値があるときだけ表示
            ?>
            <p>URL: <a href="<?php echo $url; ?>" target="_blank">
            <?php 
            echo $url;
            ?>
            </a></p>
            <?php endif; ?>
          </header>
        </div>
      </div>
      <div class="row">
        <div class="concept large-8 columns">
          <h2 class="comment-title">Comment</h2>
          <?php the_content(); ?>
        </div>
        <aside class="large-4 columns">
          <h2 class="data-title">Data</h2>
          <dl class="category">
            <dt>カテゴリー</dt>
            <?php
            if ( $terms = get_the_terms($post->ID, 'portfolio_genre') ) {
                foreach ( $terms as $term ) {
                    echo '<dd>' . esc_html($term->name) . '</dd>';
                }
            } ?>
          </dl>
          <dl>
            <dt>使用した技術</dt>
            <dd>
            <?php
            $posttags = get_the_tags();
            
            if ($posttags) {
              foreach($posttags as $tag) {
                echo $tag->name . ', ';
              }
            }
            ?>
            </dd>
          </dl>
          <dl>
            <dt>制作期間</dt>
            <dd>
            <?php 
            $key="制作期間";
            echo get_post_meta($post->ID, $key, true);
            ?>
            </dd>
          </dl>
          <dl>
            <dt>担当箇所</dt>
            <dd>
            <?php 
            $key="担当箇所";
            echo get_post_meta($post->ID, $key, true);
            ?>
            </dd>
          </dl>
        </aside>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <a class="button radius" href="<?php bloginfo('url'); ?>">戻る</a>
        </div>
      </div>
      <?php
        endwhile;
      endif;
      ?>
    </main>
<?php get_footer(); ?>
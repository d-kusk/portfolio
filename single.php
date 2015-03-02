<?php get_header(); ?>
    <main role="main">
      <?php 
      if (have_posts()) :
        while (have_posts()) :
          the_post();
      ?>
      <div class="row">
        <div class="large-12 columns">
          <img alt="作品のスクリーンショット" height="510" src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio-ss__large.png" width="917" />
          <h1 class="production-title"><?php the_title(); ?></h1>
          <?php 
          $key="url";
          ?>
          <p>URL: <a href="<?php echo get_post_meta($post->ID, $key, true);?>">
          <?php
          echo get_post_meta($post->ID, $key, true);
          ?>
          </a></p>
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
            <dd>
            <?php
            $postcat = get_the_category();
            
            if ($postcat) {
              foreach($postcat as $cat) {
                echo $cat->name;
              }
            }
            ?>
            </dd>
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
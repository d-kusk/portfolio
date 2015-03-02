<?php get_header(); ?>
    <main role="main">
      <div class="row">
        <div class="large-12 columns">
          <img alt="作品のスクリーンショット" height="510" src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio-ss__large.png" width="917" />
          <h1 class="production-title">ココに作品のタイトルが表示されます。</h1>
          <p>URL: <a href="#">http://google.com</a></p>
        </div>
      </div>
      <div class="row">
        <div class="concept large-8 columns">
          <h2 class="comment-title">Comment</h2>
          <p>the_content();制作背景工夫した・こだわった点</p>
          <p>あれば成果</p>
        </div>
        <aside class="large-4 columns">
          <h2 class="data-title">Data</h2>
          <dl class="category">
            <dt>カテゴリー</dt>
            <dd><a href="#">Webデザイン</a></dd>
          </dl>
          <dl>
            <dt>使用した技術</dt>
            <dd>HTML5, CSS3, jQuery, WordPress</dd>
          </dl>
          <dl>
            <dt>制作期間</dt>
            <dd>2014年9月-10月</dd>
          </dl>
          <dl>
            <dt>担当箇所</dt>
            <dd>すべて</dd>
          </dl>
        </aside>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <a class="button radius" href="#">戻る</a>
        </div>
      </div>
    </main>
<?php get_footer(); ?>
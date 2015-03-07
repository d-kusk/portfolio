<?php get_header(); ?>
    <div class="main-visual">
      <h1 class="section-title"><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description'); ?></p>
    </div>
    <main>
      <section id="about" class="main-section">
        <h2 class="section-title">About me</h2>
        <p>私のこと</p>
        <section class="profile">
          <div class="row">
            <div class="small-8 small-centered medium-4 medium-offset-1 medium-uncentered columns">
              <img alt="小西大祐の画像" class="profile-image" height="262" src="<?php echo get_stylesheet_directory_uri(); ?>/images/daisuke.png" width="263" />
            </div>
            <div class="medium-7 columns">
              <div class="row">
                <div class="small-8 small-centered medium-7 medium-uncentered columns">
                  <h3 class="profile-name">
                    小西大祐<small>Konishi Daisuke</small>
                  </h3>
                  <dl>
                    <dt>所在地</dt>
                    <dd>大阪府</dd>
                    <dt>所属</dt>
                    <dd>大阪産業大学</dd>
                  </dl>
                  <ul class="link inline-list">
                    <li>
                      <a href="https://twitter.com/skd_nw"><i class="fa fa-twitter">Twitter</i></a>
                    </li>
                    <li>
                      <a href="http://dsk12.tumblr.com/"><i class="fa fa-tumblr">tumblr</i></a>
                    </li>
                    <li>
                      <a href="http://peng-note.com"><i class="fa fa-book">Blog</i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <p>1993年鹿児島生まれ京都育ち、現在は大阪の大学で情報・デザインを勉強しています。</p>
              <p>所属しているダンスサークルの紹介サイトを作った事をきっかけにWebサイト制作を始め、WordBenchやCSSフレームワーク勉強会などの勉強会に参加しながらWebデザインやコーディングを勉強中です。</p>
            </div>
          </div>
          <div class="think">
            <div class="row">
              <div class="large-6 columns">
                <section>
                  <h3 class="think-title">得意なこと</h3>
                  <p>ユーザーのニーズを予想し、それを元に目的の場所に誘導できるような導線を考えたデザインをすることが得意です。</p>
                </section>
              </div>
              <div class="large-6 columns">
                <section>
                  <h3 class="think-title">これから付けたい能力</h3>
                  <ul>
                    <li>クライアントのやりたい事を引き出し、より良い提案をする能力</li>
                    <li>ユーザーの気持ちを揺さぶり、クライアントの目標達成につなげるデザイン力</li>
                  </ul>
                </section>
              </div>
            </div>
          </div>
        </section>
        <section id="skill">
          <h2 class="section-title">Skill</h2>
          <p>使える技術</p>
          <div class="row">
            <div class="skill-list medium-4 columns">
              <h3>Design</h3>
              <dl>
                <dt>Photoshop</dt>
                <dd>Webサイトのデザインカンプ作成や簡単な写真のレタッチに使用しています。</dd>
              </dl>
              <dl>
                <dt>Illustrator</dt>
                <dd>Webサイトのロゴやメインビジュアルなどの素材やデザインカンプ作成時に使用しています。</dd>
              </dl>
            </div>
            <div class="skill-list medium-4 columns">
              <h3>Coding</h3>
              <dl>
                <dt>HTML5</dt>
                <dd>sectionなどのタグを使用し、コンテンツの意味を考えたコーディングを心がけています。</dd>
              </dl>
              <dl>
                <dt>Slim</dt>
                <dd>見やすく編集しやすいコードを速く書くために使用しています。</dd>
              </dl>
              <dl>
                <dt>CSS3</dt>
                <dd>border-radiusやtransitionなどのプロパティを使ったコーディングを行っています。</dd>
              </dl>
              <dl>
                <dt>jQuery</dt>
                <dd>bxsliderやheightlineなどのプラグインを利用したコーディングができます。</dd>
              </dl>
            </div>
            <div class="skill-list medium-4 columns">
              <h3>Other</h3>
              <dl>
                <dt>Git</dt>
                <dd>commitやbranch、pushなどの基本操作が出来ます。</dd>
              </dl>
              <dl>
                <dt>Sass/LESS</dt>
                <dd>主にSCSS記法を使用し、なるべく可読性の高いCSS設計をする事を心がけています。</dd>
              </dl>
              <dl>
                <dt>CSSFramework</dt>
                <dd>BootstrapやFoundationを使ったコーディングが出来ます。</dd>
              </dl>
              <dl>
                <dt>WorPress</dt>
                <dd>個人運用のブログや所属活動のサイトでカスタムテーマを作成して使用しています。</dd>
              </dl>
            </div>
          </div>
        </section>
      </section>
      <section id="portfolio" class="main-section">
        <h2 class="section-title">Portfolio</h2>
        <p>これまでに作ったWebサイトやポスターなど</p>
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
              <div class="hover-items">
                <i class="hover-item fa fa-search-plus"></i>
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
                    echo '<li>' . $tag->name . ', </li>';
                  }
                }
                ?>
              </ul>
            </div>
          </div>
        <?php
          endwhile;
        endif;
        ?>
        </div>
        <div class="row">
          <div class="small-7 small-centered medium-3 columns">
            <?php
            $category_id = get_cat_ID( 'Portfolio' );// 指定したカテゴリーの ID を取得
            $category_link = get_category_link( $category_id );// このカテゴリーの URL を取得
            ?>
            <a class="btn-more button round" href="<?php echo esc_url( $category_link );?>">もっと見る</a>
          </div>
        </div>
      </section>
      <section id="contact" class="main-section">
        <div class="row">
          <div class="medium-8 medium-centered columns">
            <h2 class="section-title">Contact</h2>
            <p>現在就職活動中です。ご意見・ご感想お問い合わせ等ございましたら、下記フォームまたはskydai1151*gmail.com(*を@に変える)まで気軽にご連絡ください。</p>
            <?php
            if ( is_active_sidebar('contact-widget') ) :
              dynamic_sidebar( 'contact-widget' );
            else: ?>
            <div class="widget">
              <h2>No Widget</h2>
              <p>現在、ウィジェットが設定されていません。</p>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
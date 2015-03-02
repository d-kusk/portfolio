<?php get_header(); ?>
    <div class="main-visual">
      <h1 class="section-title"><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description'); ?></p>
    </div>
    <main>
      <section id="about">
        <h2 class="section-title">About me</h2>
        <p>私のこと</p>
        <section class="profile">
          <div class="row">
            <div class="small-6 small-centered medium-4 medium-offset-1 medium-uncentered columns">
              <img alt="小西大祐の画像" class="profile-image" height="262" src="<?php echo get_stylesheet_directory_uri(); ?>/images/daisuke.png" width="263" />
            </div>
            <div class="medium-7 columns">
              <div class="row">
                <div class="small-7 small-centered medium-7 medium-uncentered columns">
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
                      <a href="peng-note.com"><i class="fa fa-book">Blog</i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <p>1993年鹿児島生まれ京都育ち、現在は大阪の大学で情報・デザインなどの勉強をしています。所属しているダンスサークルの紹介サイトを作った事をきっかけにWebサイト制作を始め、現在はWordBenchやCSSフレームワーク勉強会などの勉強会に参加しながらWebデザインやコーディングを勉強中です。</p>
            </div>
          </div>
          <div class="think">
            <div class="row">
              <div class="large-6 columns">
                <section>
                  <h3 class="think-title">得意なこと</h3>
                  <p>ユーザーのニーズを予想し、それを元にユーザーを目的の場所に誘導できるような導線を考えたデザインをすることが得意です。</p>
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
                <dd>カンプ制作や簡単な写真のレタッチに使用しています。</dd>
              </dl>
              <dl>
                <dt>Illustrator</dt>
                <dd>サイトのロゴやメインビジュアルなどの素材やカンプ製作時に使用しています。</dd>
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
                <dd>bxsliderやheightlineなどのプラグインを利用したコーディングをする事ができます。</dd>
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
                <dd>ブログやプロジェクトサイトのカスタムテーマを作成して使用しています。</dd>
              </dl>
            </div>
          </div>
        </section>
      </section>
      <section id="portfolio">
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
              <img alt="作品のサムネイル" height="422" src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio-ss__medium.png" width="630" />
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
          <div class="small-5 small-centered medium-4 columns">
            <a class="btn-more button round" href="#">もっと見る</a>
          </div>
        </div>
      </section>
      <section id="contact">
        <div class="row">
          <div class="medium-8 medium-centered columns">
            <h2 class="section-title">Contact</h2>
            <p>現在就職活動中です。ご意見・ご感想お問い合わせ等ございましたら、下記フォームまたはskydai1151*gmail.com(*を@に変える)まで気軽にご連絡ください。</p>
            <form>
              <div class="row">
                <div class="medium-4 columns">
                  <label for="name">お名前</label>
                  <input id="name" placeholder="ココに名前を入力" type="text" />
                </div>
                <div class="medium-8 columns">
                  <label for="mail">メールアドレス</label>
                  <input id="mail" placeholder="メールアドレス" type="text" />
                </div>
              </div>
              <div class="row">
                <div class="medium-12 columns">
                  <label for="contact-content">お問い合せ内容</label>
                  <textarea id="contact-content" placeholder="お問い合わせ内容を入力" rows="5"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="medium-12 columns">
                  <a class="button expand" href="#">送信</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
<?php get_header(); ?>

    <div class="mv">
      <div class="mv__inner">
        <div class="mv__content">
          <p class="mv__lead">
            <span class="mv__lead1">「めざめる」の日常を</span>
            <span class="mv__lead2">もっとおもしろく。</span>
          </p>
          <p class="mv__description">
            OHA!は、朝起きたい人と<br />朝起こされたい人が<br />ランダムにマッチングしちゃう<br />通話アプリです。
          </p>
          <div class="mv__button">
            <a href="#contact" class="button button--type2"
              >アプリダウンロード</a
            >
          </div>
        </div>
        <div class="mv__image">
          <img src="<?php echo get_template_directory_uri() ?>/img/first-view-img.png" alt="" />
        </div>
      </div>
    </div>

    <section class="case">
      <div class="case__inner">
        <h2 class="case__title js-in-view fade-in-up">導入実績</h2>
        <div class="case__items">

          <?php
            $args = array(
              'post_type' => 'cases', // Custom Post Typeのスラッグ
              'posts_per_page' => 8,  // 表示件数
              'orderby' => 'rand',   // ランダム表示
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                  <a href="<?php the_permalink(); ?>" class="case__item">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                    <?php endif; ?>
                  </a>
              <?php endwhile;
                wp_reset_postdata();
              else : ?>
                <p>導入実績がありません。</p>
          <?php endif; ?>

        </div>
      </div>
    </section>

    <section class="news">
      <div class="news__inner inner">
        <div class="news__card">
          <h2 class="news__title js-in-view fade-in-up">NEWS</h2>
          <div class="news__lists">

          <?php
          // WP_Queryで最新のお知らせ3件を取得
          $args = array(
              'post_type'      => 'news',
              'posts_per_page' => 3,
              'orderby'        => 'date',
              'order'          => 'DESC',
          );
          $news_query = new WP_Query($args);
          ?>

          <?php if ($news_query->have_posts()) : ?>
              <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                  <a href="<?php the_permalink(); ?>" class="news__list news-link">
                      <div class="news-link__meta">
                          <time class="news-link__date" datetime="<?php the_time('c'); ?>">
                              <?php echo get_the_date('Y年m月d日'); ?>
                          </time>
                          <?php
                          $terms = get_the_terms(get_the_ID(), 'news_category');
                          if ($terms && !is_wp_error($terms)) :
                              $term = array_shift($terms);
                              $term_slug = esc_attr($term->slug);
                              $term_name = esc_html($term->name);
                          ?>
                              <div class="news-link__label is-<?php echo $term_slug; ?>">
                                  <?php echo $term_name; ?>
                              </div>
                          <?php endif; ?>
                      </div>
                      <h3 class="news-link__title"><?php the_title(); ?></h3>
                  </a>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
          <?php else : ?>
              <p>お知らせはありません。</p>
          <?php endif; ?>

          </div>
          <div class="news__link"><a href="<?php echo get_post_type_archive_link('news'); ?>">もっとみる</a></div>
        </div>
      </div>
    </section>

    <div id="about" class="about">
      <div class="about__inner">
        <div class="about__title js-in-view fade-in-up">
          <img src="<?php echo get_template_directory_uri() ?>/img/about-logo.png" alt="OHA!" />
        </div>
        <div class="about__content">
          <div class="about__image">
            <img src="<?php echo get_template_directory_uri() ?>/img/about-img.png" alt="" />
          </div>
          <p class="about__text">
            突然ですが、あなたは朝起きる時、<br
              class="hidden-pc"
            />誰かに起こされれば起きれる派か、<br />
            誰かを起こす予定があれば起きれる派か、<br
              class="hidden-pc"
            />どちらかというとどちらでしょうか？<br />
            朝起きるという行為は、<br
              class="hidden-pc"
            />徹夜してなければ1年に365回、<br />
            10年だと3652回、<br
              class="hidden-pc"
            />50年だと18262回やってきます。<br />
            そんなに回数があるんなら、<br
              class="hidden-pc"
            />ちょっとイベントにしてみても<br
              class="hidden-pc"
            />楽しいんじゃない？<br />
            というアイデアで誕生したのがOHA!です。<br />
            日本中の起こしたい人と起こされたい人が<br
              class="hidden-pc"
            />ランダムにマッチングして<br
              class="hidden-pc"
            />起こし起こされることで、<br />朝の日常にちょっとした刺激が生まれます。
          </p>
          <div class="about__pop">＼開発者はお坊さん？／</div>
          <div class="about__button">
            <button class="button js-modal-open">誕生ストーリーを見る</button>
          </div>
        </div>
      </div>
    </div>

    <dialog id="js-about-modal" class="about-modal">
      <div class="about-modal__head">
        <button class="about-modal__close-icon js-modal-close">
          <img src="<?php echo get_template_directory_uri() ?>/img/close-icon.png" alt="モーダルを閉じる" />
        </button>
      </div>
      <div class="about-modal__body">
        <p>
          お坊さんの師匠は、ある日自分が寝坊して仏教の講義に遅刻してしまい、急いで作ったアプリがきっかけでした。そのアプリは、自分のスマートフォンにセットした時間になると、仏教の教えをパッと思い出すようになっていました。<br />
          お坊さんはそのアプリを見て、自分もそんなアプリが欲しいと思い、師匠に頼んで自分専用のアプリを作ってもらったのだそうです。そして、お坊さんは太郎にそのアプリを使ってもらうように勧めました。
        </p>
        <p>
          太郎は早速、そのアプリをダウンロードして設定してみました。翌朝、セットした時間になると、スマートフォンが音を立てて仏教の教えが表示されました。「一日を立派に過ごすためには、まず朝イチで身心の健康を整えることが大切です」という教えに太郎は心を動かされ、僧侶になるかもしれないと思いました。<br />
          以来、太郎は毎朝ちゃんと起きることができ、授業に遅刻することはなくなりました。そして、太郎はそのアプリの効果に感服し、友人たちにも勧めるようになっていきました。そうして、そのアプリは口コミで広まり、多くの人に利用されるようになっていったのでした。
        </p>
      </div>
      <div class="about-modal__close-button">
        <button class="button js-modal-close">閉じる</button>
      </div>
    </dialog>

    <section class="movie">
      <div class="movie__inner">
        <div class="heading js-in-view fade-in-up">
          <div class="heading__en">MOVIE</div>
          <h2 class="heading__ja">2秒で分かる！OHA!について</h2>
        </div>
        <div class="movie__iframe">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/4XTF16CcqPc"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </section>

    <section id="how-to-use" class="how-to-use">
      <div class="how-to-use__inner inner">
        <div class="how-to-use__title">
          <div class="heading js-in-view fade-in-up">
            <?php if (get_field('section_title_en')) : ?>
            <div class="heading__en"><?php the_field('section_title_en'); ?></div>
            <?php endif; ?>
            <?php if (get_field('section_title_en')) : ?>
            <h2 class="heading__ja"><?php the_field('section_title_ja'); ?></h2>
            <?php endif; ?>
          </div>
        </div>
        <div class="how-to-use__boxes">
          <div class="how-to-use__box">
            <div class="how-to-use__box-title">
              <?php if (get_field('box1_title')) : ?>
                <?php echo wp_kses_post(get_field('box1_title')); ?>
              <?php endif; ?>
              <?php if (get_field('box1_image')) : ?>
              <img src="<?php the_field('box1_image'); ?>" alt="" />
              <?php endif; ?>
            </div>
            <div class="how-to-use__steps">
              <div class="how-to-use__step js-in-view anim-fade-in-up">
                <div class="step-box">
                  <div class="step-box__head">
                    <div class="step-box__head-text">STEP</div>
                    <?php if (get_field('box1_step1_number')) : ?>
                    <div class="step-box__head-number"><?php the_field('box1_step1_number'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="step-box__body">
                    <div class="step-box__image">
                    <?php if (get_field('box1_step1_image')) : ?>
                      <img src="<?php the_field('box1_step1_image'); ?>" alt="" />
                    <?php endif; ?>
                    </div>
                    <?php if (get_field('box1_step1_text')) : ?>
                    <p class="step-box__text">
                      <?php echo nl2br(esc_html(get_field('box1_step1_text'))); ?>
                    </p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="how-to-use__step">
                <div class="step-box">
                  <div class="step-box__head">
                    <div class="step-box__head-text">STEP</div>
                    <?php if (get_field('box1_step2_number')) : ?>
                    <div class="step-box__head-number"><?php the_field('box1_step2_number'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="step-box__body">
                    <div class="step-box__image">
                    <?php if (get_field('box1_step2_image')) : ?>
                      <img src="<?php the_field('box1_step2_image'); ?>" alt="" />
                    <?php endif; ?>
                  </div>
                  <?php if (get_field('box1_step2_text')) : ?>
                    <p class="step-box__text">
                      <?php echo nl2br(esc_html(get_field('box1_step2_text'))); ?>
                    </p>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="how-to-use__step">
                <div class="step-box">
                  <div class="step-box__head">
                    <div class="step-box__head-text">STEP</div>
                    <?php if (get_field('box1_step3_number')) : ?>
                    <div class="step-box__head-number"><?php the_field('box1_step3_number'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="step-box__body">
                    <div class="step-box__image">
                    <?php if (get_field('box1_step3_image')) : ?>
                      <img src="<?php the_field('box1_step3_image'); ?>" alt="" />
                    <?php endif; ?>
                  </div>
                  <?php if (get_field('box1_step3_text')) : ?>
                    <p class="step-box__text">
                      <?php echo nl2br(esc_html(get_field('box1_step3_text'))); ?>
                    </p>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="how-to-use__box is-type2">
          <?php if (get_field('box2_title')) : ?>
          <div class="how-to-use__box-title">
          <?php echo wp_kses_post(get_field('box2_title')); ?>
          <?php endif; ?>
          <?php if (get_field('box2_image')) : ?>
            <img src="<?php the_field('box2_image'); ?>" alt="" />
          <?php endif; ?>
          </div>
            <div class="how-to-use__steps">
              <div class="how-to-use__step">
                <div class="step-box">
                  <div class="step-box__head">
                    <div class="step-box__head-text">STEP</div>
                    <?php if (get_field('box2_step1_number')) : ?>
                    <div class="step-box__head-number"><?php the_field('box2_step1_number'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="step-box__body">
                    <div class="step-box__image">
                      <?php if (get_field('box2_step1_image')) : ?>
                        <img src="<?php the_field('box2_step1_image'); ?>" alt="" />
                      <?php endif; ?>
                    </div>
                    <?php if (get_field('box2_step1_text')) : ?>
                      <p class="step-box__text">
                        <?php echo nl2br(esc_html(get_field('box2_step1_text'))); ?>
                      </p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="how-to-use__step">
                <div class="step-box">
                  <div class="step-box__head">
                    <div class="step-box__head-text">STEP</div>
                    <?php if (get_field('box2_step2_number')) : ?>
                    <div class="step-box__head-number"><?php the_field('box2_step2_number'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="step-box__body">
                  <?php if (get_field('box2_step2_image')) : ?>
                    <div class="step-box__image">
                    <img src="<?php the_field('box2_step2_image'); ?>" alt="" />
                      <?php endif; ?>
                    </div>
                    <?php if (get_field('box2_step2_text')) : ?>
                      <p class="step-box__text">
                        <?php echo nl2br(esc_html(get_field('box2_step2_text'))); ?>
                      </p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="how-to-use__step">
                <div class="step-box">
                  <div class="step-box__head">
                    <div class="step-box__head-text">STEP</div>
                    <?php if (get_field('box2_step3_number')) : ?>
                    <div class="step-box__head-number"><?php the_field('box2_step3_number'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="step-box__body">
                    <div class="step-box__image">
                    <?php if (get_field('box2_step3_image')) : ?>
                      <img src="<?php the_field('box2_step3_image'); ?>" alt="" />
                      <?php endif; ?>
                    </div>
                    <?php if (get_field('box2_step3_text')) : ?>
                      <p class="step-box__text">
                        <?php echo nl2br(esc_html(get_field('box2_step3_text'))); ?>
                      </p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="merit" class="merit">
      <div class="merit__inner inner">
        <div class="merit__title">
          <div class="heading js-in-view fade-in-up">
            <?php if (get_field('merit_title')) : ?>
            <div class="heading__en"><?php the_field('merit_title'); ?></div>
            <?php endif; ?>
            <?php if (get_field('merit_subtitle')) : ?>
            <div class="heading__ja"><?php the_field('merit_subtitle'); ?></div>
            <?php endif; ?>
          </div>
        </div>
        <div class="merit__boxes">
          <div class="merit__box">
            <div class="merit-box">
              <div class="merit-box__content">
                <div class="merit-box__image">
                <?php if ($merit1 = get_field('merit1')) : ?>
                  <?php if ($image = $merit1['merit1_image']) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="" />
                  <?php endif; ?>
                </div>
                <div class="merit-box__body">
                  <h3 class="merit-box__head">
                  <?php if ($number = $merit1['merit1_number']) : ?>
                    <span class="merit-box__number"><?php echo esc_html($number); ?></span>
                  <?php endif; ?>
                  <?php if ($title = $merit1['merit1_title']) : ?>
                    <span class="merit-box__title">
                      <?php echo nl2br(esc_html($title)); ?>
                    </span>
                  <?php endif; ?>
                  </h3>
                  <?php if ($description = $merit1['merit1_description']) : ?>
                  <p class="merit-box__text">
                    <?php echo esc_html($description); ?>
                  </p>
                  <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="merit__box">
            <div class="merit-box is-reverse">
              <div class="merit-box__content">
                <div class="merit-box__image">
                <?php if ($merit2 = get_field('merit2')) : ?>
                  <?php if ($image = $merit2['merit2_image']) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="" />
                    <?php endif; ?>
                </div>
                <div class="merit-box__body">
                  <h3 class="merit-box__head">
                  <?php if ($number = $merit2['merit2_number']) : ?>
                    <span class="merit-box__number"><?php echo esc_html($number); ?></span>
                  <?php endif; ?>
                  <?php if ($title = $merit2['merit2_title']) : ?>
                    <span class="merit-box__title">
                      <?php echo nl2br(esc_html($title)); ?>
                    </span>
                  <?php endif; ?>
                  </h3>
                  <?php if ($description = $merit2['merit2_description']) : ?>
                  <p class="merit-box__text">
                  <?php echo nl2br(esc_html($description)); ?>
                  </p>
                  <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="merit__box">
            <div class="merit-box">
              <div class="merit-box__content">
                <div class="merit-box__image">
                <?php if ($merit3 = get_field('merit3')) : ?>
                  <?php if ($image = $merit3['merit3_image']) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="" />
                    <?php endif; ?>
                </div>
                <div class="merit-box__body">
                  <h3 class="merit-box__head">
                  <?php if ($number = $merit3['merit3_number']) : ?>
                    <span class="merit-box__number"><?php echo esc_html($number); ?></span>
                  <?php endif; ?>
                  <?php if ($title = $merit3['merit3_title']) : ?>
                    <span class="merit-box__title">
                      <?php echo nl2br(esc_html($title)); ?>
                    </span>
                  <?php endif; ?>
                  </h3>
                  <?php if ($description = $merit3['merit3_description']) : ?>
                  <p class="merit-box__text">
                    <?php echo esc_html($description); ?>
                  </p>
                  <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="cta">
      <div class="cta__inner inner">
        <p class="cat__text">
          どうですか？<br class="hidden-pc" /><span class="inline-block"
            >早速今日から使ってみたく</span
          ><span class="inline-block">なりましたか？</span
          ><br />てかほんと使って。お願い。
        </p>
        <div class="cat__button">
          <a href="#contact" class="button">今すぐダウンロード</a>
        </div>
      </div>
    </div>

    <div class="compare">
      <div class="compare__inner inner">
        <div class="compare__title js-in-view fade-in-up">
          他のサービスとの違い
        </div>
        <div class="compare__content">
          <table class="compare__table">
            <thead>
              <tr>
                <th></th>
                <?php if (get_field('oha_logo')) : ?>
                <th><img src="<?php the_field('oha_logo'); ?>" alt="OHA!" /></th>
                <?php endif; ?>
                <?php if (get_field('company1_name')) : ?>
                <th><?php the_field('company1_name'); ?></th>
                <?php endif; ?>
                <?php if (get_field('company2_name')) : ?>
                <th><?php the_field('company2_name'); ?></th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>仲介手数料</th>
                <?php if ($commission = get_field('commission')) : ?>
                  <?php if ($oha_commission = $commission['oha_commission']) : ?>
                  <td><?php echo esc_html($oha_commission); ?></td>
                  <?php endif; ?>
                  <?php if ($company1_commission = $commission['company1_commission']) : ?>
                  <td><?php echo nl2br(esc_html($company1_commission)); ?></td>
                  <?php endif; ?>
                  <?php if ($company2_commission = $commission['company2_commission']) : ?>
                  <td><?php echo nl2br(esc_html($company2_commission)); ?></td>
                  <?php endif; ?>
                <?php endif; ?>
              </tr>
              <tr>
                <th>登録料</th>
                <?php if ($registration = get_field('registration')) : ?>
                  <?php if ($oha_registration = $registration['oha_registration']) : ?>
                  <td><?php echo esc_html($oha_registration); ?></td>
                  <?php endif; ?>
                  <?php if ($company1_registration = $registration['company1_registration']) : ?>
                  <td><?php echo nl2br(esc_html($company1_registration)); ?></td>
                  <?php endif; ?>
                  <?php if ($company2_registration = $registration['company2_registration']) : ?>
                  <td><?php echo nl2br(esc_html($company2_registration)); ?></td>
                  <?php endif; ?>
                <?php endif; ?>
              </tr>
              <tr>
                <th>年間皆勤賞特典</th>
                <?php if ($bonus = get_field('annual_bonus')) : ?>
                  <?php if ($oha_bonus = $bonus['oha_bonus']) : ?>
                  <td><?php echo esc_html($oha_bonus); ?></td>
                  <?php endif; ?>
                  <?php if ($company1_bonus = $bonus['company1_bonus']) : ?>
                  <td><?php echo nl2br(esc_html($company1_bonus)); ?></td>
                  <?php endif; ?>
                  <?php if ($company2_bonus = $bonus['company2_bonus']) : ?>
                  <td><?php echo nl2br(esc_html($company2_bonus)); ?></td>
                  <?php endif; ?>
                <?php endif; ?>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="compare__attention">横にスクロールできます</p>
      </div>
    </div>

    <section class="qa">
      <div class="qa__inner inner">
        <div class="qa__title">
          <div class="heading js-in-view fade-in-up">
            <div class="heading__en">Q&A</div>
            <h2 class="heading__ja">よくあるご質問</h2>
          </div>
        </div>
        <div class="qa__boxes">
          <div class="qa__box qa-box is-open">
          <?php if ($qa1 = get_field('qa1')) : ?>
            <button type="button" class="qa-box__head js-accordion">
              <span class="qa-box__head-icon">Q</span>
              <?php if ($question = $qa1['question']) : ?>
              <span class="qa-box__head-text">
                <?php echo esc_html($question); ?>
              </span>
              <?php endif; ?>
            </button>
            <div class="qa-box__body" style="display: block">
              <div class="qa-box__a">
                <span class="qa-box__a-icon">A</span>
                <?php if ($answer = $qa1['answer']) : ?>
                <span class="qa-box__a-text">
                  <?php echo esc_html($answer); ?>
                </span>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
          </div>
          <div class="qa__box qa-box">
          <?php if ($qa2 = get_field('qa2')) : ?>
            <button type="button" class="qa-box__head js-accordion">
              <span class="qa-box__head-icon">Q</span>
              <?php if ($question = $qa2['question']) : ?>
              <span class="qa-box__head-text">
              <?php echo esc_html($question); ?>
              </span>
              <?php endif; ?>
            </button>
            <div class="qa-box__body">
              <div class="qa-box__a">
                <span class="qa-box__a-icon">A</span>
                <?php if ($answer = $qa2['answer']) : ?>
                <span class="qa-box__a-text">
                  <?php echo esc_html($answer); ?>
                </span>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
          </div>
          <div class="qa__box qa-box">
          <?php if ($qa3 = get_field('qa3')) : ?>
            <button type="button" class="qa-box__head js-accordion">
              <span class="qa-box__head-icon">Q</span>
              <?php if ($question = $qa3['question']) : ?>
              <span class="qa-box__head-text">
              <?php echo esc_html($question); ?>
              </span>
              <?php endif; ?>
            </button>
            <div class="qa-box__body">
              <div class="qa-box__a">
                <span class="qa-box__a-icon">A</span>
                <?php if ($answer = $qa3['answer']) : ?>
                <span class="qa-box__a-text">
                  <?php echo esc_html($answer); ?>
                </span>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="gallery">
      <div class="gallery__inner inner">
        <div class="gallery__title">
          <div class="heading js-in-view fade-in-up">
            <div class="heading__en">GALLERY</div>
            <h2 class="heading__ja">ギャラリー</h2>
          </div>
        </div>
        <div class="gallery__slider">
          <!-- Slider main container -->
          <div id="js-gallery-swiper" class="swiper gallery__swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">

              <!-- Slides -->
              <?php
              $args = array(
                'post_type' => 'gallery', // Custom Post Typeのスラッグ
                'posts_per_page' => 3,  // 表示件数
                'orderby' => 'date',    // 日付順
                'order' => 'ASC',      // ASCで昇順、DESCで降順
              );
              $query = new WP_Query($args);

              if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide gallery__slide">
                  <div class="gallery-card">
                    <div class="gallery-card__image">
                      <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                    </div>
                    <p class="gallery-card__text">
                      <?php the_title(); ?>
                    </p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile;
                wp_reset_postdata();
              else : ?>
                <p>画像がありません。</p>
              <?php endif; ?>
            </div>
            <!-- If we need pagination -->
            <div
              id="js-gallery-pagination"
              class="swiper-pagination gallery__pagination"
            ></div>

            <!-- If we need navigation buttons -->
            <div
              id="js-gallery-prev"
              class="swiper-button-prev gallery__prev"
            ></div>
            <div
              id="js-gallery-next"
              class="swiper-button-next gallery__next"
            ></div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="contact">
      <div class="contact__inner inner">
        <div class="contact__box">
          <div class="contact__title">
            <div class="heading js-in-view fade-in-up">
              <div class="heading__en">CONTACT</div>
              <h2 class="heading__ja">お問い合わせ</h2>
            </div>
          </div>
          <form class="contact__form">
            <div class="contact__fields">
              <div class="contact__field">
                <div class="form-field">
                  <div class="form-field__head">
                    <label for="your-name" class="form-field__label"
                      >お名前</label
                    >
                    <span class="form-field__tag">必須</span>
                  </div>
                  <div class="form-field__item">
                    <input
                      class="form-text"
                      type="text"
                      name="your-name"
                      id="your-name"
                      placeholder="田中 おは次郎"
                    />
                  </div>
                </div>
              </div>
              <div class="contact__field">
                <div class="form-field">
                  <div class="form-field__head">
                    <label for="your-email" class="form-field__label"
                      >メールアドレス</label
                    >
                    <span class="form-field__tag">必須</span>
                  </div>
                  <div class="form-field__item">
                    <input
                      class="form-text"
                      type="email"
                      name="your-email"
                      id="your-email"
                      placeholder="info@oha.com"
                    />
                  </div>
                </div>
              </div>
              <div class="contact__field">
                <div class="form-field">
                  <div class="form-field__head">
                    <div class="form-field__label">お問い合わせ項目</div>
                    <span class="form-field__tag">必須</span>
                  </div>
                  <div class="form-field__item">
                    <div class="form-field__radios">
                      <label class="form-field__radio from-radio">
                        <input
                          class="from-radio__input"
                          type="radio"
                          name="your-name"
                        />
                        <span class="from-radio__text">アプリの質問</span>
                      </label>
                      <label class="form-field__radio from-radio">
                        <input
                          class="from-radio__input"
                          type="radio"
                          name="your-name"
                        />
                        <span class="from-radio__text">取材の依頼</span>
                      </label>
                      <label class="form-field__radio from-radio">
                        <input
                          class="from-radio__input"
                          type="radio"
                          name="your-name"
                        />
                        <span class="from-radio__text">その他</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="contact__field">
                <div class="form-field">
                  <div class="form-field__head">
                    <label for="your-age" class="form-field__label">年代</label>
                    <span class="form-field__tag is-option">任意</span>
                  </div>
                  <div class="form-field__item">
                    <select name="your-age" id="your-age" class="form-select">
                      <option value="">選択してください</option>
                      <option value="">10代</option>
                      <option value="">20代</option>
                      <option value="">30代</option>
                      <option value="">40代</option>
                      <option value="">50代</option>
                      <option value="">60代</option>
                      <option value="">70代</option>
                      <option value="">80代</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="contact__field">
                <div class="form-field">
                  <div class="form-field__head">
                    <label for="your-message" class="form-field__label"
                      >お問い合わせ内容</label
                    >
                    <span class="form-field__tag">必須</span>
                  </div>
                  <div class="form-field__item">
                    <textarea
                      name="your-message"
                      id="your-message"
                      class="form-textarea"
                      cols="30"
                      rows="10"
                      placeholder="ここに文章を入力してくださいここに文章を入力してください"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="contact__privacy">
              <label class="form-checkbox">
                <input
                  type="checkbox"
                  name="your-privacy"
                  class="form-checkbox__input"
                />
                <span class="form-checkbox__text"
                  ><a href="" target="_blank">プライバシーポリシー</a
                  >に同意する</span
                >
              </label>
            </div>
            <div class="contact__button">
              <input type="submit" value="送信する" class="button" />
            </div>
          </form>
        </div>
      </div>
    </section>

    <?php get_footer(); ?>
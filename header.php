<!DOCTYPE html>
<html lang="ja">
  <head prefix="og: https://ogp.me/ns#">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex" />
    <!-- <title>OHA!</title>
    <meta
      name="description"
      content="OHA!は、朝起きたい人と朝起こされたい人がランダムにマッチングしちゃう通話アプリです。"
    /> -->
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" />
    <meta property="og:title" content="OHA!" />
    <meta
      property="og:description"
      content="OHA!は、朝起きたい人と朝起こされたい人がランダムにマッチングしちゃう通話アプリです。"
    />
    <meta property="og:type" content="website" />
    <!-- 案件では実際のURLを入れる -->
    <meta property="og:url" content="https://example.com/" />
    <!-- 案件では実際のURLを入れる -->
    <meta property="og:image" content="https://example.com/img/ogp.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
      rel="stylesheet"
    />

    <?php wp_head(); ?>
  </head>
  <body>
    <header class="header">
      <div class="header__inner">
        <h1 class="header__logo">
          <a href=""><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="OHA!" /></a>
        </h1>
        <nav class="header__nav">
        <?php
          wp_nav_menu(
            array(
              'depth' => 1,
              'theme_location' => 'global', // グローバルメニューをここに表示すると指定
              'container' => '',
              'menu_class' => 'header__nav',
              'link_class' => 'header__link',
            )
          );
        ?>
          <!-- <a href="#about" class="header__link">サービスについて</a>
          <a href="#how-to-use" class="header__link">使い方</a>
          <a href="#merit" class="header__link">メリット</a>
          <a href="#contact" class="header__button button">お問い合わせ</a> -->
        </nav>
        <button id="js-drawer-icon" class="header__open drawer-icon">
          <span class="drawer-icon__bar"></span>
          <span class="drawer-icon__bar"></span>
          <span class="drawer-icon__bar"></span>
        </button>
      </div>
    </header>

    <div id="js-drawer-content" class="drawer-content">
      <?php
        wp_nav_menu(
          array(
            'depth' => 1,
            'theme_location' => 'drawer', // メニュー位置（管理画面で設定したメニュー位置名）
            'container' => '', // メニューを囲むタグを省略
            'menu_class' => 'drawer-content__menu', // メニューリストのクラス
          )
        );
      ?>
      <!-- <nav class="drawer-content__menu">
        <a href="#about" class="drawer-content__link">サービスについて</a>
        <a href="#how-to-use" class="drawer-content__link">使い方</a>
        <a href="#merit" class="drawer-content__link">メリット</a> -->
        <div class="drawer-content__button">
          <a href="#contact" class="button">お問い合わせ</a>
        </div>
      </nav>
    </div>
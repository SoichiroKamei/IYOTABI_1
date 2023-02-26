<?php
require_once('../../app/functions.php');
require_once('../../app/data.php');
require_once('../../app/content.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IYOTABI</title>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
  <header>
    <div class="logo">
      <a href="main.php"><img src="../../image/logo.png"></a>
    </div>
    <div class="select_list">
      <ul>
        <li><a href="mypage.php">会員情報</a></li>
        <li><a href="../../app/log_out.php">ログアウト</a></li>
      </ul>
    </div>
  </header>

  <main>

    <!-- 左カラム -->
    <div class="left-wrapper">
      <div class="content-wrapper">
        <h3>掲載件数：<?= h(Content::getCount()) ?>件</h3>
        <div class="content-items">
          <?php foreach ($contents as $content) : ?>
            <div class="content-item">
              <img src="<?= h($content->getImage()) ?>" class="content-item-image">
              <h4 class="content-item-name">
                <span><?= h($content->getName()) ?></span>
              </h4>
              <p class="content-item-introduction">
                <?= h($content->getIntroduction()) ?>
              </p>
              <div class="anchor">
                <a href="detail.php?name=<?= h($content->getName()) ?>">&laquo; 口コミを見る</a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- 右カラム -->
    <div class="side">
      <h3 class="side-title">IYOTABIとは</h3>
      <P>
        IYOTABIとは伊予の国・愛媛の魅力を知ってもらい、愛媛を訪れてもらうことを目的とした口コミサイトです。
      </P>
    </div>
  </main>

</body>

</html>
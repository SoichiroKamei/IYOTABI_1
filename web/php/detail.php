<?php
require_once('../../app/content.php');
require_once('../../app/data.php');
require_once('../../app/DbManager.php');
require_once('../../app/functions.php');

$contentName = $_GET['name'];
$content = Content::findByName($contents, $contentName);

mb_internal_encoding("utf-8");
$pdo = getDb();

$review = $content->getAlphabet_name() . '_review';

$stmt = $pdo->query("SELECT * FROM $review;");
$pdo = NULL;
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IYOTABI</title>
  <link rel="stylesheet" type="text/css" href="../css/detail.css">

  <!-- fontawesome -->
  <link href="../../fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="../../fontawesome/css/brands.css" rel="stylesheet">
  <link href="../../fontawesome/css/solid.css" rel="stylesheet">
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
    <div class="main-wrapper">

      <!-- 観光地等の写真と説明 -->
      <div class="content-item">
        <img src="<?= h($content->getImage()) ?>" class="item-image">
        <h4 class="item-name">
          <span><?= h($content->getName()) ?></span>
        </h4>
        <div class="explain-wrapper">
          <p>
            <?= nl2br(h($content->getExplain())) ?>
          </p>
        </div>
      </div>

      <!-- 口コミ一覧 -->
      <div class="review-wrapper">
        <div class="review-header">
          <h5>＜　口コミ一覧　＞</h5>
          <div class="review-anchor">
            <div class="icon"><i class="fa-regular fa-pen-to-square"></i></div>
            <a href="review_input.php?name=<?= h($content->getName()) ?>"> 口コミを書く</a>
          </div>
        </div>
        <div class="lists">
          <?php foreach ($stmt as $row) : ?>
            <div class='reviews'>
              <div class="title-time">
                <h3><?= h($row['title'])  ?></h3>
                <div class="review-sub">
                  <div class="update_time">
                    <?php $update_time = new DateTime($row['created_at']);
                    echo $update_time->format('Y/m/d');
                    ?>
                  </div>
                  <div class='handlename'>
                    <?= h($row['handlename']) ?>
                  </div>
                </div>
              </div>
              <div class='comments'>
                <?= h($row['comments']) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="anchor-wrapper">
        <a href="main.php">&laquo; 掲載一覧へ戻る</a>
      </div>
    </div>
  </main>

</body>

</html>
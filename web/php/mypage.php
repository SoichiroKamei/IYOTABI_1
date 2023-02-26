<?php
require_once('../../app/functions.php');
require_once('../../app/DbManager.php');
require_once('../../app/content.php');
require_once('../../app/data.php');
mb_internal_encoding("utf8");

$pdo = getDb();

$stmts[] = $pdo->query("SELECT * FROM matsuyama_castle_review");
$stmts[] = $pdo->query("SELECT * FROM dogo_onsen_review");
$stmts[] = $pdo->query("SELECT * FROM shimanami_kaido_review");
$stmts[] = $pdo->query("SELECT * FROM botchan_train_review");
$stmts[] = $pdo->query("SELECT * FROM tai_meshi_review");
$stmts[] = $pdo->query("SELECT * FROM jakoten_review");
$stmts[] = $pdo->query("SELECT * FROM orange_review");
$stmts[] = $pdo->query("SELECT * FROM imabari_towel_review");
$stmts[] = $pdo->query("SELECT * FROM tart_review");
$stmts[] = $pdo->query("SELECT * FROM botchan_dumpling_review");

$pdo = NULL;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ登録</title>
  <link rel="stylesheet" type="text/css" href="../css/mypage.css">
</head>

<body>
  <header>
  </header>

  <main>
    
    <!-- 会員情報フォーム -->
    <div class="confirm">
      <h1>会員情報</h1>
      <div class="profile_pic">
        <img src="<?= h($_SESSION['picture']) ?>">
      </div>
      <div class="basic_info">
        <p>氏名: <?= h($_SESSION['name']) ?></p>
        <p>メール: <?= h($_SESSION['mail']) ?></p>
        <p>パスワード: <?= h($_SESSION['password']) ?></p>
      </div>
      <div class="buttons">
        <form action="main.php">
          <input type="submit" class="return_button" value="戻る">
        </form>
        <form action="mypage_hensyu.php">
          <input type="submit" class="edit_button" value="編集する">
        </form>
      </div>
    </div>

    <!-- 過去の口コミ一覧 -->
    <div class="review">
      <h3>＜ <?= h($_SESSION['name']) ?>さんの過去の口コミ ＞</h3>
      <div class="review-list">
        <?php foreach ($stmts as $stmt) : ?>
          <?php foreach ($stmt as $row) : ?>
            <?php if ($row['user_id'] === $_SESSION['id']) : ?>
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
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>
    </div>
    </div>
  </main>

</body>

</html>
<?php
require_once('../../app/functions.php');

validateToken();

mb_internal_encoding("utf-8");

$temp_pic_name = $_FILES['picture']['tmp_name'];
$original_pic_name = $_FILES['picture']['name'];
$path_filename = '../../image/' . $original_pic_name;
move_uploaded_file($temp_pic_name, '../../image/' . $original_pic_name);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ登録</title>
  <link rel="stylesheet" type="text/css" href="../css/register_confirm.css">
</head>

<body>
  <header></header>

  <main>
    <div class="confirm">
      <h1>会員登録 確認</h1>
      <p class="confirm_text">こちらの内容で登録しても宜しいでしょうか？</p>
      <div class="name">
        <p>氏名:
          <?= h($_POST['name']) ?>
        </p>
      </div>
      <div class="mail">
        <p>メール:
          <?= h($_POST['mail']) ?>
        </p>
      </div>
      <div class="password">
        <p>パスワード:
          <?= h($_POST['password']) ?>
        </p>
      </div>
      <div class="picture">
        <p>プロフィール写真:
          <?= h($_FILES['picture']['name']) ?>
        </p>
      </div>
      <div class="buttons">
        <div class="return_button">
          <form action="register.php">
            <input type="submit" class="button1" value="戻って修正する">
          </form>
        </div>
        <div class="submit_button">
          <form action="../../app/register_insert.php" method="post">
            <input type="submit" class="button2" value="登録する">
            <input type="hidden" value="<?= h($_POST['name']) ?>" name="name">
            <input type="hidden" value="<?= h($_POST['mail']) ?>" name="mail">
            <input type="hidden" value="<?= h($_POST['password']) ?>" name="password">
            <input type="hidden" value="<?= h($path_filename) ?>" name="path_filename">
            <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          </form>
        </div>
      </div>
  </main>

</body>

</html>
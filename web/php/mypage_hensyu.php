<?php
require_once('../../app/functions.php');
mb_internal_encoding("utf8");

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ登録</title>
  <link rel="stylesheet" type="text/css" href="../css/mypage_hensyu.css">
</head>

<body>
  <header></header>

  <main>
    <div class="confirm">
      <h1>会員情報</h1>
      <div class="profile_pic">
        <img src="<?= h($_SESSION['picture']) ?>">
      </div>
      <form action="../../app/mypage_update.php" method="post" enctype="multipart/form-data">
        <div class="basic_info">
          <p>氏名:<input type="text" class="formbox" size="40" value="<?= h($_SESSION['name']) ?>" name="name" required></p>
          <p>メール: <input type="text" class="formbox" size="40" value="<?= h($_SESSION['mail']) ?>" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></p>
          <p>パスワード: <input type="password" class="formbox" size="40" value="<?= h($_SESSION['password']) ?>" name="password" pattern="^[a-zA-Z0-9]{6,}$" required></p>
        </div>
        <div class="button">
          <input type="submit" class="edit_button" value="この内容に変更する">
        </div>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </form>
    </div>
  </main>

</body>

</html>
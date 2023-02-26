<?php
require_once('../../app/functions.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ登録</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
  <header></header>

  <main>
      <form action="../../app/after_login.php" method="post">
        <div class="form_contents">
          <div class="mail">
            <label>メールアドレス</label><br>
            <input type="text" class="formbox" size="40" <?php if(isset($_COOKIE['mail'])) : ?> value="<?= h($_COOKIE['mail']) ?>"<?php endif; ?> name="mail" require>
          </div>
          <div class="password">
            <label>パスワード</label><br>
            <input type="password" class="formbox" size="40" <?php if(isset($_COOKIE['password'])) : ?> value="<?= h($_COOKIE['password']) ?>" <?php endif; ?> name="password" require>
          </div>
          <div class="keep_login">
            <label><input type="checkbox" class="keep_login_button" size="40" name="login_keep" value="login_keep" <?php if (isset($_COOKIE['login_keep'])) : ?> checked='checked' <?php endif; ?>>
              ログイン状態を保持する</label>
          </div>
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          <div class="login_button">
            <input type="submit" class="submit_button" size="35" value="ログイン">
          </div>
        </div>
      </form>
  </main>

</body>

</html>
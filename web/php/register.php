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
  <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>

<body>
  <header></header>

  <main>
    <form action="register_confirm.php" method="post" enctype="multipart/form-data">
      <div class="form_contents">
        <h2>会員登録</h2>
        <div class="name">
          <div class="hissu">必須</div><label>氏名</label><br>
          <input type="text" class="formbox" size="40" name="name" required>
        </div>
        <div class="mail">
          <div class="hissu">必須</div><label>メールアドレス</label><br>
          <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        </div>
        <div class="password">
          <div class="hissu">必須</div><label>パスワード（半角英数字6文字以上）</label><br>
          <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
        </div>
        <div class="password">
          <div class="hissu">必須</div><label>パスワード(確認)</label><br>
          <input type="password" class="formbox" size="40" name="confirm_password" id="confirm" oninput="ConfirmPassword(this)" required>
        </div>
        <div class="picture">
          <label>プロフィール写真</label><br>
          <input type="hidden" name="max_file_size" value="1000000">
          <input type="file" size="40" name="picture">
        </div>
        <div class="toroku">
          <input type="submit" class="submit_button" size="35" value="登録する">
        </div>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </div>
    </form>
  </main>

  <script>
    function ConfirmPassword(confirm) {
      var input1 = password.value;
      var input2 = confirm.value;
      if (input1 !== input2) {
        confirm.setCustomValidity("パスワードが一致しません。");
      } else {
        confirm.setCustomValidity("");
      }
    }
  </script>

</body>

</html>
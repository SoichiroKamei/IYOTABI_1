<?php
require_once('../../app/functions.php');
createToken();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IYOTABI</title>
  <link rel="stylesheet" type="text/css" href="../css/top.css">
</head>

<body>
  <div class="background-wrapper">
    <header>
      <div class="logo">
        <img src="../../image/logo.png">
      </div>
      <div class="select_list">
        <ul>
          <li><a href="register.php">会員情報</a></li>
          <li><a href="login.php">ログイン</a></li>
        </ul>
      </div>
    </header>
    <main>
      <div class="main-text">
        <h2>IYOTABI</h2>
        <p>伊予の国・愛媛の魅力を知ってもらうための口コミサイト</p>
      </div>
    </main>
  </div>
</body>

</html>
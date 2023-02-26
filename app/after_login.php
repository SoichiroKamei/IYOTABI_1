<?php
require_once('DbManager.php');
require_once('functions.php');
require_once('data.php');
require_once('content.php');

validateToken();

mb_internal_encoding("utf8");

if (empty($_SESSION['name'])) {
  try {
    $pdo = getDb();
  } catch (PDOException $e) {
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインしてください。</p>
    <a href='http://localhost/IYOTABI_1/web/php/login.php'>ログイン画面へ</a>");
  }

  $stmt = $pdo->prepare("SELECT * FROM user_information WHERE mail = ? && password = ?;");
  $stmt->bindValue(1, $_POST['mail']);
  $stmt->bindValue(2, $_POST['password']);
  $stmt->execute();
  $pdo = NULL;

  foreach ($stmt as $row) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
  }

  if (empty($_SESSION['mail']) || empty($_SESSION['password'])) {
    header("Location: http://localhost/IYOTABI_1/web/php/login_error.php");
    exit();
  }

  if (isset($_POST['login_keep'])) {
    $_SESSION['login_keep'] = $_POST['login_keep'];
  }
}

if (isset($_SESSION['mail']) && isset($_SESSION['login_keep'])) {
  setcookie('mail', $_SESSION['mail'], time() + 60 * 60 * 24 * 7, '/');
  setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 7, '/');
  setcookie('login_keep', $_SESSION['login_keep'], time() + 60 * 60 * 24 * 7, '/');
} elseif (!isset($_SESSION['login_keep'])) {
  setcookie('mail', '', time() - 1, '/');
  setcookie('password', '', time() - 1, '/');
  setcookie('login_keep', '', time() - 1, '/');
}

header("Location: http://localhost/IYOTABI_1/web/php/main.php");
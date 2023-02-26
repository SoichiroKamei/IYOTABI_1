<?php
require_once('DbManager.php');
require_once('functions.php');

mb_internal_encoding("utf8");

validateToken();

try {
  $pdo = getDb();
} catch (PDOException $e) {
  die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインしてください。</p>
  <a href='http://lacalhost/IYOTABI_1/web/php/login.php'>ログイン画面へ</a>");
}

$stmt = $pdo->prepare("update user_information set name = ?, mail = ?, password = ? where id = ?; ");
$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $_SESSION['id']);
$stmt->execute();

$stmt = $pdo->prepare("SELECT * FROM user_information where name = ? && mail = ? && password = ?;");
$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->execute();
$pdo = NULL;

foreach ($stmt as $row) {
  $_SESSION['id'] = $row['id'];
  $_SESSION['name'] = $row['name'];
  $_SESSION['mail'] = $row['mail'];
  $_SESSION['password'] = $row['password'];
  $_SESSION['picture'] = $row['picture'];
}

header('Location: http://localhost/IYOTABI_1/web/php/mypage.php');

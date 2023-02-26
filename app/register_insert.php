<?php
mb_internal_encoding("utf-8");
require_once('DbManager.php');
require_once('functions.php');

validateToken();

$pdo = getDb();
$stmt = $pdo->prepare("insert into user_information(name,mail,password,picture)values(?,?,?,?);");
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['path_filename']);
$stmt->execute();
$pdo = NULL;

header('Location: http://localhost/IYOTABI_1/web/php/after_register.php');




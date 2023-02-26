<?php
require_once('content.php');
require_once('data.php');
require_once('DbManager.php');
require_once('functions.php');

validateToken();

$contentName = $_GET['name'];
$content = Content::findByName($contents, $contentName);
$review = $content->getAlphabet_name() . '_review';

mb_internal_encoding("utf-8");
$pdo = getDb();
$stmt = $pdo->prepare("insert into $review (handlename,title,comments,user_id)values(?,?,?,?);");
$stmt->bindValue(1,$_POST['handlename']);
$stmt->bindValue(2,$_POST['title']);
$stmt->bindValue(3,$_POST['comments']);
$stmt->bindValue(4,$_SESSION['id']);
$stmt->execute();
$pdo = NULL;

$content  = $content->getName();
header("Location: http://localhost/IYOTABI_1/web/php/detail.php?name=$content");


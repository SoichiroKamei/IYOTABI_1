<?php
function getDb() {
  $dsn = 'mysql:dbname=iyotabi_1; host=localhost;';
  $user = 'root';
  $password = '';
  $pdo = new PDO($dsn, $user, $password);
  return $pdo;
}


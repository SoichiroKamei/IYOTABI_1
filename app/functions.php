<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

session_start();

function createToken() {
  if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  }
}

function validateToken() {
  if (empty($_SESSION['token']) || $_SESSION['token'] !== $_POST['token']) {
    exit('Invalid post request');
  }
}


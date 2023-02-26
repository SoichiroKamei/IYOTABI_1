<?php
require_once('../../app/content.php');
require_once('../../app/data.php');
require_once('../../app/functions.php');

$contentName = $_GET['name'];
$content = Content::findByName($contents, $contentName);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/review_input.css">
</head>

<body>
  <header>
  </header>
  <main>
    <div class="input-form">
      <form method="post" action="../../app/review_insert.php?name=<?= h($content->getName()) ?>" onSubmit="return check()">
        <div class="form_contents">
          <h2>口コミフォーム (<?= h($content->getName()) ?>)</h2>
          
          <div class="handlename">
            <label>ハンドルネーム</label>
            <br>
            <input type="text" class="text" size="35" name="handlename">
          </div>
          <div class="title">
            <label>タイトル</label>
            <br>
            <input type="text" class="text" size="35" name="title">
          </div>
          <div class="comments">
            <label>コメント</label>
            <br>
            <textarea cols="37" rows="7" name="comments"></textarea>
          </div>
          <div class="button">
            <input type="submit" class="submit_button" value="口コミをする">
          </div>
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
        </div>
      </form>
    </div>
  </main>

  <script>
    function check() {
      if (window.confirm('この内容を投稿してもよろしいですか？')) {
        return true;
      } else {
        return false;
      }
    }
  </script>

</body>

</html>
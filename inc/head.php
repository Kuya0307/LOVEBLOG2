<?php
function render_header($css_path) {
  echo <<<EOF
if(!isset($_SESSION)){
  session_start();
}
  
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Header Sample</title>
  <link rel="stylesheet" href="../css/head.css">
  <link rel="stylesheet" href="../css/update.css">
</head>
<body>
  <header>
    <img class="aicon" src="../img/aicon.png" alt="">
    <h1 class="title">JYOBILOVE</h1>
    <div class="use">
    <p class="user"><?php echo $_SESSION['name']; ?></p>
    <p class="log">でログイン中</p>
    </div>
    <button class="button" onclick="location.href='./logout.php'">ログアウト</button>
  </header>
  EOF;
}
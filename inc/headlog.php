<?php 
function render_header($css_path) {
echo <<<EOF
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Header Sample</title>
  <link rel="stylesheet" href="../css/headlog.css">
  <link rel="stylesheet" href="{$css_path}">
</head>
  <header>
    <img class="aicon" src="../img/aicon1.png" alt="">
    <h1 class="title">JYOBILOVE</h1>
    <!-- <button class="button" onclick="location.href='./php/loginform.php'">ログイン</button> -->
  </header>
</html>
EOF;
}
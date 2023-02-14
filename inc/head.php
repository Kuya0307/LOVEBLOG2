<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Header Sample</title>
  <link rel="stylesheet" href="../css/head.css">
</head>
  <header>
    <img class="aicon" src="../img/aicon.png" alt="">
    <h1 class="title">JYOBILOVE</h1>
    <div class="use">
    <p class="user"><?php echo $_SESSION['name']; ?></p>
    <p class="log">でログイン中</p>
    </div>
    <button class="button">ログアウト</button>
  </header>
</html>
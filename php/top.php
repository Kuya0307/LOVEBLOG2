<?php
session_start();
$title = "examplePage";
$description = "(説明)外部ファイルの読み込みテスト";
$is_home = true;  // ホームのページに行かないようにする
include '../inc/head.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <title>Document</title>
</head>
<body>
    <p>登録完了！</p>
    <p>ログイン完了！</p>
    
</body>
</html>
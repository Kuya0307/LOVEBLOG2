<?php
require_once 'db_connect.php';
session_start();
include '../inc/headout.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <h1 class="titlelog">ログイン</h1>
        <?php if(isset($_SESSION['err_msg'])){ ?>
        <div class="box-005">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
            <path fill="#f06060"
                  d="M12,1.5c.7,0,1.3,.4,1.6,.9l10.1,17.3c.3,.6,.3,1.3,0,1.9s-1,.9-1.6,.9H1.9c-.7,0-1.3-.4-1.6-.9s-.3-1.3,0-1.9L10.4,2.4c.3-.6,1-.9,1.6-.9Zm0,6c-.6,0-1.1,.5-1.1,1.1v5.3c0,.6,.5,1.1,1.1,1.1s1.1-.5,1.1-1.1v-5.3c0-.6-.5-1.1-1.1-1.1Zm1.5,10.5c0-.8-.7-1.5-1.5-1.5s-1.5,.7-1.5,1.5,.7,1.5,1.5,1.5,1.5-.7,1.5-1.5Z"/>
        </svg>
        ログイン失敗
    </div>
    <p><?php
            echo $_SESSION['err_msg'];
        ?>
    </p>
    </div>
    <?php } ?>
        
        <form action="login.php" method="post">
            <p class="usr">ユーザー名</p>
            <input type="text" name = "name" class="usrbox">
            <p class="pw">パスワード</p>
            <input type="pw" name = "pw" class="pwbox">
            <div class="log">
                <input type="submit" class="logbtn" value="ログイン">
            </div>
        </form>
    </div>
    
</body>
</html>
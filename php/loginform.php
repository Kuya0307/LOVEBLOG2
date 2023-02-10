<?php
require_once 'db_connect.php';
session_start();
if(isset($_SESSION['err_msg'])){
    echo $_SESSION['err_msg'];
}
?>
<form action="login.php" method="post">
    <p>ユーザー名</p>
    <input type="text" name = "name">
    <p>パスワード</p>
    <input type="pw" name = "pw">
    <input type="submit" values="ログイン">
</form>
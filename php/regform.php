<?php
require_once 'db_connect.php';
session_start();
?>
<form action="reg.php" method="post">
    name <input type="text" name="name">
    PW <input type="pw" name="pw">
    <input type="submit">
</form>
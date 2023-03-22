<?php
session_start();
$_SESSION['table']=1;
var_dump($_SESSION['table']);
header('Location:table.php');
exit;
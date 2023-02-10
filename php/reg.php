<?php
require_once 'db_connect.php';
session_start();
echo "<pre>";
var_dump($_POST);
echo "</pre>";
$name = $_POST['name'];
$pw = $_POST['pw'];
$pw_hash = password_hash($pw,PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name,pass_hash) VALUES(:name,:pw_hash)";
$stm = $pdo->prepare($sql);
$stm->bindValue(':name',$name,PDO::PARAM_STR);
$stm->bindValue(':pw_hash',$pw_hash,PDO::PARAM_STR);
$stm->execute();
$reg = $stm->fetch(PDO::FETCH_ASSOC);
header('Location:top.php');


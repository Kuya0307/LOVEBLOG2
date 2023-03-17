<?php
require_once 'db_connect.php';
session_start();
$error = false;
echo "<pre>";
var_dump($_POST);
echo "</pre>";
$name = $_POST['name'];
$pw = $_POST['pw'];
// $agry = $_POST['agry'];
$pw_hash = password_hash($pw,PASSWORD_DEFAULT);


$sql1 = "SELECT * FROM users WHERE name = :name";
$stm = $pdo->prepare($sql1);
$stm->bindValue(':name',$name,PDO::PARAM_STR);
$stm->execute();
$reg1 = $stm->fetch(PDO::FETCH_ASSOC);
if(empty($reg1)){
    $sql2 = "INSERT INTO users (name,pass_hash) VALUES(:name,:pw_hash)";
    $stm = $pdo->prepare($sql2);
    $stm->bindValue(':name',$name,PDO::PARAM_STR);
    $stm->bindValue(':pw_hash',$pw_hash,PDO::PARAM_STR);
    $stm->execute();
    $reg2 = $stm->fetch(PDO::FETCH_ASSOC);
    header('Location:loginform.php');
    exit;
}else{
    $error = true;
    $_SESSION['err_reg'] = "ユーザ名が重複しています";
}
if($error){
    header('Location:regform.php');
    exit;
}
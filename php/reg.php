<?php
require_once 'db_connect.php';
session_start();
$error = false;
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
$name = $_POST['name'];
$name = htmlspecialchars($name,ENT_QUOTES,"UTF-8");
if(isset($name)){
    $_SESSION['reg_name'] = $name;
}else{
    $_SESSION['reg_name'] = "asdfg";
}
$pw = $_POST['pw'];
$pw = htmlspecialchars($pw,ENT_QUOTES,"UTF-8");
// if(!isset($pw)){
//     $_SESSION['err_pw'] = "パスワードを入力してください";
// }else if(isset($pw)){
//     $_SESSION['err_pw'] = "";
// }
$agry = $_POST['agry'];
$agry = htmlspecialchars($agry,ENT_QUOTES,"UTF-8");
$pw_hash = password_hash($pw,PASSWORD_DEFAULT);
$pw_hash = htmlspecialchars($pw_hash,ENT_QUOTES,"UTF-8");
//登録しようとしているユーザー名が重複していないかどうか
//重複していたらreg1は存在していて、重複していなかったらreg1は存在していない
$sql1 = "SELECT COUNT(*) FROM users WHERE name = :name";
$stm = $pdo->prepare($sql1);
$stm->bindValue(':name',$name,PDO::PARAM_STR);
$stm->execute();
$reg1 = $stm->fetch(PDO::FETCH_ASSOC);
$_SESSION['aa'] = $reg1['COUNT(*)'];



if(empty($name)){
    $error = true;
    $_SESSION['err_regname'] = "ユーザー名が入力されていません";
}else if($reg1['COUNT(*)'] === 1){
    $error = true;
    $_SESSION['err_reg'] = "ユーザ名が重複しています";
}else if(empty($pw)){
    $error = true;
    $_SESSION['err_pw'] = "パスワードを入力してください";
}else if($agry !== "agry"){
    $error = true;
    $_SESSION['err_ag'] = "利用規約に同意してください";
}else{
    $sql2 = "INSERT INTO users (name,pass_hash) VALUES(:name,:pw_hash)";
    $stm = $pdo->prepare($sql2);
    $stm->bindValue(':name',$name,PDO::PARAM_STR);
    $stm->bindValue(':pw_hash',$pw_hash,PDO::PARAM_STR);
    $stm->execute();
    $reg2 = $stm->fetch(PDO::FETCH_ASSOC);
    header('Location:loginform.php');
    exit;
}

if($error){
    // $_SESSION['reg_name'] = $name; 
    header('Location:regform.php');
    exit;
}
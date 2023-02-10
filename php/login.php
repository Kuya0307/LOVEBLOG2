<?php
require_once 'db_connect.php';
session_start();
echo "<pre>";
var_dump($_POST);
echo "</pre>";
$error = false;
$name = $_POST['name'];
$name = htmlspecialchars($name,ENT_QUOTES,"UTF-8");
$pw = $_POST['pw'];
$pw = htmlspecialchars($pw,ENT_QUOTES,"UTF-8");
$sql = "SELECT * FROM users WHERE name = :name";
$stm = $pdo->prepare($sql);
$stm->bindValue(':name',$name,PDO::PARAM_STR);
$stm->execute();
$membar = $stm->fetch(PDO::FETCH_ASSOC);

$data = array(
    'name' => $membar['name'],
    'pass_hash' => $membar['pass_hash']
  );
var_dump(password_verify($pw,$data['pass_hash']));
  if(password_verify($pw,$data['pass_hash'])){
    header('Location:top.php');
    exit;
    }else{
      $error = true;
      $_SESSION['err_msg'] = "ユーザー名またはパスワードが間違っています";
    }
    if($error){
      header('Location:loginform.php');
      exit;
    }
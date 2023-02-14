<?php
require_once 'db_connect.php';
session_start();
var_dump($_SESSION['ID']);
var_dump($_POST);
$ID = $_SESSION['ID'];
$title = $_POST['title'];
$content = $_POST['content'];
$title = htmlspecialchars($title,ENT_QUOTES,"UTF-8");
$content = htmlspecialchars($content,ENT_QUOTES,"UTF-8");
$sql  = "UPDATE report SET title = :title, content = :content WHERE id = :id";
$stm = $pdo->prepare($sql);
$stm->bindValue(':title',$title,PDO::PARAM_STR);
$stm->bindValue(':content',$content,PDO::PARAM_STR);
$stm->bindValue(':id',$ID,PDO::PARAM_INT);
$stm->execute();
$upd = $stm->fetch(PDO::FETCH_ASSOC);
header('Location:top.php');
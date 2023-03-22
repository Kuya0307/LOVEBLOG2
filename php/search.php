<?php
require_once 'db_connect.php';
session_start();
$search = $_GET['search'];
var_dump($search);
 $sql = "select ID,title,state_flag,create_at from report where delete_flag = 0 and  user_name = :name
         and title LIKE CONCAT('%',:search, '%')";
          $stm = $pdo->prepare($sql);
 $stm->bindValue(':name',$_SESSION['name'],PDO::PARAM_STR);
 $stm->bindValue(':search',$search,PDO::PARAM_STR);
 $stm->execute();
 $result2 = $stm->fetchAll(PDO::FETCH_ASSOC);
 $_SESSION['result2'] = $result2;
 header('Location:table.php');

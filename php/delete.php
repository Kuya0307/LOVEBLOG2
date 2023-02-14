<?php
     require_once 'db_connect.php';

     $id = $_GET['id'];
     $sql = "delete from report where ID = :id";
     $stm = $pdo->prepare($sql);
     $stm->bindValue(':id',$id,PDO::PARAM_INT);
     $stm->execute();
     header('Location:table.php');
?>
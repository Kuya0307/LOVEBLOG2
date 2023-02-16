<?php
     require_once 'db_connect.php';

     $id = $_GET['id'];
     $sql = "UPDATE report SET state_flag = 1 WHERE ID = :id";
     $stm = $pdo->prepare($sql);
     $stm->bindValue(':id',$id,PDO::PARAM_INT);
     $stm->execute();
     header('Location:table.php');
?>
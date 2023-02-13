<p>飛んだよー</p>
<?php
require_once 'db_connect.php';
session_start();
echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    $title=$_POST['title'];
    $content=$_POST['content'];
    $state_flag=$_POST['flag'];
    $name="おだくう";
    $sql="INSERT INTO report (title,content,state_flag,user_name,delete_flag) VALUES(:title,:content,:state_flag,:user_name,0)";
    $stm=$pdo->prepare($sql);
    $stm->bindValue(':title',$title,PDO::PARAM_STR);
    $stm->bindValue(':content',$content,PDO::PARAM_STR);
    $stm->bindValue(':state_flag',$state_flag,PDO::PARAM_STR);
    $stm->bindValue(':user_name',$name,PDO::PARAM_STR);
    $stm->execute();
    $reg=$stm->fetch(PDO::FETCH_ASSOC);
    header('Location:wia.php');
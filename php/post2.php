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
    $name=$_SESSION['name'];
    $title = htmlspecialchars($title,ENT_QUOTES,"UTF-8");
    $content = htmlspecialchars($content,ENT_QUOTES,"UTF-8");
    $state_flag = htmlspecialchars($state_flag,ENT_QUOTES,"UTF-8");
    $name = htmlspecialchars($name,ENT_QUOTES,"UTF-8");
    $sql="INSERT INTO report (title,content,state_flag,user_name,delete_flag) VALUES(:title,:content,:state_flag,:user_name,0)";
    $stm=$pdo->prepare($sql);
    $stm->bindValue(':title',$title,PDO::PARAM_STR);
    $stm->bindValue(':content',$content,PDO::PARAM_STR);
    $stm->bindValue(':state_flag',$state_flag,PDO::PARAM_STR);
    $stm->bindValue(':user_name',$name,PDO::PARAM_STR);
    $stm->execute();
    $reg=$stm->fetch(PDO::FETCH_ASSOC);
    header('Location:table.php');
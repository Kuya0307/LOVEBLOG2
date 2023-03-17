<?php
session_start();
require_once 'db_connect.php';
if(!empty($_SESSION['name'])){
include '../inc/head.php';
}elseif(empty($_SESSION['name'])){
  include '../inc/headout.php';
}
// render_header("../css/detail.css");
 $ID=$_GET['ID'];
$sql="select * from report where id = :ID";
//前へボタン
$sql1="select * from report where id < :ID and state_flag = 1 and delete_flag = 0 ORDER BY id DESC";
//次へボタン
$sql2="select * from report where id > :ID and state_flag = 1 and delete_flag = 0";
$stm=$pdo->prepare($sql);
$stm->bindValue(':ID',$ID,PDO::PARAM_INT);
$stm->execute();
$deb=$stm->fetch(PDO::FETCH_ASSOC);
$data=array(
    'title' => $deb['title'],
    'content' => $deb['content']
);
//次のページへ飛ぶ
$stm=$pdo->prepare($sql2);
$stm->bindValue(':ID',$ID,PDO::PARAM_INT);
$stm->execute();
$bab=$stm->fetch(PDO::FETCH_ASSOC);
if($bab){
  $data2=array(
    'id' => $bab['id']
);
}
//前のページへ飛ぶ
$stm=$pdo->prepare($sql1);
$stm->bindValue(':ID',$ID,PDO::PARAM_INT);
$stm->execute();
$gab=$stm->fetch(PDO::FETCH_ASSOC);
if($gab){
  $data3=array(
    'id' => $gab['id']
);
}
?>
<html>
  <link rel="stylesheet" href="../css/detail.css">
  <main id="detail">
  <body>
    <div class="oda">
  <br>
  <form action="post2.php" method="post">
<label for="story">タイトル</label>

<input type="text" class="god" name="title"value="<?php echo $data['title'];?>" readonly><br>
<!-- <textarea id="story" name="content"
      rows="30" cols="100" placeholder="投稿内容を入力してください。" readonly> -->
<p class="cont"><?php echo $data['content'];?></p>
<!-- </textarea> -->
<br>
<a href="detail.php?ID=<?php echo $data3['id'];?>">前のページへ</a>
<a href="detail.php?ID=<?php echo $data2['id'];?>">次のページへ</a>
<?php  
if(!empty($_SESSION['name'])){
  $url="table.php";
}else if(empty($_SESSION['name'])){
  $url="index.php";
}?>
<a href=<?php echo $url?>>一覧へ戻る</a>
</div>
</main>
</body>
</html>
<?php
require_once 'db_connect.php';
session_start();
include '../inc/head.php';

$ID = $_GET['ID'];
$_SESSION['ID'] = $ID;
$sql = "select * from report where id = :id";
$stm = $pdo->prepare($sql);
$stm->bindValue(':id',$ID,PDO::PARAM_INT);
$stm->execute();
$upd = $stm->fetch(PDO::FETCH_ASSOC);
$data = array(
    'title' => $upd['title'],
    'content' => $upd['content']
  );
?>
<html>
  <link rel="stylesheet" href="../css/update.css">
  <body>
    <form action="update.php" method="post">
      <input type="text" name="title" class="textbox" value="<?php echo $data['title']; ?>"><br>
      <textarea id="story" name="content" rows="30" cols="100" class="area" placeholder="投稿内容を入力してください。" ><?php echo $data['content']; ?></textarea>
      <button type="reset" class="reset">
      <img src="../img/gomi.png" width="100px" height="100px">
      </button><br>
      <div class="two">
      <button type="submit" class="up"> 編集 </button>
      <button id="btn" class="can">キャンセル</button>
    </div>
  </form>

<script>
  var btn = document.getElementById('btn');

btn.addEventListener('click', function() {
  var result = window.confirm('ボタンをクリック！');
  
  if( result ) {
        //OKを押して遷移させる
        window.location.href = 'php/table.php';
    }else {
        //キャンセルを押してリダイレクトさせる
        window.location.href = '../php/upform.php?ID=<?php echo $ID ?>';
      }
})
</script>

</body>
</html>

<?php
require_once 'db_connect.php';
session_start();

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
  var_dump($data['title']);
  var_dump($data['content']);
?>
<html>
  <br>
  <form action="update.php" method="post">
<label for="story">タイトル</label>
<input type="text"name="title" value="<?php echo $data['title']; ?>"><br>
<textarea id="story" name="content"
          rows="30" cols="100" placeholder="投稿内容を入力してください。" >
<?php echo $data['content']; ?>
</textarea>
<button type="reset">
<img src="../img/gomi.png" width="100px" height="100px">
</button><br>
<button class="favorite styled"
        type="submit"> 編集
</button>
</form>
<button id="btn">キャンセル</button>

<script>
var btn = document.getElementById('btn');

btn.addEventListener('click', function() {
    var result = window.confirm('ボタンをクリック！');
    
    if( result ) {
        //OKを押して遷移させる
        window.location.href = '../php/top.php';
    }else {
        //キャンセルを押してリダイレクトさせる
        window.location.href = 'upform.php?ID=<?php echo $ID ?>';
    }
})
</script>

</html>

<?php
require_once 'db_connect.php'
?>
<html>
  <br>
  <form action="post2.php" method="post">
<label for="story">タイトル</label>
<input type="text"name="title"><br>
<textarea id="story" name="content"
          rows="30" cols="100" placeholder="投稿内容を入力してください。">
</textarea>
<button type="reset">
<img src="../img/gomi.png" width="100px" height="100px">
</button>
<p>投稿
      <input type="radio"checked name="flag"value="1">公開
      <input type="radio" name="flag"value="0">非公開
</p>

    <button class="favorite styled"
        type="submit">  投稿
</button>
</form>
<button id="btn">キャンセル</button>



<script>
var btn = document.getElementById('btn');

btn.addEventListener('click', function() {
    var result = window.confirm('ボタンをクリック！');
    
    if( result ) {
        //OKを押して遷移させる
        window.location.href = '../php/wia.php';
    }else {
        //キャンセルを押してリダイレクトさせる
        window.location.href = '../php/post.php';
    }
})
</script>

</script>
  
</button>

</html>

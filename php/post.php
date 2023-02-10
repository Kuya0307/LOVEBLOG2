<?php
require_once 'db_connect.php'
?>
<html>
  <br>
<label for="story">タイトル</label>
<input type="text"><br>
<textarea id="story" name="story"
          rows="30" cols="100">
投稿内容を入力してください。
</textarea>
<img src="../img/gomi.png">
<p>投稿
      <input type="radio"checked>公開
      <input type="radio">非公開
    </p>
    <button class="favorite styled"
        type="button">
    投稿
</button>
<button class="favorite styled"
        type="button">
    キャンセル
</button>
</html>

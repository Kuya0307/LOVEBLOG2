<?php
include '../inc/head.php';
require_once 'db_connect.php'
render_header("../css/post.css");
?>
<!-- <head>
<link rel="stylesheet" href="../css/post.css">
<title>記事登録</title>
</head> -->
<main id="post">
<body>
  <br>
  <form action="post2.php" method="post">
<input type="text"class="txt" style="width: 80%; height: 50%;" value="タイトル" name = "title"><br>
<textarea id="story" name="content" class="txt2"
          rows="30" cols="100" placeholder="投稿内容を入力してください。">
</textarea>
<button type="reset">
<img src="../img/gomi.png" width="100px" height="100px">
</button>
      <input type="radio"class="botton"checked name="flag"value="1">公開
      <input type="radio" name="flag"value="0">非公開


    <button class="favorite styled"
        type="submit">  投稿
</button>
</form>
<button id="btn">キャンセル</button>
</main>



<script>
var btn = document.getElementById('btn');

btn.addEventListener('click', function() {
    var result = window.confirm('ボタンをクリック！');
    
    if( result ) {
        //OKを押して遷移させる
        window.location.href = '../php/table.php';
    }else {
        //キャンセルを押してリダイレクトさせる
        window.location.href = '../php/post.php';
    }
})
</script>

</script>
  
</button>
</body>

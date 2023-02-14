<?php
    require_once 'db_connect.php';

    $sql = "select ID,title,state_flag from report";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>

<header>
</header>

<body>
<table border="1">
        <tr>
            <th>タイトル</th>
            <th>公開非公開</th>
            <th>編集</th>
            <th>削除</th>
        </tr>

<?php
    foreach($result as $data){
        echo <<<"EOD"
        <tr>
            <td> <a href="detail.php?ID={$data['ID']}">{$data['title']}</a></td>
            <td>
                
            </td>
            <td><a href="update.php?ID={$data['ID']}">編集</a></td>
            <td><button id="btn" data-id="{$data['ID']}">削除</button></td>
        </tr>
        EOD;
    }
    ?>
 </table>

</body>
</html>

<script>
              var btn = document.getElementById('btn');
              btn.addEventListener('click', function() {
                  var result = window.confirm('ボタンをクリック！');
                  console.log(result);
                  if( result ) {
                      //OKを押して遷移させる
                      window.location.href = "../php/delete.php?id="+btn.dataset.id;
                  }else {
                      //キャンセルを押してリダイレクトさせる
                       return false;
                  }
              })
</script>
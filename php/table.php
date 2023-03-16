<?php
    require_once 'db_connect.php';
    include '../inc/head.php';
    render_header("../css/table.css");
    if(!isset($_SESSION)){
        session_start();
      }

    $sql = "select ID,title,state_flag,create_at from report where delete_flag = 0 and  user_name = :name";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':name',$_SESSION['name'],PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <title>Document</title>
</head> -->
<main id="post">
<body>
    <div class="content">
<table>
        <tr>
            <!-- <th>タイトル</th>
            <th>公開非公開</th>
            <th>編集</th>
            <th>削除</th> -->
        </tr>

<?php
  foreach($result as $data){

    if($data['state_flag'] == 1){
        $check = "checked";

    }if($data['state_flag'] == 0){
        $check = "";
    }

    if( $check == "checked"){
        $states = "公開";

    }else{
        $states = "非公開";
    }

    if( $states == "公開"){
        $backcolor = "#ffffff";

    }else{
        $backcolor = "#d3d3d3";
    }
    echo <<<"EOD"
        <tr bgcolor={$backcolor}>
            <td> <a href="detail.php?ID={$data['ID']}"style="text-decoration:none;">{$data['title']}</a></td>
            <td>
            <label for="switch{$data['ID']}" class="switch_label">
                <div class="switch">
                    <input type="checkbox" class="up_state" id="switch{$data['ID']}" data-id="{$data['ID']}" {$check} />
                    <div class="circle"></div>
                    <div class="base"></div>
                </div>  
                <span id="title{$data['ID']}"> {$states} </span>
            </label> 
            </td>
            <td><a href="upform.php?ID={$data['ID']}"><img src="../img/ppen.png" width="40px" height="29px"></a></td>
            <td><button class="del_btn" data-id="{$data['ID']}"><img src="../img/gomi.png" width="30px" height="30px"></button></td>
            <td>{$data['create_at']}</td>
        </tr>
        EOD;
    }
    ?>
        <a href="post.php" style="text-decoration:none;" class="btn_item">投稿</a>
        <a style="position:relative;left: 473px;" class="column">編集</a>
        <a style="position:relative;left: 666px;" class="column">削除</a>
        <a style="position:relative;left: 845px;" class="column">投稿日時</a>

</table>
</main>

<script type="text/javascript">
    // ダイアログ表示
    //var btn = document.getElementById('btn');

    //このHTMLに存在するすべてのdel_btnというクラスのついたボタンを取得
    let btn = document.getElementsByClassName('del_btn')
    //すべてのボタンにaddEventListenerを設定
    for(let i = 0; i < btn.length; i++){
        btn[i].addEventListener('click', function() {
        var result = window.confirm('ボタンをクリック！');
        console.log(result);
        if( result ) {
        //OKを押して遷移させる
            window.location.href = "../php/delete.php?id="+btn[i].dataset.id;
            // console.log("../php/delete.php?id="+btn[i].dataset.id)
        }else {
        //キャンセルを押してリダイレクトさせる
            return false;
        }
    })
    }
    

    // トグルボタン表示切替
    let checkbox = document.getElementsByClassName('up_state')
    let id
    
    for(let i= 0; i < checkbox.length; i++){
        checkbox[i].addEventListener('click', () => {
            let id = checkbox[i].dataset.id
            let title = document.getElementById('title'+id);
            title.textContent = checkbox[i].checked ? '公開' : '非公開';
            if (checkbox[i].checked) {
                window.location.href = "../php/state.php?id="+id;
            } else {
                window.location.href = "../php/state2.php?id="+id;
            }
        });
    }
    

</script>
</div>
</body>
</html>
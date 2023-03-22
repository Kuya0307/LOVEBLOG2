<?php
    require_once 'db_connect.php';
    include '../inc/head.php';
    ?>
    <form action="search.php" method="get">
<input type="search" name="search" placeholder="検索キーワードを入力してください">
<input type="submit" name="submit" value="検索">
</form>
<form action = "tmp.php" method = "post">
   <input type ="submit" value="一覧へ戻る">
   </form>
<?php
    if(!isset($_SESSION)){
        session_start();
      }
    $sql = "select ID,title,state_flag,create_at from report where delete_flag = 0 and  user_name = :name";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':name',$_SESSION['name'],PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php
    if(empty( $_SESSION['result2'])){
        $nullresult='<p>該当する記事が見つかりませんでした</p>';
    }elseif(!empty( $_SESSION['result2'])){
        $nullresult='<a></a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <title>Document</title>
</head>
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
if(isset( $_SESSION['result2'])){
  foreach( $_SESSION['result2'] as $data){
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
        $backcolor = "#FFFFFF";
    }else{
        $backcolor = "#D3D3D3";
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
            <td>
            <dialog>
                <p>この記事を本当に削除しますか？</p>
                <a id="del_tag" href="javascript:void(0);" style="text-decoration:none;">削除</a>
                <a href="table.php" style="text-decoration:none;">戻る</a>
            </dialog>
            <button class="del_btn" data-id="{$data['ID']}" value="{$data['ID']}"><img src="../img/gomi.png" width="30px" height="30px"></button>
            </td>
            <td>{$data['create_at']}</td>
        </tr>
        EOD;
    }
    ?>
        <a style="position:relative;left: 473px;" class="column"></a>
        <a style="position:relative;left: 666px;" class="column"></a>
        <a style="position:relative;left: 845px;" class="column"></a>
        <?php echo $nullresult ?>
</table>
</main>
<script type="text/javascript">
    // ダイアログ表示
    //var btn = document.getElementById('btn');
    //このHTMLに存在するすべてのdel_btnというクラスのついたボタンを取得
    let btn = document.getElementsByClassName('del_btn');
    var dialog = document.querySelector('dialog');
    var tag = document.getElementById('del_tag');
    //すべてのボタンにaddEventListenerを設定
    for(let i = 0; i < btn.length; i++){
        btn[i].addEventListener('click', function() {
            dialog.showModal();
            tag.addEventListener("click",function(){
                window.location.href = "../php/delete.php?id="+btn[i].dataset.id;
        },false);
    }, false);
    
       
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
    <button onclick="runcode()">戻る
    </button>
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
    $backcolor = "#FFFFFF";
}else{
    $backcolor = "#D3D3D3";
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
        <td>
            <dialog>
                <p>この記事を本当に削除しますか？</p>
                <a id="del_tag" href="javascript:void(0);" style="text-decoration:none;">削除</a>
                <a href="table.php" style="text-decoration:none;">戻る</a>
            </dialog>
            <button class="del_btn" data-id="{$data['ID']}" value="{$data['ID']}"><img src="../img/gomi.png" width="30px" height="30px"></button>
            </td>
        <td>{$data['create_at']}</td>
    </tr>
    EOD;
}
?>
    <a href="post.php" style="text-decoration:none;" class="btn_item">投稿</a>
    <a style="position:relative;left: 473px;" class="column">編集</a>
    <a style="position:relative;left: 666px;" class="column">削除</a>
    <a style="position:relative;left: 845px;" class="column">投稿日時</a>
    <?php echo $nullresult ?>
</table>
</main>
<script type="text/javascript">
// ダイアログ表示
//var btn = document.getElementById('btn');
//このHTMLに存在するすべてのdel_btnというクラスのついたボタンを取得
let btn = document.getElementsByClassName('del_btn');
    var dialog = document.querySelector('dialog');
    var tag = document.getElementById('del_tag');
//すべてのボタンにaddEventListenerを設定
for(let i = 0; i < btn.length; i++){
    btn[i].addEventListener('click', function() {
            dialog.showModal();
            tag.addEventListener("click",function(){
                window.location.href = "../php/delete.php?id="+btn[i].dataset.id;
        },false);
    }, false);
    
       
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
<?php unset($_SESSION['result2']);
}else{
?>
</script>
</div>
</body>
</html>
    <?php
    if(empty($result)){
        $nullresult='<p>閲覧できる記事はありません</p>';
    }elseif(!empty($result)){
        $nullresult='<a></a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <title>Document</title>
</head>
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
        $backcolor = "#FFFFFF";
    }else{
        $backcolor = "#D3D3D3";
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
            <td>
            <dialog>
                <p>この記事を本当に削除しますか？</p>
                <a id="del_tag" href="javascript:void(0);" style="text-decoration:none;">削除</a>
                <a href="table.php" style="text-decoration:none;">戻る</a>
            </dialog>
            <button class="del_btn" data-id="{$data['ID']}" value="{$data['ID']}"><img src="../img/gomi.png" width="30px" height="30px"></button>
            </td>
            <td>{$data['create_at']}</td>
        </tr>
        EOD;
    }
    ?>
        <a href="post.php" style="text-decoration:none;" class="btn_item">投稿</a>
        <a style="position:relative;left: 473px;" class="column">編集</a>
        <a style="position:relative;left: 666px;" class="column">削除</a>
        <a style="position:relative;left: 845px;" class="column">投稿日時</a>
        <?php echo $nullresult ?>
</table>
</main>
<script type="text/javascript">
    // ダイアログ表示
    //var btn = document.getElementById('btn');
    //このHTMLに存在するすべてのdel_btnというクラスのついたボタンを取得
    let btn = document.getElementsByClassName('del_btn');
    var dialog = document.querySelector('dialog');
    var tag = document.getElementById('del_tag');
    //すべてのボタンにaddEventListenerを設定
    for(let i = 0; i < btn.length; i++){
        btn[i].addEventListener('click', function() {
            dialog.showModal();
            tag.addEventListener("click",function(){
                window.location.href = "../php/delete.php?id="+btn[i].dataset.id;
        },false);
    }, false);
    
       
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
<?php
}
?>
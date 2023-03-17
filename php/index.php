<?php
    require_once 'db_connect.php';
    include '../inc/headout.php';
    render_header("../css/index.css");
    $sql = "select ID,title,user_name,create_at from report where state_flag=1 and delete_flag=0";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <link rel="stylesheet" href="../css/index.css">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> -->

<body>
    <div class="content">
<table>
        <tr>
            <!-- <th>タイトル</th>
            <th>名前</th>
            <th>投稿日時</th> -->
        </tr>

<?php
    foreach($result as $data){
        echo <<<"EOD"
        <tr bgcolor=#ffffff>
            <td> <a href="detail.php?ID={$data['ID']}" style="text-decoration:none;" >{$data['title']}</a></td>
            <td>{$data['user_name']}</td>
            <td>{$data['create_at']}</td>
        </tr>
        EOD;
    }
    ?>
 </table>
</div>
</body>
</html>
<?php
    require_once 'db_connect.php';

    $sql = "select ID,title,user_name from report";
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
            <th>ユーザーネーム</th>
        </tr>

<?php
    foreach($result as $data){
        echo <<<"EOD"
        <tr>
            <td> <a href="detail.php?ID={$data['ID']}">{$data['title']}</a></td>
            <td>{$data['user_name']}</a></td>
        </tr>
        EOD;
    }
    ?>
 </table>

</body>
</html>
<?php
    //データベースに接続する準備

    //ユーザー名
    $user= "root";
    //パスワード
    $pass = "";
    //データベース名
    $database = "loveblog";
    //サーバー名
    $sever = "localhost:3308";

    //DSN文字列の生成
    $dsn = "mysql:host={$sever};dbname={$database};charset=utf8";

    //mysqlデータベースへの接続
    try{
        //PDOクラスのインスタンスを作成してDBに接続する
        $pdo = new PDO($dsn,$user,$pass);
        //プリペアドステートメントのエミュレーションを無効化
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //例外がスルーされるようにする
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "";
    }catch(exception $e){
        echo "DB接続エラー:";
        echo $e->getmessage();
        exit();
    }
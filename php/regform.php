<?php
require_once 'db_connect.php';
session_start();
include '../inc/headlog.php';
// if(isset($_SESSION['err_reg'])){
//     echo $_SESSION['err_reg'];
//     unset($_SESSION['err_reg']);
// }
render_header("../css/reg.css");
?>
<body>
    <main>
        <div class="aa">
    <div class="box">
        <h1 class="regtext">アカウント作成</h1>
        <?php if(isset($_SESSION['err_reg'])){ ?>
        <div class="box-005">
            <br>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
            <path fill="#f06060"
                  d="M12,1.5c.7,0,1.3,.4,1.6,.9l10.1,17.3c.3,.6,.3,1.3,0,1.9s-1,.9-1.6,.9H1.9c-.7,0-1.3-.4-1.6-.9s-.3-1.3,0-1.9L10.4,2.4c.3-.6,1-.9,1.6-.9Zm0,6c-.6,0-1.1,.5-1.1,1.1v5.3c0,.6,.5,1.1,1.1,1.1s1.1-.5,1.1-1.1v-5.3c0-.6-.5-1.1-1.1-1.1Zm1.5,10.5c0-.8-.7-1.5-1.5-1.5s-1.5,.7-1.5,1.5,.7,1.5,1.5,1.5,1.5-.7,1.5-1.5Z"/>
                </svg>
        アカウント作成失敗
    </div>
    <p class="err"><?php
            echo $_SESSION['err_reg']; 
            unset($_SESSION['err_reg']);
        ?>
    </p>
    </div>
    <?php } ?>
        <form action="reg.php" method="post">
            <p class="name">name</p> 
            <input type="text" name="name" class="namebox">
            <p class="pw">パスワード</p>
            <input type="pw" name="pw" class="pwbox">
            <p><a href="rules.php">利用規約</a>と<a href="policy.php">プライバシーポリシー</a></p><p>に同意しますか？</p>
            <input type="checkbox" name="agry" id="agry" value="agry">同意します
            <div class="reg">
                <input type="submit" class="regbtn" value="作成">
            </div>    
        </form>
    </div>
    </div>
    </main>
</body>
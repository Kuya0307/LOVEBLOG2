<?php
require_once 'db_connect.php';
session_start();
include '../inc/headlog.php';
render_header("../css/policy.css");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1 class="policy">プライバシー規約</h1>
    <p>Amazon.co.jp では、個人情報を細心の注意を払って慎重に取り扱い、利用および共有させていただいています。
        本プライバシー規約（以下「本規約」といいます。）は、本規約を参照するAmazonのウェブサイト、
        端末、製品、サービス、オンラインストア及び実店舗（以下「Amazonサービス」といいます。）を通じたAmazon（Amazon.com, Inc.を含め、Amazon.com Services LLC及びその国内外の関係会社をいいます。）
        による個人情報の取得及び取扱いに関する方針を説明するものです。Amazonサービスをご利用いただいた場合、
        本規約に同意していただいたものとみなされます。</p>
        <p class="inyo">引用:amazon</p>
        <form action="regform.php">
            <button type="submit" class="btn">了解</button>
        </form>
</body>
</html>
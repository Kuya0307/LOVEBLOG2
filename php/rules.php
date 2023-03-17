<?php
require_once 'db_connect.php';
session_start();
include '../inc/headlog.php';
render_header("../css/rules.css");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1 class="kiyaku">利用規約</h1>
    <p>Amazon.co.jp へようこそ.
        米国の法人であるAmazon.com Services LLC および/またはその関連会社（以下総称して「アマゾン」といいます）は、
        以下の規約に基づいて、お客様にサービスを提供いたします。お客様がAmazon.co.jp をご利用になる場合、
        Amazon.co.jp で商品を購入される場合、アマゾンのサイト機能やサービスやモバイルアプリをご利用になる場合、
        またはこれらのサービスに伴ってアマゾンにより提供されるソフトウエアをご利用になる場合、
        アマゾンは本利用規約に基づいてお客様にサービス・商品または機能を提供します（以下総称して「アマゾンサービス」といいます）。
        アマゾンサービスを利用することにより、お客様は本利用規約に同意することになりますので、以下を注意してお読みください。
        アマゾンサービスは多岐にわたるため、追加の規定や条件が適用されることがあります。
        例えば、お客様がプロフィール機能、Amazonギフト券、Amazonビデオ、アマゾン端末またはアマゾンのモバイル向けアプリ等のアマゾンサービスをご利用になる場合、
        当該アマゾンサービスのガイドラインやサービス規約（総称して「サービス規約」といいます）が適用されます。
        本利用規約とサービス規約に齟齬がある場合には、サービス規約の規定が優先するものとします。</p>
        <p class="inyo">引用:amazon</p>
        <form action="regform.php">
            <button type="submit" class="btn">了解</button>
        </form>
</body>
</html>
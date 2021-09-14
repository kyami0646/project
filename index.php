<?php
session_start();
$username = $_SESSION['username'];
if (isset($_SESSION['id'])) {//ログインしているとき
    $msg = 'こんにちは' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん!';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a href="login.php">ログイン</a>';
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300&display=swap" rel="stylesheet">

    <title>国旗タイピング</title>
</head>
<body>
    <header class="page_header">
        <div class="header_logo">
            <a href="login.php">国旗DEタイピング</a>
        </div>
        <nav>
            <ul class="main_nav">
                <p class = "logout"><?php echo $link; ?></p>
            </ul>
        </nav>
    </header>

    <main>
        <h1><?php echo $msg; ?></h1>
        <p>こちらからゲーム画面に飛べます</p><br>
        <a href="game.php">国旗DEタイピング</a>
    </main>
    

</body>
</html>
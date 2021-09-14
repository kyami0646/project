<?php
require("dbc.php");
session_start();
if (!empty($_POST['check'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $member = $stmt->fetch();

    if (password_verify($_POST['password'], $member['password'])) {
        $_SESSION['id'] = $member['id'];
        $_SESSION['username'] = $member['username'];
        $_SESSION['email'] = $member['email'];
    } else {
        $error['email'] = 'blank';
    }

    if (!isset($error)) {
        header('location: index.php');
        exit();
    }
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
                <li><a href="register.php">新規登録</a></li>
                <li><a href="login.php">ログイン</a></li>
            </ul>
        </nav>
    </header>

    <main class="login_main">
    <h1>ログイン</h1>
    <form action="" method="POST" id="form_sec">
        <input type="hidden" name="check" value="checked" autocomplete="off">
        <label class = "username">ユーザーネーム</label>
            <input type="text" name="username" id="username" autocomplete="off"><br>
        <label class = "email">メールアドレス</label>
            <input type="email" name="email" id="email" autocomplete="off"><br>

        <label class="password">パスワード</label>
            <input type="text" name="password" id="password" autocomplete="off"><br>

        <?php if(!empty($error["email"]) && $error['email'] === "blank"): ?>
            <p>メールアドレスもしくはパスワードが間違っています</p>
        <?php endif ?>    

        <input type="submit" value = "ログイン">
    </form>
    </main>
    
    <?php require_once('dbc.php') ?>

</body>
</html>
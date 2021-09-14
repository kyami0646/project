<?php
require("dbc.php");
session_start();

if(!empty($_POST)) {
    if ($_POST['username'] ==='') {
        $error['username'] = "blank";
    }
    if ($_POST['email'] ==='') {
        $error['email'] = "blank";
    }
    if ($_POST['password'] === "") {
        $error['password'] = "blank";
    } 
    if (!isset($error)) {
        $users = $dbh->prepare("SELECT COUNT(*) as cnt FROM users WHERE username=?");
        $users->execute(array(
            $_POST["email"]
        ));
        $record = $users->fetch();
        if ($record["cnt"] > 0) {
            $error["email"] = "duplicate";
        }
    }

    if (!isset($error)) {
        $_SESSION["join"] = $_POST;
        header('location: check.php');
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

    <main class="register_main">
            <h1 class = "sentence">新規登録</h1>
            <form action="" method="POST" id="form_sec">
            <label for="username">ユーザーネーム</label>
            <input type="text" name="username" id = "username" autocomplete="off"><br>
            <?php if(!empty($error["username"]) && $error['username'] === "blank"): ?>
                <p class="error">ユーザーネームを入力してください</p>
            <?php endif ?>    

            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" autocomplete="off"><br>
            <?php if(!empty($error["email"]) && $error['email'] === "blank"): ?>
                <p class="error">メールアドレスを入力してください</p>
            <?php elseif(!empty($error["email"]) && $error['email'] === "duplicate"): ?>
                <p class="error">このメールアドレスはすでに登録されています</p>   
            <?php endif ?>

            <label for="password">パスワード</label>
            <input type="text" name="password" id="password" autocomplete="off"><br>
            <?php if(!empty($error["password"]) && $error["password"] === 'blank'): ?>
                <p class="error">パスワードを入力してください</p>
            <?php endif ?>    
            <button type="submit" class="btn">登録する</button>
            </form>
    </main>
    

</body>
</html>
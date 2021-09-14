<?php 
require("dbc.php");
session_start();

if (!isset($_SESSION['join'])) {
    header('Location: register.php');
    exit();
}

if (!empty($_POST['check'])) {
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);

    $statement = $dbh->prepare("INSERT INTO users SET username=?, email=?, password=?");
    $statement->execute(array(
        $_SESSION['join']['username'],
        $_SESSION['join']['email'],
        $hash
    ));

    
    header('Location: thank.php');
    exit();

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

    <title>会員登録完了</title>
</head>
<body>
<header class="page_header">
        <div class="header_logo">
            <a href="login.html">国旗DEタイピング</a>
        </div>
        <nav>
            <ul class="main_nav">
                <li><a href="register.php">新規登録</a></li>
                <li><a href="login.php">ログイン</a></li>
            </ul>
        </nav>
</header>
    <form action="" method="POST">
        <input type="hidden" name="check" value="checked">
        <h1>入力情報の確認</h1>
        <?php if(!empty($error) && $error === "error"): ?>
            <p class = "error">会員登録に失敗しました</p>
        <?php endif ?>  
        <p><?php echo $_SESSION["join"]["username"] ?></p>
        <p><?php echo $_SESSION["join"]["email"] ?></p>
        <p><?php echo $_SESSION["join"]["password"] ?></p>
        <a href="register.php" class="btn">変更する</a>
        <button type="submit" class = "btn">登録する</button>
    </form>


</body>
</html>
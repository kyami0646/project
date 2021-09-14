<?php

$dsn = 'mysql:host=localhost;dbname=game_app;charset=utf8';
$user = 'game_user';
$pass = 'Rk06464927';
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "データベース接続エラー:".$e->getMessage();
}
?>
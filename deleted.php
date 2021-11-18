<?php
require_once 'private/bootstrap.php';
//データベース
require_once 'private/database.php';
//セッション
session_start();

//トークンとIDを取得
$token = $_POST['token'];
$id = $_SESSION['id'];

//バリデーション
if($token != $_SESSION['token']){
    unset($_SESSION['token']);
     //不正なアクセスの表示
    $_SESSION['status'] = 'invalid';
    redirect('/index.php');
}

//データベースから消去
// if(!is_numeric($id)){
//       unset($_SESSION['token']);
//     redirect('/index.php');
// }
$statement = $dbh->prepare('DELETE FROM `articles` WHERE id = :id');
$statement->execute([
    'id' => $id,
]);

        
/* ------------------------------
 * セッション内のデータを削除する
 * ------------------------------ */
unset($_SESSION['token']);
unset($_SESSION['id']);


//消去完了表示
$_SESSION['status'] = 'deleted';
?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>削除成功</title>
</head>
<body>
    <header>
        <h1>削除成功</h1>
    </header>
    <main>
        <a href="index.php">戻る</a>
    </main>
    <footer>
        <hr>
        <div>(　・ω・)ノ</div>
    </footer>
</body>
</html>

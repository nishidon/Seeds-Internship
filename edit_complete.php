<?php
require_once 'private/bootstrap.php';
//データベース
require_once 'private/database.php';
//セッション
session_start();
/* ------------------------------
 * 送られてきた値を取得する
 * ------------------------------ */
$token = $_POST['token'];
$name = $_SESSION['name'];
$content = $_SESSION['content'];

/* --------------------------------------------------
 * 送られてきたトークンのバリデーション
 *
 * セッションに保存されているトークンと比較し、
 * 一致していなかった場合はトップ画面にリダイレクトする
 * -------------------------------------------------- */
 if($token != $_SESSION['token']) {
    unset($_SESSION['token']);
     //不正なアクセス表示
    $_SESSION['status'] = 'invalid';
    redirect('/index.php');
}
//  if(empty($name) || empty($content)){
//      $_SESSION['status'] = 'blank';
//      redirect('/editing.php');
//  }
 
/* ----------------------------------------
 * セッション内に保存したIDを取得する
 * ---------------------------------------- */
$id = $_SESSION['id'];

/* --------------------
 * データの更新処理
 * -------------------- */
$statement = $dbh->prepare('UPDATE `articles` SET name = :name, content = :content WHERE id = :id');
$statement->execute([
    'id' => $id,
    'name' => $name,
    'content' => $content,
    ]);
/* ------------------------------
 * セッション内のデータを削除する
 * ------------------------------ */
unset($_SESSION['token']);
unset($_SESSION['id']);

//編集完了セッション
$_SESSION['status'] = 'edited';

?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集成功</title>
</head>
<body>
    <header>
        <h1>編集成功</h1>
    </header>
    <main>
        <a href="index.php">戻る</a>
    </main>
    <footer>
        <hr>
        <div>＿d(・ω・　)</div>
    </footer>
</body>
</html>

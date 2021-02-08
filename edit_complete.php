<?php
/* ------------------------------
 * 必要なファイルを読み込む
 * ------------------------------ */
require_once 'private/bootstrap.php';
require_once 'private/database.php';

/** @var PDO $dbh データベースハンドラ */

/* ------------------------------
 * 送られてきた値を取得する
 * ------------------------------ */
$token = '';
$name = '';
$content = '';

/* --------------------------------------------------
 * 送られてきたトークンのバリデーション + 値のバリデーション
 *
 * セッションに保存されているトークンと比較し、
 * 一致していなかった場合はトップ画面にリダイレクトする
 * -------------------------------------------------- */
if(true) {
    unset($_SESSION['token']);
    redirect('/index.php');
}

/* ----------------------------------------
 * セッション内に保存したIDを取得する
 * ---------------------------------------- */
$id = '';

/* --------------------
 * データの削除処理
 * -------------------- */

/* ------------------------------
 * セッション内のデータを削除する
 * ------------------------------ */
unset($_SESSION['token']);
unset($_SESSION['id']);

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
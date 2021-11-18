<?php
/* ------------------------------
 * 必要なファイルを読み込む
 * ------------------------------ */
require_once 'private/bootstrap.php';
require_once 'private/database.php';

/** @var PDO $dbh データベースハンドラ */
session_start();
/* ------------------------------
 * 送られてきた値を取得する
 * セッションにも保存しておく
 * ------------------------------ */
$id = $_POST['id'];
$_SESSION['id'] = $_POST['id'];

/* --------------------------------------------------
 * 値のバリデーションを行う
 *
 * 1.値が入力されているか
 * 2.データベースに対象IDのレコードが存在するか
 * -------------------------------------------------- */
//データベースから対象IDのレコードを取得
    $statement = $dbh->prepare('SELECT * FROM `articles` WHERE id = :id');
    $statement->execute([
        'id' => $id,
    ]);
    $validation = $statement->fetch(); //fetchAllは２次元連想配列　fetchは一次。取るデータが１つならfetch使う

 
 if(empty($validation)){
    $_SESSION['status'] = 'NoRecord';
    redirect('/index.php');
}
        

/* --------------------
 * 削除する投稿のデータ
 * -------------------- */
$name = $validation['name'];
$content = $validation['content'];

/* ----------------------------------------
 * 確認画面と削除画面で利用するトークンを発行する
 * 今回は時刻をトークンとする
 * ---------------------------------------- */
$token = strval(time());
$_SESSION['token'] = $token;
?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>削除確認</title>
</head>
<body>
    <header>
        <h1>確認</h1>
    </header>
    <main>
        <div>下記の内容を削除しますがよろしいですか?</div>
        <table>
            <tbody>
            <tr><th>名前</th><td><?= nl2br(htmlspecialchars($name)) ?></td></tr>
            <tr><th>投稿内容</th><td><?= nl2br(htmlspecialchars($content)) ?></td></tr>
            </tbody>
        </table>
        <form action="deleted.php" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <button type="submit">削除</button>
        </form>
    </main>
    <footer>
        <hr>
        <div>(　・ω・)ノ⌒■</div>
    </footer>
</body>
</html>

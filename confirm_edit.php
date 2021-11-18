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
$token = $_POST['token'];
$name = $_POST['name'];
$content = $_POST['content'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['content'] = $_POST['content'];

//バリデーション
 if($token != $_SESSION['token']) {
    unset($_SESSION['token']);
     //不正なアクセスの表示
    $_SESSION['status'] = 'invalid';
    redirect('/index.php');
}
 if(empty($name) & empty($content)){
     $_SESSION['status'] = 'blank';
     redirect('/editing.php');
 }elseif(empty($name)){
     //もし名前が空欄なら、投稿内容だけ保存
     $_SESSION['Cedit'] = $content;
     $_SESSION['status'] = 'Nblank';
     redirect('/editing.php');
 }elseif(empty($content)){
     //もしコメントが空欄なら、名前だけ保存
     $_SESSION['Nedit'] = $name;
     $_SESSION['status'] = 'Cblank';
     redirect('/editing.php');
 }
 
 
?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集確認</title>
</head>
<body>
    <header>
        <h1>編集確認</h1>
    </header>
    <main>
        <div>下記の内容に編集しますがよろしいですか?</div>
        <table>
            <tbody>
            <tr><th>名前</th><td><?= nl2br(htmlspecialchars($name)) ?></td></tr>
            <tr><th>投稿内容</th><td><?= nl2br(htmlspecialchars($content)) ?></td></tr>
            </tbody>
        </table>
        <form action="edit_complete.php" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <button type="submit">確定</button>
        </form>
    </main>
    <footer>
        <hr>
        <div>＿d(・ω・　)</div>
    </footer>
</body>
</html>
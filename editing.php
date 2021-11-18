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
 
 //不正入力表示
 if($_SESSION['status'] == 'blank' || $_SESSION['status'] == 'Nblank' || $_SESSION['status'] == 'Cblank'){
     $id = $_SESSION['id'];
     $status = '全ての欄に入力してください';
 }else{
     $id = $_POST['id'];
     $status = '';
     //セッションにidを保存
     $_SESSION['id'] = $id;
 }      

/* --------------------------------------------------
 * 値のバリデーションを行う
 *
 * 1.値が入力されているか
 * 2.データベースに対象IDのレコードが存在するか
 * -------------------------------------------------- */
// 1.値が入力されているか
if(empty($id)) {
    redirect('/index.php');
}

// 2.データベースに対象IDのレコードが存在するか
//データベースから対象IDのレコードを取得
    $statement = $dbh->prepare('SELECT * FROM `articles` WHERE id = :id');
    $statement->execute([
        'id' => $id,
    ]);
    $validation = $statement->fetch(); //fetchAllは２次元連想配列　fetchは一次。取るデータが１つならfetch使う

//バリデーション
if(empty($validation)) {
    $_SESSION['status'] = 'NoRecord';
    redirect('/index.php');
}

/* --------------------
 * 編集する投稿のデータ
 * -------------------- */
 if($_SESSION['status'] == 'Nblank'){
     //もし名前だけ空欄なら
     $content = $_SESSION['Cedit'];
     $name = $validation['name'];
 }elseif($_SESSION['status'] == 'Cblank'){
     //内容だけ空欄なら
     $content = $validation['content'];
     $name = $_SESSION['name'];
 }else{
     //どっちも空欄なら
    $name = $validation['name'];
    $content = $validation['content'];
 }

// $name = $validation[0]['name'];
// $content = $validation[0]['content'];
 unset($_SESSION['blank']);


/* ----------------------------------------
 * 編集画面と編集完了画面で利用するトークンを発行する
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
    <title>投稿編集</title>
    <style>
        textarea {
            resize: vertical;
        }
        textarea, input[type=text] {
            border: solid 1px gray;
            padding: 4px;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>投稿編集</h1>
    </header>
    <main>
        <h1><?= $status ?></h1>
        <form action="confirm_edit.php" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <table>
                <tbody>
                <tr>
                    <th><label for="name">名前</label></th>
                    <td><input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" ></td>
                </tr>
                <tr>
                    <th><label for="content">投稿内容</label></th>
                    <td><textarea name="content" id="content" rows="4" ><?= htmlspecialchars($content) ?></textarea></td>
                </tr>
                </tbody>
            </table>
            <button type="submit">編集</button>
        </form>
    </main>
    <footer>
        <hr>
        <div>＿φ(・ω・　)</div>
    </footer>
</body>
</html>

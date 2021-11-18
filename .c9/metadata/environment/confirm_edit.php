{"changed":true,"filter":false,"title":"confirm_edit.php","tooltip":"/confirm_edit.php","value":"<?php\n/* ------------------------------\n * 必要なファイルを読み込む\n * ------------------------------ */\nrequire_once 'private/bootstrap.php';\nrequire_once 'private/database.php';\n\n/** @var PDO $dbh データベースハンドラ */\nsession_start();\n/* ------------------------------\n * 送られてきた値を取得する\n * セッションにも保存しておく\n * ------------------------------ */\n$token = $_POST['token'];\n$name = $_POST['name'];\n$content = $_POST['content'];\n$_SESSION['name'] = $_POST['name'];\n$_SESSION['content'] = $_POST['content'];\n\n//バリデーション\n if($token != $_SESSION['token']) {\n    unset($_SESSION['token']);\n     //不正なアクセスの表示\n    $_SESSION['status'] = 'invalid';\n    redirect('/index.php');\n}\n if(empty($name) & empty($content)){\n     $_SESSION['status'] = 'blank';\n     redirect('/editing.php');\n }elseif(empty($name)){\n     //もし名前が空欄なら、投稿内容だけ保存\n     $_SESSION['Cedit'] = $content;\n     $_SESSION['status'] = 'Nblank';\n     redirect('/editing.php');\n }elseif(empty($content)){\n     //もしコメントが空欄なら、名前だけ保存\n     $_SESSION['Nedit'] = $name;\n     $_SESSION['status'] = 'Cblank';\n     redirect('/editing.php');\n }\n \n \n \n?>\n\n<!-- 描画するHTML -->\n<!doctype html>\n<html lang=\"ja\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">\n    <title>編集確認</title>\n</head>\n<body>\n    <header>\n        <h1>編集確認</h1>\n    </header>\n    <main>\n        <div>下記の内容に編集しますがよろしいですか?</div>\n        <table>\n            <tbody>\n            <tr><th>名前</th><td><?= nl2br(htmlspecialchars($name)) ?></td></tr>\n            <tr><th>投稿内容</th><td><?= nl2br(htmlspecialchars($content)) ?></td></tr>\n            </tbody>\n        </table>\n        <form action=\"edit_complete.php\" method=\"post\">\n            <input type=\"hidden\" name=\"token\" value=\"<?= $token ?>\">\n            <button type=\"submit\">確定</button>\n        </form>\n    </main>\n    <footer>\n        <hr>\n        <div>＿d(・ω・　)</div>\n    </footer>\n</body>\n</html>","undoManager":{"mark":99,"position":100,"stack":[[{"start":{"row":21,"column":2},"end":{"row":21,"column":9},"action":"insert","lines":["バリデーション"],"id":36,"ignore":true}],[{"start":{"row":17,"column":20},"end":{"row":17,"column":24},"action":"remove","lines":["POST"],"id":37,"ignore":true},{"start":{"row":17,"column":20},"end":{"row":17,"column":21},"action":"insert","lines":["S"]}],[{"start":{"row":17,"column":20},"end":{"row":17,"column":21},"action":"remove","lines":["S"],"id":38,"ignore":true},{"start":{"row":17,"column":20},"end":{"row":17,"column":23},"action":"insert","lines":["SES"]}],[{"start":{"row":17,"column":20},"end":{"row":17,"column":23},"action":"remove","lines":["SES"],"id":39,"ignore":true},{"start":{"row":17,"column":20},"end":{"row":17,"column":27},"action":"insert","lines":["SESSION"]}],[{"start":{"row":16,"column":29},"end":{"row":17,"column":34},"action":"remove","lines":["","$_SESSION['id'] = $_SESSION['id'];"],"id":40,"ignore":true}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":12},"action":"remove","lines":["POST"],"id":41,"ignore":true},{"start":{"row":14,"column":8},"end":{"row":14,"column":9},"action":"insert","lines":["S"]}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":9},"action":"remove","lines":["S"],"id":42,"ignore":true},{"start":{"row":14,"column":8},"end":{"row":14,"column":10},"action":"insert","lines":["SE"]}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":10},"action":"remove","lines":["SE"],"id":43,"ignore":true},{"start":{"row":14,"column":8},"end":{"row":14,"column":13},"action":"insert","lines":["SESSI"]}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":13},"action":"remove","lines":["SESSI"],"id":44,"ignore":true},{"start":{"row":14,"column":8},"end":{"row":14,"column":15},"action":"insert","lines":["SESSION"]}],[{"start":{"row":13,"column":25},"end":{"row":14,"column":22},"action":"remove","lines":["","$id = $_SESSION['id'];"],"id":45,"ignore":true}],[{"start":{"row":29,"column":2},"end":{"row":30,"column":0},"action":"insert","lines":["",""],"id":46},{"start":{"row":30,"column":0},"end":{"row":30,"column":1},"action":"insert","lines":[" "]},{"start":{"row":30,"column":1},"end":{"row":31,"column":0},"action":"insert","lines":["",""]},{"start":{"row":31,"column":0},"end":{"row":31,"column":1},"action":"insert","lines":[" "]}],[{"start":{"row":26,"column":16},"end":{"row":26,"column":35},"action":"remove","lines":[" || empty($content)"],"id":47}],[{"start":{"row":29,"column":2},"end":{"row":29,"column":3},"action":"insert","lines":["¥"],"id":48}],[{"start":{"row":29,"column":2},"end":{"row":29,"column":3},"action":"remove","lines":["¥"],"id":49}],[{"start":{"row":29,"column":2},"end":{"row":30,"column":0},"action":"insert","lines":["",""],"id":50},{"start":{"row":30,"column":0},"end":{"row":30,"column":1},"action":"insert","lines":[" "]}],[{"start":{"row":30,"column":0},"end":{"row":30,"column":1},"action":"remove","lines":[" "],"id":51},{"start":{"row":29,"column":2},"end":{"row":30,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":29,"column":2},"end":{"row":29,"column":3},"action":"insert","lines":["e"],"id":52},{"start":{"row":29,"column":3},"end":{"row":29,"column":4},"action":"insert","lines":["l"]},{"start":{"row":29,"column":4},"end":{"row":29,"column":5},"action":"insert","lines":["s"]},{"start":{"row":29,"column":5},"end":{"row":29,"column":6},"action":"insert","lines":["e"]},{"start":{"row":29,"column":6},"end":{"row":29,"column":7},"action":"insert","lines":["i"]},{"start":{"row":29,"column":7},"end":{"row":29,"column":8},"action":"insert","lines":["f"]}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":10},"action":"insert","lines":["()"],"id":53}],[{"start":{"row":29,"column":2},"end":{"row":29,"column":10},"action":"remove","lines":["elseif()"],"id":54}],[{"start":{"row":26,"column":16},"end":{"row":26,"column":17},"action":"insert","lines":[" "],"id":55},{"start":{"row":26,"column":17},"end":{"row":26,"column":18},"action":"insert","lines":["&"]}],[{"start":{"row":26,"column":18},"end":{"row":26,"column":19},"action":"insert","lines":[" "],"id":56}],[{"start":{"row":26,"column":19},"end":{"row":26,"column":38},"action":"insert","lines":[" || empty($content)"],"id":57}],[{"start":{"row":26,"column":22},"end":{"row":26,"column":23},"action":"remove","lines":[" "],"id":58},{"start":{"row":26,"column":21},"end":{"row":26,"column":22},"action":"remove","lines":["|"]},{"start":{"row":26,"column":20},"end":{"row":26,"column":21},"action":"remove","lines":["|"]},{"start":{"row":26,"column":19},"end":{"row":26,"column":20},"action":"remove","lines":[" "]}],[{"start":{"row":29,"column":2},"end":{"row":29,"column":3},"action":"insert","lines":["e"],"id":59},{"start":{"row":29,"column":3},"end":{"row":29,"column":4},"action":"insert","lines":["l"]},{"start":{"row":29,"column":4},"end":{"row":29,"column":5},"action":"insert","lines":["s"]},{"start":{"row":29,"column":5},"end":{"row":29,"column":6},"action":"insert","lines":["e"]},{"start":{"row":29,"column":6},"end":{"row":29,"column":7},"action":"insert","lines":["i"]},{"start":{"row":29,"column":7},"end":{"row":29,"column":8},"action":"insert","lines":["f"]}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":10},"action":"insert","lines":["()"],"id":60}],[{"start":{"row":29,"column":9},"end":{"row":29,"column":21},"action":"insert","lines":["empty($name)"],"id":61}],[{"start":{"row":29,"column":22},"end":{"row":29,"column":23},"action":"insert","lines":["{"],"id":62}],[{"start":{"row":29,"column":23},"end":{"row":31,"column":2},"action":"insert","lines":["","     "," }"],"id":63}],[{"start":{"row":30,"column":5},"end":{"row":31,"column":30},"action":"insert","lines":["$_SESSION['status'] = 'blank';","     redirect('/editing.php');"],"id":64}],[{"start":{"row":30,"column":28},"end":{"row":30,"column":29},"action":"insert","lines":["N"],"id":65}],[{"start":{"row":32,"column":2},"end":{"row":32,"column":3},"action":"insert","lines":["e"],"id":66},{"start":{"row":32,"column":3},"end":{"row":32,"column":4},"action":"insert","lines":["l"]},{"start":{"row":32,"column":4},"end":{"row":32,"column":5},"action":"insert","lines":["s"]},{"start":{"row":32,"column":5},"end":{"row":32,"column":6},"action":"insert","lines":["e"]},{"start":{"row":32,"column":6},"end":{"row":32,"column":7},"action":"insert","lines":["i"]},{"start":{"row":32,"column":7},"end":{"row":32,"column":8},"action":"insert","lines":["f"]}],[{"start":{"row":32,"column":8},"end":{"row":32,"column":10},"action":"insert","lines":["()"],"id":67}],[{"start":{"row":32,"column":9},"end":{"row":32,"column":10},"action":"insert","lines":["e"],"id":69},{"start":{"row":32,"column":10},"end":{"row":32,"column":11},"action":"insert","lines":["m"]},{"start":{"row":32,"column":11},"end":{"row":32,"column":12},"action":"insert","lines":["p"]},{"start":{"row":32,"column":12},"end":{"row":32,"column":13},"action":"insert","lines":["t"]},{"start":{"row":32,"column":13},"end":{"row":32,"column":14},"action":"insert","lines":["y"]}],[{"start":{"row":32,"column":14},"end":{"row":32,"column":16},"action":"insert","lines":["()"],"id":70}],[{"start":{"row":32,"column":15},"end":{"row":32,"column":16},"action":"insert","lines":["c"],"id":71},{"start":{"row":32,"column":16},"end":{"row":32,"column":17},"action":"insert","lines":["o"]},{"start":{"row":32,"column":17},"end":{"row":32,"column":18},"action":"insert","lines":["n"]},{"start":{"row":32,"column":18},"end":{"row":32,"column":19},"action":"insert","lines":["t"]},{"start":{"row":32,"column":19},"end":{"row":32,"column":20},"action":"insert","lines":["e"]},{"start":{"row":32,"column":20},"end":{"row":32,"column":21},"action":"insert","lines":["n"]},{"start":{"row":32,"column":21},"end":{"row":32,"column":22},"action":"insert","lines":["t"]}],[{"start":{"row":32,"column":24},"end":{"row":32,"column":25},"action":"insert","lines":["{"],"id":72}],[{"start":{"row":32,"column":25},"end":{"row":34,"column":2},"action":"insert","lines":["","     "," }"],"id":73}],[{"start":{"row":33,"column":5},"end":{"row":34,"column":30},"action":"insert","lines":["$_SESSION['status'] = 'blank';","     redirect('/editing.php');"],"id":74}],[{"start":{"row":33,"column":28},"end":{"row":33,"column":29},"action":"insert","lines":["C"],"id":75}],[{"start":{"row":26,"column":36},"end":{"row":27,"column":0},"action":"insert","lines":["",""],"id":76},{"start":{"row":27,"column":0},"end":{"row":27,"column":5},"action":"insert","lines":["     "]},{"start":{"row":27,"column":5},"end":{"row":27,"column":6},"action":"insert","lines":["$"]},{"start":{"row":27,"column":6},"end":{"row":27,"column":7},"action":"insert","lines":["_"]},{"start":{"row":27,"column":7},"end":{"row":27,"column":8},"action":"insert","lines":["S"]},{"start":{"row":27,"column":8},"end":{"row":27,"column":9},"action":"insert","lines":["E"]},{"start":{"row":27,"column":9},"end":{"row":27,"column":10},"action":"insert","lines":["S"]}],[{"start":{"row":27,"column":10},"end":{"row":27,"column":11},"action":"insert","lines":["S"],"id":77},{"start":{"row":27,"column":11},"end":{"row":27,"column":12},"action":"insert","lines":["I"]},{"start":{"row":27,"column":12},"end":{"row":27,"column":13},"action":"insert","lines":["O"]},{"start":{"row":27,"column":13},"end":{"row":27,"column":14},"action":"insert","lines":["N"]}],[{"start":{"row":27,"column":14},"end":{"row":27,"column":16},"action":"insert","lines":["[]"],"id":78}],[{"start":{"row":27,"column":15},"end":{"row":27,"column":17},"action":"insert","lines":["''"],"id":79}],[{"start":{"row":27,"column":16},"end":{"row":27,"column":17},"action":"insert","lines":["e"],"id":80},{"start":{"row":27,"column":17},"end":{"row":27,"column":18},"action":"insert","lines":["d"]},{"start":{"row":27,"column":18},"end":{"row":27,"column":19},"action":"insert","lines":["i"]},{"start":{"row":27,"column":19},"end":{"row":27,"column":20},"action":"insert","lines":["N"]},{"start":{"row":27,"column":20},"end":{"row":27,"column":21},"action":"insert","lines":["a"]}],[{"start":{"row":27,"column":21},"end":{"row":27,"column":22},"action":"insert","lines":["m"],"id":81},{"start":{"row":27,"column":22},"end":{"row":27,"column":23},"action":"insert","lines":["e"]}],[{"start":{"row":27,"column":19},"end":{"row":27,"column":20},"action":"insert","lines":["t"],"id":82}],[{"start":{"row":27,"column":16},"end":{"row":27,"column":17},"action":"remove","lines":["e"],"id":83}],[{"start":{"row":27,"column":16},"end":{"row":27,"column":17},"action":"insert","lines":["E"],"id":84}],[{"start":{"row":27,"column":25},"end":{"row":27,"column":26},"action":"remove","lines":["]"],"id":85},{"start":{"row":27,"column":24},"end":{"row":27,"column":25},"action":"remove","lines":["'"]},{"start":{"row":27,"column":23},"end":{"row":27,"column":24},"action":"remove","lines":["e"]},{"start":{"row":27,"column":22},"end":{"row":27,"column":23},"action":"remove","lines":["m"]},{"start":{"row":27,"column":21},"end":{"row":27,"column":22},"action":"remove","lines":["a"]},{"start":{"row":27,"column":20},"end":{"row":27,"column":21},"action":"remove","lines":["N"]},{"start":{"row":27,"column":19},"end":{"row":27,"column":20},"action":"remove","lines":["t"]},{"start":{"row":27,"column":18},"end":{"row":27,"column":19},"action":"remove","lines":["i"]},{"start":{"row":27,"column":17},"end":{"row":27,"column":18},"action":"remove","lines":["d"]},{"start":{"row":27,"column":16},"end":{"row":27,"column":17},"action":"remove","lines":["E"]},{"start":{"row":27,"column":15},"end":{"row":27,"column":16},"action":"remove","lines":["'"]},{"start":{"row":27,"column":14},"end":{"row":27,"column":15},"action":"remove","lines":["["]},{"start":{"row":27,"column":13},"end":{"row":27,"column":14},"action":"remove","lines":["N"]},{"start":{"row":27,"column":12},"end":{"row":27,"column":13},"action":"remove","lines":["O"]},{"start":{"row":27,"column":11},"end":{"row":27,"column":12},"action":"remove","lines":["I"]},{"start":{"row":27,"column":10},"end":{"row":27,"column":11},"action":"remove","lines":["S"]},{"start":{"row":27,"column":9},"end":{"row":27,"column":10},"action":"remove","lines":["S"]},{"start":{"row":27,"column":8},"end":{"row":27,"column":9},"action":"remove","lines":["E"]},{"start":{"row":27,"column":7},"end":{"row":27,"column":8},"action":"remove","lines":["S"]}],[{"start":{"row":27,"column":6},"end":{"row":27,"column":7},"action":"remove","lines":["_"],"id":86},{"start":{"row":27,"column":5},"end":{"row":27,"column":6},"action":"remove","lines":["$"]},{"start":{"row":27,"column":4},"end":{"row":27,"column":5},"action":"remove","lines":[" "]},{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"remove","lines":["    "]},{"start":{"row":26,"column":36},"end":{"row":27,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":29,"column":23},"end":{"row":30,"column":0},"action":"insert","lines":["",""],"id":87},{"start":{"row":30,"column":0},"end":{"row":30,"column":5},"action":"insert","lines":["     "]},{"start":{"row":30,"column":5},"end":{"row":30,"column":6},"action":"insert","lines":["$"]},{"start":{"row":30,"column":6},"end":{"row":30,"column":7},"action":"insert","lines":["_"]}],[{"start":{"row":30,"column":7},"end":{"row":30,"column":8},"action":"insert","lines":["S"],"id":88},{"start":{"row":30,"column":8},"end":{"row":30,"column":9},"action":"insert","lines":["E"]},{"start":{"row":30,"column":9},"end":{"row":30,"column":10},"action":"insert","lines":["S"]},{"start":{"row":30,"column":10},"end":{"row":30,"column":11},"action":"insert","lines":["S"]},{"start":{"row":30,"column":11},"end":{"row":30,"column":12},"action":"insert","lines":["I"]},{"start":{"row":30,"column":12},"end":{"row":30,"column":13},"action":"insert","lines":["O"]},{"start":{"row":30,"column":13},"end":{"row":30,"column":14},"action":"insert","lines":["N"]}],[{"start":{"row":30,"column":14},"end":{"row":30,"column":16},"action":"insert","lines":["[]"],"id":89}],[{"start":{"row":30,"column":15},"end":{"row":30,"column":17},"action":"insert","lines":["''"],"id":90}],[{"start":{"row":30,"column":16},"end":{"row":30,"column":17},"action":"insert","lines":["N"],"id":91},{"start":{"row":30,"column":17},"end":{"row":30,"column":18},"action":"insert","lines":["e"]}],[{"start":{"row":30,"column":18},"end":{"row":30,"column":19},"action":"insert","lines":["d"],"id":92},{"start":{"row":30,"column":19},"end":{"row":30,"column":20},"action":"insert","lines":["i"]},{"start":{"row":30,"column":20},"end":{"row":30,"column":21},"action":"insert","lines":["t"]}],[{"start":{"row":30,"column":20},"end":{"row":30,"column":21},"action":"remove","lines":["t"],"id":93},{"start":{"row":30,"column":19},"end":{"row":30,"column":20},"action":"remove","lines":["i"]},{"start":{"row":30,"column":18},"end":{"row":30,"column":19},"action":"remove","lines":["d"]},{"start":{"row":30,"column":17},"end":{"row":30,"column":18},"action":"remove","lines":["e"]}],[{"start":{"row":30,"column":17},"end":{"row":30,"column":18},"action":"insert","lines":["e"],"id":94},{"start":{"row":30,"column":18},"end":{"row":30,"column":19},"action":"insert","lines":["d"]},{"start":{"row":30,"column":19},"end":{"row":30,"column":20},"action":"insert","lines":["i"]},{"start":{"row":30,"column":20},"end":{"row":30,"column":21},"action":"insert","lines":["t"]}],[{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"insert","lines":[" "],"id":95},{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"insert","lines":["="]}],[{"start":{"row":30,"column":25},"end":{"row":30,"column":26},"action":"insert","lines":[" "],"id":96}],[{"start":{"row":30,"column":26},"end":{"row":30,"column":28},"action":"insert","lines":["''"],"id":97}],[{"start":{"row":30,"column":26},"end":{"row":30,"column":28},"action":"remove","lines":["''"],"id":98}],[{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"insert","lines":["$"],"id":99}],[{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"remove","lines":["$"],"id":100}],[{"start":{"row":33,"column":15},"end":{"row":33,"column":16},"action":"insert","lines":["$"],"id":101}],[{"start":{"row":33,"column":26},"end":{"row":34,"column":0},"action":"insert","lines":["",""],"id":102},{"start":{"row":34,"column":0},"end":{"row":34,"column":5},"action":"insert","lines":["     "]},{"start":{"row":34,"column":5},"end":{"row":34,"column":6},"action":"insert","lines":["$"]},{"start":{"row":34,"column":6},"end":{"row":34,"column":7},"action":"insert","lines":["_"]},{"start":{"row":34,"column":7},"end":{"row":34,"column":8},"action":"insert","lines":["S"]},{"start":{"row":34,"column":8},"end":{"row":34,"column":9},"action":"insert","lines":["E"]}],[{"start":{"row":34,"column":9},"end":{"row":34,"column":10},"action":"insert","lines":["S"],"id":103},{"start":{"row":34,"column":10},"end":{"row":34,"column":11},"action":"insert","lines":["S"]},{"start":{"row":34,"column":11},"end":{"row":34,"column":12},"action":"insert","lines":["I"]},{"start":{"row":34,"column":12},"end":{"row":34,"column":13},"action":"insert","lines":["O"]},{"start":{"row":34,"column":13},"end":{"row":34,"column":14},"action":"insert","lines":["N"]}],[{"start":{"row":34,"column":14},"end":{"row":34,"column":16},"action":"insert","lines":["[]"],"id":104}],[{"start":{"row":34,"column":15},"end":{"row":34,"column":17},"action":"insert","lines":["''"],"id":105}],[{"start":{"row":34,"column":16},"end":{"row":34,"column":17},"action":"insert","lines":["C"],"id":106},{"start":{"row":34,"column":17},"end":{"row":34,"column":18},"action":"insert","lines":["e"]},{"start":{"row":34,"column":18},"end":{"row":34,"column":19},"action":"insert","lines":["d"]},{"start":{"row":34,"column":19},"end":{"row":34,"column":20},"action":"insert","lines":["i"]},{"start":{"row":34,"column":20},"end":{"row":34,"column":21},"action":"insert","lines":["t"]}],[{"start":{"row":34,"column":23},"end":{"row":34,"column":24},"action":"insert","lines":[" "],"id":107},{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"insert","lines":["="]}],[{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"insert","lines":[" "],"id":108}],[{"start":{"row":30,"column":16},"end":{"row":30,"column":17},"action":"remove","lines":["N"],"id":109}],[{"start":{"row":30,"column":16},"end":{"row":30,"column":17},"action":"insert","lines":["C"],"id":110}],[{"start":{"row":34,"column":16},"end":{"row":34,"column":17},"action":"remove","lines":["C"],"id":111}],[{"start":{"row":34,"column":16},"end":{"row":34,"column":17},"action":"insert","lines":["N"],"id":112}],[{"start":{"row":29,"column":23},"end":{"row":30,"column":0},"action":"insert","lines":["",""],"id":113},{"start":{"row":30,"column":0},"end":{"row":30,"column":5},"action":"insert","lines":["     "]},{"start":{"row":30,"column":5},"end":{"row":30,"column":6},"action":"insert","lines":["/"]},{"start":{"row":30,"column":6},"end":{"row":30,"column":7},"action":"insert","lines":["/"]}],[{"start":{"row":30,"column":7},"end":{"row":30,"column":9},"action":"insert","lines":["もし"],"id":114}],[{"start":{"row":30,"column":9},"end":{"row":30,"column":12},"action":"insert","lines":["名前が"],"id":115}],[{"start":{"row":30,"column":12},"end":{"row":30,"column":16},"action":"insert","lines":["空欄なら"],"id":116},{"start":{"row":30,"column":16},"end":{"row":30,"column":17},"action":"insert","lines":["、"]}],[{"start":{"row":30,"column":17},"end":{"row":30,"column":25},"action":"insert","lines":["コメントだけ保存"],"id":117}],[{"start":{"row":34,"column":26},"end":{"row":35,"column":0},"action":"insert","lines":["",""],"id":118},{"start":{"row":35,"column":0},"end":{"row":35,"column":5},"action":"insert","lines":["     "]},{"start":{"row":35,"column":5},"end":{"row":35,"column":9},"action":"insert","lines":["・・もし"]}],[{"start":{"row":35,"column":8},"end":{"row":35,"column":9},"action":"remove","lines":["し"],"id":119},{"start":{"row":35,"column":7},"end":{"row":35,"column":8},"action":"remove","lines":["も"]},{"start":{"row":35,"column":6},"end":{"row":35,"column":7},"action":"remove","lines":["・"]},{"start":{"row":35,"column":5},"end":{"row":35,"column":6},"action":"remove","lines":["・"]}],[{"start":{"row":35,"column":5},"end":{"row":35,"column":6},"action":"insert","lines":["/"],"id":120},{"start":{"row":35,"column":6},"end":{"row":35,"column":7},"action":"insert","lines":["/"]}],[{"start":{"row":35,"column":7},"end":{"row":35,"column":19},"action":"insert","lines":["もしコメントが空欄なら、"],"id":121}],[{"start":{"row":35,"column":19},"end":{"row":35,"column":25},"action":"insert","lines":["名前だけ保存"],"id":122}],[{"start":{"row":31,"column":26},"end":{"row":31,"column":27},"action":"insert","lines":["$"],"id":123},{"start":{"row":31,"column":27},"end":{"row":31,"column":28},"action":"insert","lines":["c"]},{"start":{"row":31,"column":28},"end":{"row":31,"column":29},"action":"insert","lines":["o"]},{"start":{"row":31,"column":29},"end":{"row":31,"column":30},"action":"insert","lines":["n"]}],[{"start":{"row":31,"column":29},"end":{"row":31,"column":30},"action":"remove","lines":["n"],"id":124}],[{"start":{"row":31,"column":29},"end":{"row":31,"column":30},"action":"insert","lines":["m"],"id":125},{"start":{"row":31,"column":30},"end":{"row":31,"column":31},"action":"insert","lines":["m"]},{"start":{"row":31,"column":31},"end":{"row":31,"column":32},"action":"insert","lines":["e"]},{"start":{"row":31,"column":32},"end":{"row":31,"column":33},"action":"insert","lines":["n"]},{"start":{"row":31,"column":33},"end":{"row":31,"column":34},"action":"insert","lines":["t"]}],[{"start":{"row":31,"column":33},"end":{"row":31,"column":34},"action":"remove","lines":["t"],"id":126},{"start":{"row":31,"column":32},"end":{"row":31,"column":33},"action":"remove","lines":["n"]},{"start":{"row":31,"column":31},"end":{"row":31,"column":32},"action":"remove","lines":["e"]},{"start":{"row":31,"column":30},"end":{"row":31,"column":31},"action":"remove","lines":["m"]},{"start":{"row":31,"column":29},"end":{"row":31,"column":30},"action":"remove","lines":["m"]}],[{"start":{"row":31,"column":29},"end":{"row":31,"column":30},"action":"insert","lines":["n"],"id":127},{"start":{"row":31,"column":30},"end":{"row":31,"column":31},"action":"insert","lines":["t"]},{"start":{"row":31,"column":31},"end":{"row":31,"column":32},"action":"insert","lines":["e"]},{"start":{"row":31,"column":32},"end":{"row":31,"column":33},"action":"insert","lines":["n"]},{"start":{"row":31,"column":33},"end":{"row":31,"column":34},"action":"insert","lines":["t"]}],[{"start":{"row":30,"column":20},"end":{"row":30,"column":21},"action":"remove","lines":["ト"],"id":128},{"start":{"row":30,"column":19},"end":{"row":30,"column":20},"action":"remove","lines":["ン"]},{"start":{"row":30,"column":18},"end":{"row":30,"column":19},"action":"remove","lines":["メ"]},{"start":{"row":30,"column":17},"end":{"row":30,"column":18},"action":"remove","lines":["コ"]}],[{"start":{"row":30,"column":17},"end":{"row":30,"column":19},"action":"insert","lines":["内容"],"id":129}],[{"start":{"row":30,"column":17},"end":{"row":30,"column":19},"action":"insert","lines":["投稿"],"id":130}],[{"start":{"row":36,"column":26},"end":{"row":36,"column":27},"action":"insert","lines":["$"],"id":131},{"start":{"row":36,"column":27},"end":{"row":36,"column":28},"action":"insert","lines":["n"]},{"start":{"row":36,"column":28},"end":{"row":36,"column":29},"action":"insert","lines":["a"]},{"start":{"row":36,"column":29},"end":{"row":36,"column":30},"action":"insert","lines":["m"]},{"start":{"row":36,"column":30},"end":{"row":36,"column":31},"action":"insert","lines":["e"]},{"start":{"row":36,"column":31},"end":{"row":36,"column":32},"action":"insert","lines":[";"]}],[{"start":{"row":31,"column":34},"end":{"row":31,"column":35},"action":"insert","lines":["l"],"id":132}],[{"start":{"row":31,"column":34},"end":{"row":31,"column":35},"action":"remove","lines":["l"],"id":133}],[{"start":{"row":31,"column":34},"end":{"row":31,"column":35},"action":"insert","lines":["'"],"id":134}],[{"start":{"row":31,"column":34},"end":{"row":31,"column":35},"action":"remove","lines":["'"],"id":135}],[{"start":{"row":31,"column":34},"end":{"row":31,"column":35},"action":"insert","lines":[";"],"id":136}],[{"start":{"row":39,"column":2},"end":{"row":40,"column":0},"action":"insert","lines":["",""],"id":138},{"start":{"row":40,"column":0},"end":{"row":40,"column":1},"action":"insert","lines":[" "]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":25,"column":1},"end":{"row":25,"column":1},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1637145029081}
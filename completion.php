<?php

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');



$x = sprintf('INSERT INTO book SET size="%d",date="2019-01-%s", time="%s:00", place="%d", message="%s", members_id="%d"',$_POST['size'], $_POST['date'], $_POST['time'], $_POST['place'], $_POST['message'], $_POST['members_id']);
$db->query($x);
?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<p>予約が完了しました</p>
<p>内容詳細メールをご確認ください</p>
<a href="chome.php">ホーム画面に戻る</a>
</body></html>
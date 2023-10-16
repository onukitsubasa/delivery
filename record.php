<?php

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');

$x = sprintf('INSERT INTO nimotu SET name="%s",size="%d",date="2019-01-%s",time="%s:00",place="%d",message="%s",state="%d"',$_POST['name'],$_POST['size'],$_POST['date'],$_POST['time'],$_POST['place'],$_POST['message'],0);
$db->query($x);
?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<p>登録が完了しました</p>

<a href="shome.php">ホーム画面に戻る</a>
<a href="nimotu.php">次を入力</a>
</body></html>
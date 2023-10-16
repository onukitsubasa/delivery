<?php
$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');
$x = sprintf('INSERT INTO members SET name="%s",address="%s",password="%s",assignment="%s"',$_POST['name'],$_POST['address'],$_POST['password'],$_POST['assignment']);
$db->query($x);
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<p>ユーザー登録が完了しました</p>
<a href="login.php">ログインする</a>
</body></html>
<?php

session_start();

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');

if(empty($_SESSION['id'])){
  header('Location: login.php');
  exit();
}

?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h1>配達スタッフ用サイト</h1> 
<p>ようこそ<?php print$_SESSION['name']; ?>さん</p>

<form action="load.php" method="post">
<input type="text" name="date"/>
<input type="submit" value="順路確認" />
</form>

<a href="search.php"></a>

<a href="logout.php">ログアウト</a>
</form>

</body></html>
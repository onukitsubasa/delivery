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
<h1>宅配予約サイト</h1> 
<p>ようこそ<?php print$_SESSION['name']; ?>さん</p>



<a href="order.php">集荷予約</a>

<a href="reorder.php">再配達予約</a>

<a href="logout.php">ログアウト</a>
</form>

</body></html>
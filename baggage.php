<?php

session_start();

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');

if(empty($_SESSION['id'])){
  header('Location: login.php');
  exit();
}

$x = sprintf('SELECT * FROM nimotu WHERE date="%s"',$_POST['date']);
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);

?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h1>倉庫スタッフ用サイト</h1> 
<p>ようこそ<?php print$_SESSION['name']; ?>さん</p>
<pre>
<?php
print_r($y); // これを元に計算
?>


</pre>
<a href="shome.php">戻る</a>
</form>

</body></html>
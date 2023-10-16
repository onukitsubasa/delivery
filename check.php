<?php

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');

if(empty($_POST['address'])) {
  header('Location: join.php');
  exit();
}

$x = sprintf('SELECT * FROM members WHERE address="%s"',$_POST['address']);
$stt = $db->query($x);
$r = $stt->fetchAll(PDO::FETCH_ASSOC);
if(count($r)>0){
  header('Location: join.php');
  exit();
}

?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body> 
<form action="thanks.php" method="post">
  <?php 
    printf('<input type="hidden" name="name" value="%s" />', $_POST['name']); 
	printf('<input type="hidden" name="address" value="%s" />', $_POST['address']);
    printf('<input type="hidden" name="password" value="%s" />', $_POST['password']);
	printf('<input type="hidden" name="assignment" value="%s" />', $_POST['assignment']); 
  ?>
  <table>
    <tr><td>ユーザー名</td>
        <td><?php print $_POST['name']; ?></td></tr>
	<tr><td>メールアドレス</td>
   		<td><?php print $_POST['address']; ?><td></tr>
    <tr><td>パスワード</td>
        <td><?php print $_POST['password']; ?></td></tr>
	<tr><td>所属</td>
    　   <td><?php print $_POST['assignment']; ?></td></tr>
  </table>
  <a href="join.php">書き直す</a>
  <input type="submit" value="登録する" />
</form>
</body></html>

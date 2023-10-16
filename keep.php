<?php
  
session_start();

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');

?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
  <form action="completion.php" method="post">
  <?php 
	 
	printf('<input type="hidden" name="size" value="%s" />', $_POST['size']); 

	printf('<input type="hidden" name="date" value="%s" />', $_POST['date']);
	printf('<input type="hidden" name="time" value="%s" />', $_POST['time']);
	printf('<input type="hidden" name="place" value="%s" />', $_POST['place']);
	printf('<input type="hidden" name="message" value="%s" />', $_POST['message']); 
	printf('<input type="hidden" name="members_id" value="%s" />', $_SESSION['id']);

  ?>
  <table>

    <tr><td>サイズ</td></tr>
	<td><?php print $_POST['size']; ?><td></tr>

	<tr><td>日時</td></tr>
		<td>1月<?php print $_POST['date']; ?>日<td></tr>
		<td><?php print $_POST['time']; ?>までに到着<td></tr>
		<tr><td>住所</td></tr>
	<td><?php print $_POST['place']; ?><td></tr>
		
	<tr><td>その他入力事項</td></tr>
		<td><?php print $_POST['message']; ?><td></tr>
	
	</table>

	<input type="submit" value="この内容で予約する" />
	
</form>
</body></html>
<?php

session_start();

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');
?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body> 

<form action="rekeep.php" method="post">


  <table>
	  

	    <tr><td>荷物番号</td></tr>
    <tr><td><input type="text" name="nimotu_id" /></td></tr>
	

	<tr><td>日時を選択</td></tr>
	
    <tr><td><select name="date" />
	<option value="1" selected>1日</option>
	<option value="2" >2日</option>
	<option value="3" >3日</option>
	<option value="4" >4日</option>
	<option value="5" >5日</option>
	<option value="6" >6日</option>
	<option value="7" >7日</option>
	<option value="8" >8日</option>
	<option value="9" >9日</option>
	<option value="10" >10日</option>
	<option value="11" >11日</option>
	<option value="12" >12日</option>
	<option value="13" >13日</option>
	<option value="14" >14日</option>
	<option value="15" >15日</option>
	<option value="16" >16日</option>
	<option value="17" >17日</option>
	<option value="18" >18日</option>
	<option value="19" >19日</option>
	<option value="20" >20日</option>
	<option value="21" >21日</option>
	<option value="22" >22日</option>
	<option value="23" >23日</option>
	<option value="24" >24日</option>
	<option value="25" >25日</option>
	<option value="26" >26日</option>
	<option value="27" >27日</option>
	<option value="28" >28日</option>
	<option value="29" >29日</option>
	<option value="30" >30日</option>
	<option value="31" >31日</option>
</select></td></tr>

	<tr><td><select name="time" />
	<option value="9:00" selected>9:00</option>
	<option value="9:30" >9:30</option>
	<option value="10:00" >10:00</option>
	<option value="10:30" >10:30</option>
	<option value="11:00" >11:00</option>
	<option value="11:30" >11:30</option>
	<option value="12:00" >12:00</option>
	<option value="12:30" >12:30</option>
	<option value="13:00" >13:00</option>
	<option value="13:30" >13:30</option>
	<option value="14:00" >14:00</option>
	<option value="14:30" >14:30</option>
	<option value="15:00" >15:00</option>
	<option value="15:30" >15:30</option>
	<option value="16:00" >16:00</option>
	<option value="16:30" >16:30</option>
	<option value="17:00" >17:00</option>
	<option value="17:30" >17:30</option>
	<option value="18:00" >18:00</option>
	<option value="18:30" >18:30</option>
	<option value="19:00" >19:00</option>
	<option value="19:30" >19:30</option>
	<option value="20:00" >20:00</option>
	<option value="20:30" >20:30</option>
	<option value="21:00" >21:00</option>
	<option value="21:30" >21:30</option>
	<option value="22:00" >22:00</option>
	
</select></td></tr>
	
	
	<tr><td>その他入力事項</td></tr>
	 <tr><td><input type="text" name="message" /></td></tr>

  </table>

<input type="submit" value="予約内容を確認する" />
	
</form>
</body></html>
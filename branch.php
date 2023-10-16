<?php
session_start();

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');
$x = sprintf('SELECT * FROM members WHERE name="%s" AND address="%s" AND password="%s"',$_POST['name'],$_POST['address'],$_POST['password']);
$stt = $db->query($x);
$r = $stt->fetchAll(PDO::FETCH_ASSOC);

if (count($r)==0) {
  header('Location: login.php');
  exit();
} else if($r[0]['assignment']==0){
  $r = $r[0];
  $_SESSION['id'] = $r['id'];
  $_SESSION['name'] = $r['name'];
  header('Location: chome.php');
  exit();
}
else if($r[0]['assignment']==1){
  $r = $r[0];
  $_SESSION['id'] = $r['id'];
  $_SESSION['name'] = $r['name'];
  header('Location: shome.php');
  exit();
}
else if($r[0]['assignment']==2){
  $r = $r[0];
  $_SESSION['id'] = $r['id'];
  $_SESSION['name'] = $r['name'];
  header('Location: dhome.php');
  exit();
}
?>
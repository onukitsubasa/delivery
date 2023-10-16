<?php
  
session_start();

$dsn = 'mysql:dbname=delivery; host=localhost; charset=utf8';
$db = new PDO($dsn,'root','root');

?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<td><?php print $_POST['date']; ?><td></tr>
<td><?php print $_POST['next']; ?><td></tr>
<td><?php print $_POST['addplace']; ?><td></tr>
<td><?php print $_POST['addtime']; ?>〜<td></tr><p></p>


<?php

$x = sprintf('SELECT * FROM nimotu WHERE date="%s" AND state=3',$_POST['date']);
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);
$next = $y[0];

// $add = ['time'=>$_POST['addtime'],'place'=>$_POST['addplace']];


$x = sprintf('SELECT * FROM nimotu WHERE date="%s" AND state=0',$_POST['date']);
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);



$x = sprintf('SELECT * FROM weight');
$stt = $db->query($x);
$v = $stt->fetchAll(PDO::FETCH_ASSOC);
foreach($v as $r) {
	$w[$r['start']][$r['next']]=$r['weight'];
}


print '各荷物の到着締め切り<pre>';print_r($y);print '</pre>';
//print '各荷物の到着締め切り<pre>';print_r($w);print '</pre>';
// 本当は,nimotu テーブルからとってきたものを y に入れる必要あり.
// 本当は,weight テーブルからあらゆる頂点間の経過時間をとってきて,
// $w[a][b]にab間の経過時間（分を整数で）を入れておく必要あり.


$result = [];	  
$z = [];
perm($y,$z);

function perm(array $y, array $z){
  global $result;
  if (count($y) == 0) {
    $temp=$z;
    array_push($result,$temp);	  
    return;
  }
  for($i=0;$i<count($y);$i++){
      $a = array_splice($y,$i,1); array_push($z,$a[0]);
      perm($y,$z);
      $a = array_pop($z); array_splice($y,$i,0,[$a]);
  }
  return; 
}
// ここまでで $y のあらゆる並び替えが $result に入る
// ただし,本当は出発地点だけは並び替えず特別扱いにする必要あり

// $resultの各要素（これは配列）の先頭に出発地点（倉庫。１番）を追加
for($i=0;$i<count($result);$i++){
    array_unshift($result[$i],$next);
}


$latestStart = new DateTime('00:00:00');
$answer = [];

foreach($result as $z){
    $goal = new DateTime($z[count($z)-1]['time']);
      
    for($j=count($z)-2; $j>=0; $j--){
      $next = $z[$j+1]['place'];
      $now = $z[$j]['place'];
      //printf('%sに%sに着くことが必要,そこまで%s分かかるので<br>',$next,$goal->format('H:i:s'),$w[$now][$next]);
      $subgoal = $goal->sub(new DateInterval('PT'.$w[$now][$next].'M'));
      $subgoal2 = new DateTime($z[$j]['time']);

      if ($subgoal < $subgoal2){
        $goal = $subgoal;
      }else{
        $goal = $subgoal2;
      }
    }
    //printf('%sに%sに着くことが必要<br>',$z[0]['place'],$goal->format('H:i:s'));	  
    if ($latestStart < $goal) {
        $latestStart = $goal;
        $answer = $z;
    }
}
print '最短時間で配達できる順番は<pre>';print_r($answer);print '</pre>';
print 'で、そのときの最初の地点の時刻は';
print $latestStart->format('H:i:s');


if ((!empty($_POST['addplace'])) && (!empty($_POST['addtime']))) {
    foreach($answer as $aa){
        if($aa['place'] == $_POST['addplace']){
	        if ($aa['time'] < $_POST['addtime']) {
		        print '追加を承認します';
    		}else{
			    print '追加を却下します';
			}
	    }
    }
}

?>



</body></html>

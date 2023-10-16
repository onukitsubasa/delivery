<?php
  session_start();
  $_SESSION = [];
  if (isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-3600);
  }
  session_destroy();
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<p>ログアウトしました</p>
<a href="login.php">ログイン画面に戻る</a>
</body></html>
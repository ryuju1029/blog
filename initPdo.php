<?php
function initPdo()
{
  $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';

  // MSQLのデータベース接続
  return new PDO($dsn, $user, $password);
}
?>
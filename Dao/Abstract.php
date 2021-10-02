<?php
abstract class DbConnection {

  public function Connection(){
    $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $this->pdo = new PDO($dsn, $user, $password);
  }
}
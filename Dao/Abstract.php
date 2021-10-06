<?php

abstract class Dbo 
{
  protected $pdo;

  public function __construct()
  {
    $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $this->pdo = new PDO($dsn, $user, $password);
  }
}
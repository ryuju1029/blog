<?php
require_once(__DIR__ . '/Dao.php');

final class UserDao extends Dao
{
  public function emailsignin(string $email)
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($user === false) ? null : $user;
  }

  public function findByEmail(string $email)
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($user === false) ? null : $user;
  }

  public function createUser(string $name, string $email, string $password)
  {
    $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
    $stmt = $this->pdo->prepare($sql);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->execute();
  }
}

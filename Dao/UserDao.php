<?php


final class UserDao
{
  private $pdo;

  public function __construct()
  {
    // TODO: 抽象クラス「Dao.php」を継承して、そっちでPDO接続する
    $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $this->pdo = new PDO($dsn, $user, $password);
  }

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

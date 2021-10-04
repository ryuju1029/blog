<?php
require_once(__DIR__ . '/Abstract.php');

final class CommentDao extends Dbo
{
  
  public function create(string $comments, string $commenter_name, int $blog_id, int $user_id)
  {
    $sql = "INSERT INTO comments (commenter_name, comments, blog_id, user_id) VALUES (:commenter_name, :comments, :blog_id, :user_id)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':commenter_name', $commenter_name);
    $stmt->bindValue(':comments', $comments);
    $stmt->bindValue(':blog_id', $blog_id);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
  }
  
  public function findAll(int $id): array
  {
    $sql = "SELECT * FROM comments WHERE blog_id = :blog_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':blog_id', $id);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return ($comments === false) ? [] : $comments;
  }

}
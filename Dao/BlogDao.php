<?php
require_once(__DIR__ . '/Abstract.php');

final class BlogDao extends Dbo
{
     
    public function findAll(?string $contents, string $order): array
    {
        $sql = 'SELECT * FROM blogs';
        if (!is_null($contents)) {
            $sql .= " WHERE contents LIKE :contents";
        }

        $sql .= ' ORDER BY created_at ' . $order;

        $stmt = $this->pdo->prepare($sql);
        if (!is_null($contents)) {
            $stmt->bindValue(':contents', '%' . $contents . '%');
        }
        $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // TODO: 三項演算子にする
        return ($blogs === false) ? [] : $blogs;
    }

    public function create(?string $contents,string $title,int $userId)
    {
        $sql = "INSERT INTO blogs (title, contents, user_id) VALUES (:title, :contents, :user_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':contents', $contents);
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
    }

    public function findById(int $id): ?array
    {
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($blog === false) ? null : $blog;
    }

    public function findByUserId(int $userId): ?array
    {
        $sql = "SELECT * FROM blogs WHERE user_id = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':userId', $userId);
        $stmt->execute();
        $blog = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($blog === false) ? null : $blog;
    } 

    public function update(?string $contents, string $title, int $id)
    {
        $sql = "UPDATE blogs SET title = :title, contents = :contents WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $params = array(':title' => $title, ':contents' => $contents, ':id' => $id,);
        $stmt->execute($params);
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM blogs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}

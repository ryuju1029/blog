<?php
require_once(__DIR__ . '/Dao.php');
require_once(__DIR__ . '/../Dto/BlogRaw.php');

final class BlogDao extends Dao
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
        
        if ($blogs === false) return [];

        $blogRaws = [];
        foreach ($blogs as $blog) {
            $blogRaws[] = new BlogRaw(
                $blog['id'],
                $blog['user_id'],
                $blog['title'],
                $blog['contents'],
                $blog['created_at'],
                $blog['updated_at']
            );
        }
        return $blogRaws;
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

    public function findById(int $id): ?BlogRaw
    {
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($blog === false) return null;

        return new BlogRaw(
            $blog['id'],
            $blog['user_id'],
            $blog['title'],
            $blog['contents'],
            $blog['created_at'],
            $blog['updated_at']
        );
    }

    public function findByUserId(string $userId): ?array
    {
        $sql = "SELECT * FROM blogs WHERE user_id = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':userId', $userId);
        $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //return ($blog === false) ? null : $blog;

         if($blogs === false) return null;

         foreach ($blogs as $blog){
            $BlogRaws[] =  new BlogRaw(
                $blog['id'],
                $blog['user_id'],
                $blog['title'],
                $blog['contents'],
                $blog['created_at'],
                $blog['updated_at']
            );
         }
         return $BlogRaws;
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

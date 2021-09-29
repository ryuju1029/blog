<?php


final class BlogDao
{
    private $pdo;

    public function __construct()
    {
        // TODO: 抽象クラス「Dao.php」を継承して、そっちでPDO接続する
        $dsn = 'mysql:dbname=blog;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';

        // MSQLのデータベース接続
        $this->pdo = new PDO($dsn, $user, $password);
    }

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
        if ($blogs === false) {
            return [];
        }

        return $blogs;
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

    public function update(array $blog)
    {

    }
}
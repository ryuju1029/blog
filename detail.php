<?php
session_start();
require_once('initPdo.php');
require_once(__DIR__ . '/Dao/BlogDao.php');

//$id＝ブログのID
$id = filter_input(INPUT_GET, "id");
$blogDao = new BlogDao();
$blog = $blogDao->findById($id);

$sql = "SELECT * FROM comments WHERE blog_id = :blog_id";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':blog_id', $id);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $sql = "SELECT * FROM blogs WHERE id = :id";
// $pdo = initPdo();
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id);
// $stmt->execute();
// $blog = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<h1 style="text-align:center"><?php echo $blog['title']; ?></h1>

<table align="center">
  <tr>
    <td>作成日時：<?php echo $blog['created_at']; ?></td>
  </tr>
  <tr>
    <td><?php echo $blog['contents']; ?></td>
  </tr>
  <tr>
    <td><a href="index.php">一覧ページへ</a></td>
  </tr>
</table>

<?php if (isset($_SESSION['id'])) : ?>
  <form action="blog_comment.php" method="post">
    <input type="hidden" name="blog_id" value="<?= $blog['id'] ?>">
    <table align="center">
      <tr>
        <td>
          <h2>この投稿にコメントをしますか？</h2>
        </td>
      </tr>
      <tr>
        <td>タイトル</td>
      </tr>
      <tr>
        <td><input name="commenter_name" placeholder="タイトル" style="width:400px;"></td>
      </tr>
      <tr>
        <td>内容</td>
      </tr>
      <tr>
        <td><input name="comment" placeholder="本文" style="width:400px;"></td>
      </tr>
      <tr>
        <td align="center"><button type="submit" name="button">コメント</button></td>
      </tr>
    </table>
  </form>


  <table align="center">
    <tr>
      <td>コメント一覧</td>
    </tr>
    <?php foreach ($comments as $comment) : ?>
      <tr>
        <td><?php echo $comment['commenter_name']; ?></td>
      </tr>
      <!-- コメントした人の名前表示 -->
      <!-- 
        <tr>
        <td><?php echo $user_name['name']; ?></td>
      　</tr>
       -->
      <tr>
        <td><?php echo $comment['comments']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php endif; ?>
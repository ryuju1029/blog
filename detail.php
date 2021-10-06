<?php
session_start();
require_once(__DIR__ . '/Dao/BlogDao.php');
require_once(__DIR__ . '/Dao/CommentsDao.php');
$id = filter_input(INPUT_GET, "id");
$blogDao = new BlogDao();
$blogRaw = $blogDao->findById($id);
// TODO: Blogがnullだった場合に一覧ページにリダイレクトさせる
if(empty($blogRaw)) return header('Location: index.php');
// TODO: Daoの返り値をDTO(CommentRawなど)にする
$commentDao = new CommentDao();
$commentsRaws = $commentDao->findAll($id);
?>

<h1 style="text-align:center"><?php echo $blogRaw->title(); ?></h1>

<table align="center">
  <tr>
    <td>作成日時：<?php echo $blogRaw->createdAt(); ?></td>
  </tr>
  <tr>
    <td><?php echo $blogRaw->contents(); ?></td>
  </tr>
  <tr>
    <td><a href="index.php">一覧ページへ</a></td>
  </tr>
</table>

<?php if (isset($_SESSION['id'])) : ?>
  <form action="blog_comment.php" method="post">
    <input type="hidden" name="blog_id" value="<?= $blogRaw->id() ?>">
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
    <?php foreach ($commentsRaws as $commentsRaw) : ?>
      <tr>
        <td><?php echo $commentsRaw->commenterName(); ?></td>
      </tr>
      <tr>
        <td><?php echo $commentsRaw->comments(); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php endif; ?>
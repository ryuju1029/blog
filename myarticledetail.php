<?php
require_once(__DIR__ . '/Dao/BlogDao.php');
$id = filter_input(INPUT_GET, "id");
$blogDao = new BlogDao();
$blog = $blogDao->findById($id);
?>

<h1 style="text-align:center"><?php echo $blog->title(); ?></h1>

<table align="center">
  <tr>
    <td>作成日時：<?php echo $blog->createdAt() ?></td>
  </tr>
  <tr>
    <td><?php echo $blog->contents(); ?></td>
  </tr>
  <tr>
    <td>
      <a href="blog_edit.php?id=<?php echo $blog->id(); ?>">編集</a>
      <a href="delete.php?id=<?php echo $blog->id() ?>">削除</a>
      <a href="mypage.php">マイページへ</a>
    </td>
  </tr>
</table>
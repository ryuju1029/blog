<?php
require_once(__DIR__ . '/Dao/BlogDao.php');
$id = filter_input(INPUT_GET, "id");
$blogDao = new BlogDao();
$blog = $blogDao->findById($id);
?>

<h1 style="text-align:center">メモ編集</h1>

<form action="update.php" method="post">
  <input type="hidden" name="id" value="<?php if (!empty($blog->id())) echo (htmlspecialchars($blog->id(), ENT_QUOTES, 'UTF-8')); ?>">
  <table align="center">
    <tr>
      <td><input type="text" name="title" value="<?php if (!empty($blog->title())) echo (htmlspecialchars($blog->title(), ENT_QUOTES, 'UTF-8')); ?>"></td>
    </tr>
    <tr>
      <td><input type="text" name="content" value="<?php if (!empty($blog->contents())) echo (htmlspecialchars($blog->contents(), ENT_QUOTES, 'UTF-8')); ?>"></td>
    </tr>
    <tr>
      <td><input type="submit" value="更新"></td>
    </tr>
  </table>

</form>
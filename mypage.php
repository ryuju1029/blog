<?php
require_once('header.php');
require_once(__DIR__ . '/Dao/BlogDao.php');

$userId = $_SESSION['id'];
$blogDao = new BlogDao();
$blogs = $blogDao->findByUserId($userId);
?>

<body>
  <h1>マイページ</h1>
  <div><button type="button" onclick="location.href='./post_create.php'">新規投稿</button></div>

  <?php foreach ($blogs as $blog) : ?>
    <table align="left" class="cardBlogContent">
      <tr>
        <td><?php echo $blog->title(); ?></td>
      </tr>
      <tr>
        <td><?php echo $blog->createdAt(); ?></td>
      </tr>
      <tr>
        <td><?php echo mb_substr($blog->contents(), 0, 15); ?></td>
      </tr>
      <tr>
        <td>
            <a href="myarticledetail.php?id=<?php echo $blog->id(); ?>">記事詳細</a>
        </td>
      </tr>
    </table>
  <?php endforeach; ?>
</body>
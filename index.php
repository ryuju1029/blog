<?php
require_once('initPdo.php');
require_once('header.php');
require_once(__DIR__ . '/Dao/BlogDao.php');

$order = filter_input(INPUT_GET, "order") ?? 'desc';
$contents = filter_input(INPUT_GET, "contents");
$blogDao = new BlogDao();
$blogs = $blogDao->findAll($contents, $order);
?>

<link rel="stylesheet" href="style.css">

<body>
  <h1>blog一覧</h1>

  <form action="index.php" method="GET">
    <input type="text" name="contents" placeholder="Search.." value="<?php echo $contents; ?>">
    <input type="submit" value="検索">
  </form>

  <form action="index.php" method="GET">
    <label>
      <input type="radio" name="order" value="desc" style="text-align: right" <?php if ($order === 'desc') : ?> checked <?php endif; ?>>
      新しい順
    </label>
    <label>
      <input type="radio" name="order" value="asc" style="text-align: right" <?php if ($order === 'asc') : ?> checked <?php endif; ?>>
      古い順
    </label>
    <input type="submit" value="並び替え">
  </form>

  <?php foreach ($blogs as $blog) : ?>
    <table align="left" class="cardBlogContent">
      <tr>
        <td><?php echo $blog['title']; ?></td>
      </tr>
      <tr>
        <td><?php echo $blog['created_at']; ?></td>
      </tr>
      <tr>
        <td><?php echo mb_substr($blog['contents'], 0, 5); ?></td>
      </tr>
      <tr>
        <td><a href="detail.php?id=<?php echo $blog['id']; ?>">記事詳細</a></td>
      </tr>

    </table>
  <?php endforeach; ?>
</body>
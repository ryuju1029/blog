<?php
require_once('initPdo.php');
$id = filter_input(INPUT_GET, "id");
$sql = "SELECT * FROM blogs WHERE id = :id";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$blog = $stmt->fetch(PDO::FETCH_ASSOC);
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

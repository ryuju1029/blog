<?php
require_once('header.php');
$userId = $_SESSION['id'];
?>

<h1 style="text-align:center">投稿</h1>
<form action="store.php" method="post">
  <table align="center">
    <tr>
      <td>
        <p>title</p>
      </td>
    </tr>
    <tr>
      <td><input name="title" placeholder="タイトル" style="width:200px;"></td>
    </tr>
    <tr>
      <td>
        <p>本文</p>
      </td>
    </tr>
    <tr>
      <td><input name="contents" placeholder="本文" style="width:200px;"></td>
    </tr>
    <tr>
      <td><button type="submit" name="button">送信</button></td>
    </tr>
  </table>
</form>
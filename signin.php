<?php
require_once('header.php');
?>
<link rel="stylesheet" href="style.css">

<div>
  <form action="signin_complete.php" method="post">
    <table align="center" class="signinTable">
      <tr>
        <th>ログイン</th>
      </tr>
      <tr>
        <td class="sigcontent"><input type="text" name="email" placeholder="Email" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="sigcontent"><input type="password" name="password" placeholder="Password" style="width:300px;"></td>
      </tr>
      <tr>
        <td class="sigcontent" align="center"><button type="submit" name="button">ログイン</button></td>
      </tr>
      <tr>
        <td align="center"><a href="./signup.php">アカウントを作る</a></td>
      </tr>
    </table>
  </form>
</div>

<style>
  .signinTable {
    padding-top: 5%;
  }

  .sigcontent {
    padding-top: 10px;
  }

  tbody {
    background-color: #99FFCC;
  }
</style>
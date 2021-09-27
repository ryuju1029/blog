<?php
session_start();
if (isset($_SESSION['id'])) $userName = $_SESSION['name'];
$url = $_SERVER['REQUEST_URI'];
?>

<link rel="stylesheet" href="style.css">
<header>
  <div class="header_content">
    <div class="header_item">
      <a class="greeting_messege">こんにちは<?php if (isset($userName)) echo $userName;
                                        else echo "ゲスト"; ?>さん</a>
    </div>
    <?php if (isset($_SESSION['id'])) : ?>
        <div class="header_item right_content">
          <a href="./mypage.php">マイページ</a>
        </div>
    <?php endif; ?>
    <!-- indexページにいるときは表示させないようにする<?php if ($url !== "/blog/index.php/") : ?> -->
      <div class="header_item right_content">
        <a href="./index.php">一覧ページ</a>
      </div>
    <!-- <?php endif; ?> -->
    <?php if (isset($_SESSION['id'])) : ?>
      <div class="header_item right_content">
        <a href="./signout.php">ログアウト</a>
      </div>
    <?php else : ?>
      <div class="header_item right_content">
        <a href="./signup.php">ログイン</a>
      </div>
    <?php endif; ?>
  </div>
</header>
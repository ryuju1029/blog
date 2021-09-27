<?php
require_once('initPdo.php');
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

$sql = "SELECT * FROM users WHERE email = :email";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

session_start(); 
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($password, $user['password'])) {
  //DBのユーザー情報をセッションに保存
  $_SESSION['id'] = $user['id'];
  $_SESSION['name'] = $user['name'];
  $msg = 'ログインしました。';
  $link = '<a href="index.php">ホーム</a>';
} else {
  $msg = 'メールアドレスもしくはパスワードが間違っています。';
  $link = '<a href="singin.php">戻る</a>';
}
?>

<?php echo $msg; ?>
<?php echo $link; ?> 
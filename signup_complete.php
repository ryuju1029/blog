<?php
require_once('initPdo.php');
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$passwordConfirm = filter_input(INPUT_POST, "password_confirm");

if ($password !== $passwordConfirm) {
  echo '<h1>パスワードが一致しません</h1>';
  echo '<a href="signup.php">戻る</a>';
  die;
}

// フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM users WHERE email = :email";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!empty($user)) {
  echo '<h1>同じメールアドレスが存在します。</h1>';
  echo '<a href="signup.php">戻る</a>';
  die;
}

// 登録されていなければinsert 
$sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
$stmt = $pdo->prepare($sql);
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $passwordHash);
$stmt->execute();
//redirect('singin.php');
// header('Location: singin.php');
?>

<h1>会員登録が完了しました</h1>
<a href="signin.php">戻る</a>
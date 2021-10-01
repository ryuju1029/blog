<?php
require_once(__DIR__ . '/Dao/BlogDao.php');
$contents = filter_input(INPUT_POST, "content");
$title = filter_input(INPUT_POST, "title");
$id = filter_input(INPUT_POST, "id");
$blogDao = new BlogDao();
$blogDao->update($title, $contents, $id);
header('Location: mypage.php');
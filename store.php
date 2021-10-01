<?php
require_once(__DIR__ . '/Dao/BlogDao.php');
require_once('redirect.php');
session_start();

$contents = filter_input(INPUT_POST, "contents");
$title = filter_input(INPUT_POST, "title");
$userId = $_SESSION['id'];
$blogDao =  new BlogDao();
$blogDao->create($contents,$title,$userId);

redirect('mypage.php');

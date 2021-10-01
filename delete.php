<?php
require_once(__DIR__ . '/Dao/BlogDao.php');
$id = filter_input(INPUT_GET, "id");
$blogDao = new BlogDao();
$blogDao->delete($id);
header('Location: mypage.php');

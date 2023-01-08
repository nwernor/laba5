<?php

$id = $_GET['id'];
if (!isset($id)){
    die('Нужно передать id');
}

$db = new PDO('mysql:dbname=blog;host=127.0.0.1;port=3306', 'root');
$post = $db->query('DELETE FROM posts WHERE id = ' . $id, PDO::FETCH_OBJ)->execute();
header('Location: list.php');
    exit(0);
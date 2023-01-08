<?php
$id = $_GET['id'];
if (!isset($id)){
    die('Нужно передать id');
}
$db = new PDO('mysql:dbname=blog;host=127.0.0.1;port=3306', 'root');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $statement = $db->query('UPDATE posts SET title = \'' . $title . '\', content = \'' . $content . '\' WHERE id = ' . $id, PDO::FETCH_OBJ);
    $statement->execute();
    header('Location: index.php?id='.$id);
    exit(0);
}
else{
    $post = $db->query('SELECT * FROM posts WHERE id = ' . $id, PDO::FETCH_OBJ)->fetch();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить</title>
</head>
<body>
    <form method="post">
        <input placeholder="Заголовок" name="title" value="<?=$post->title?>" type="text">
        <input placeholder="Контент" name="content" value="<?=$post->content?>" type="text">
        <input value="Изменить" type="submit">
    </form>
</body>
</html>
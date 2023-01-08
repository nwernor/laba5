<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $db = new PDO('mysql:dbname=blog;host=127.0.0.1;port=3306', 'root');
    $statement = $db->query('INSERT INTO posts (title, content) VALUES (\'' . $title . '\', \'' . $content . '\')', PDO::FETCH_OBJ);
    $statement->execute();
    header('Location: index.php?id='.$db->lastInsertId());
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать</title>
</head>
<body>
    <form method="post">
        <input placeholder="Заголовок" name="title" type="text">
        <input placeholder="Контент" name="content" type="text">
        <input value="Создать" type="submit">
    </form>
</body>
</html>
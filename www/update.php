<?php

require_once('../db_config.php');

if (isset($_POST['updateRecord'])) {

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_UNSAFE_RAW);
    $author = filter_var($_POST['author'], FILTER_UNSAFE_RAW);
    $genre = filter_var($_POST['genre'], FILTER_UNSAFE_RAW);
    $publisher = filter_var($_POST['publisher'], FILTER_UNSAFE_RAW);
    $query = "UPDATE books SET Title=:title, Author=:author, Genre=:genre, height=:height, publisher=:publisher
WHERE id=:id";
$result = $db_connection->prepare($query);
$result->execute([
'title' => $title,
'author' => $author,
'genre' => $genre,
'height' => $height,
'publisher' => $publisher,
'id' => $id, 
]);

$rows = $result->rowCount();
if ($rows == 1) {
     header('Location: list-books.php');
}else {
    $error_message ="Updating record failed";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create a Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<br>
<div class="container">
<?php 
if (isset($error_message)) {
?>
<div class="alert alert-success">
<strong>Error!</strong>
<?php echo $error_message; ?>
</div>
<?php
}
?>
</div>
</body>
</html>
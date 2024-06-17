<?php

require_once('../db_config.php');
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id = :id LIMIT 1";
$result = $db_connection->prepare($query);
$result->execute([
    'id' => $id
]);
$result = $result->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit a Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<br>
<div class="container">
<form method="post" action="update.php">
<div class="form-group row">
<label for="id" class="clo-sm-2 col-form-label">ID</lable>
<div class="col-sm-10">
<input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $result['id'] ?>">
</div>
</div>
<div class="form-group row">
<label for="title" class="clo-sm-2 col-form-label">Title</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="title" name="title" value="<?php echo $result['title'] ?>">
</div>
</div>
<div class="form-group row">
<label for="author" class="clo-sm-2 col-form-label">Author</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="author" name="author" value="<?php echo $result['author'] ?>">
</div>
</div>
<div class="form-group row">
<label for="genre" class="clo-sm-2 col-form-label">Genre</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="genre" name="genre" value="<?php echo $result['genre'] ?>">
</div>
</div>
<div class="form-group row">
<label for="height" class="clo-sm-2 col-form-label">Height</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="height" name="height" value="<?php echo $result['height'] ?>">
</div>
</div>
<div class="form-group row">
<label for="publisher" class="clo-sm-2 col-form-label">Publisher</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $result['publisher'] ?>">
</div>
</div>
<button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>
</form>

</div>

</body>

</html>
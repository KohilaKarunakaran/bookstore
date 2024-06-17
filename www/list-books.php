<?php

require_once('../db_config.php');

    $query = "SELECT * FROM books";

    $results = $db_connection->query($query);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Books</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
    </head>

    <body>
        <div class="container">
            <h1 class="display-1 text-center">Bookstore</h1>
            <a href="create2.php" class="btn btn-info">Add new book</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>AUTHOR</th>
                        <th>GENRE</th>
                        <th>HEIGHT</th>
                        <th>PUBLISHER</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
</tr>
</thead>
<tbody>
<?php

foreach ($results as $result) {
?>
<tr>
<td>
<?php echo $result['title'] ?>
</td>
<td>
<?php echo $result['author'] ?>
</td>
<td>
<?php echo $result['genre'] ?>
</td>
<td>
<?php echo $result['height'] ?>
</td>
<td>
<?php echo $result['publisher'] ?>
</td>
<td>
<a href="edit.php?id=<?php echo $result['id'] ?>"><i class = "fas fa-edit"></i></a>
</td>
<td>
<a href="delete.php?id=<?php echo $result['id'] ?>"><i class = "fas fa-trash-alt"></i></a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
    </body>
    </html>
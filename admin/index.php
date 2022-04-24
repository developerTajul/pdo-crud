<?php 
require_once("config.php");

$stat = $con->prepare("SELECT * FROM employees");
$stat->execute();
$users = $stat->fetchAll( PDO::FETCH_ASSOC );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employees List</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Salary</th>
                <th>City</th>
                <th>Country</th>
                <th></th>
            </tr>

            <?php 
             foreach( $users as $value ): ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['gender']; ?></td>
                <td><?php echo $value['salary']; ?></td>
                <td><?php echo $value['city']; ?></td>
                <td><?php echo $value['country']; ?></td>
                <td><a href="edit.php?edit_id=<?php echo $value['id']; ?>">Edit</a> | <a href="delete.php?delete_id=<?php echo $value['id']; ?>">Delete</a></td>
            </tr>
            <?php 
            endforeach; ?>
        </table>
    </body>
</html>
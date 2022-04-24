<?php 
require_once("config.php");
if( isset( $_GET['edit_id'] ) ){
    $current_id = $_GET['edit_id'];
    $stat = $con->prepare("SELECT * FROM employees WHERE id=:current_id");
    $stat->bindParam(':current_id', $current_id, PDO::PARAM_INT);
    $stat->execute();
    $user = $stat->fetch( PDO::FETCH_OBJ );
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Employees List</title>
    </head>
    <body>
       <h1>This is Edit PHP</h1>
    </body>
</html>
<?php 
require_once("config.php");

/**
 * Select Query
 */
$country = "UK";
$select_query = $con->prepare("SELECT * FROM employees WHERE country= :country ");
$select_query->bindParam(':country', $country, PDO::PARAM_STR);
$select_query->execute();
$all_posts = $select_query->fetchAll( PDO::FETCH_ASSOC );

/**
 * Insert Query
 */
if( isset( $_POST['reg_info'] ) ){
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $gender     = $_POST['gender'];
    $salary     = (int)$_POST['salary'];
    $city       = $_POST['city'];
    $country    = $_POST['country'];

    

    var_dump( $salary );

    // $insert_q = $con->prepare("INSERT INTO employees (name, email) VALUES('{$name}', '{$email}')");
    $insert_q = $con->prepare("INSERT INTO employees (name, email, gender, salary, city, country) VALUES(:name, :email, :gender, :salary, :city, :country )");
    $insert_q->bindParam(':name', $name, PDO::PARAM_STR);
    $insert_q->bindParam(':email', $email, PDO::PARAM_STR);
    $insert_q->bindParam(':gender', $gender, PDO::PARAM_STR);
    $insert_q->bindParam(':salary', $salary, PDO::PARAM_INT);
    $insert_q->bindParam(':city', $city, PDO::PARAM_STR);
    $insert_q->bindParam(':country', $country, PDO::PARAM_STR);
    $insert_q->execute();
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Form</title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Your Name"><br />
            <input type="email" name="email" placeholder="Your Email Address..."><br />

            Gender:
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="other">Other
            <br />
            <input type="text" name="salary" placeholder="Salary"><br />
            <input type="text" name="city" placeholder="City Name"><br />
            <input type="text" name="country" placeholder="Country Name"><br />
            <input type="submit" value="Submit" name="reg_info">
        </form>
    </body>
</html>
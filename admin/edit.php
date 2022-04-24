<?php 
require_once("config.php");
if( isset( $_GET['edit_id'] ) ){
    $current_id = $_GET['edit_id'];
    $stat = $con->prepare("SELECT * FROM employees WHERE id=:current_id");
    $stat->bindParam(':current_id', $current_id, PDO::PARAM_INT);
    $stat->execute();
    $user = $stat->fetch( PDO::FETCH_OBJ );
}

if( isset( $_POST['update_reg_info']) ){
    $name       = $_POST['update_name'];
    $email      = $_POST['update_email'];
    $gender     = $_POST['update_gender'];
    $salary     = ( int ) $_POST['supdate_salary'];
    $city       = $_POST['update_city'];
    $country    = $_POST['update_country'];

    $update_sql = $con->prepare("UPDATE employees SET name = :name, email = :email, gender = :gender, salary = :salary,  city = :city, country = :country WHERE id=:current_id");
    $update_sql->bindParam(':name', $name, PDO::PARAM_STR);
    $update_sql->bindParam(':email', $email, PDO::PARAM_STR);
    $update_sql->bindParam(':gender', $gender, PDO::PARAM_STR);
    $update_sql->bindParam(':salary', $salary, PDO::PARAM_INT);
    $update_sql->bindParam(':city', $city, PDO::PARAM_STR);
    $update_sql->bindParam(':country', $country, PDO::PARAM_STR);
    $update_sql->bindParam(':current_id', $current_id, PDO::PARAM_STR);
    $update_sql->execute();

    header("Location: index.php");
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
            <input type="text" name="update_name" value="<?php echo $user->name; ?>" placeholder="Your Name"><br />
            <input type="email" name="update_email" value="<?php echo $user->email; ?>" placeholder="Your Email Address..."><br />
            Gender:
            <input type="radio" name="update_gender" <?php if( $user->gender == 'female'){ echo "checked"; } ?> value="female">Female
            <input type="radio" name="update_gender" selected value="male" <?php if( $user->gender == 'male'){ echo "checked"; } ?>>Male
            <input type="radio" name="update_gender" value="other" <?php if( $user->gender == 'other'){ echo "checked"; } ?>>Other
            <br />
            <input type="text" name="supdate_salary" value="<?php echo $user->salary; ?>" placeholder="Salary"><br />
            <input type="text" name="update_city" value="<?php echo $user->city; ?>" placeholder="City Name"><br />
            <input type="text" name="update_country" value="<?php echo $user->country; ?>" placeholder="Country Name"><br />
            <input type="submit" value="Submit" name="update_reg_info">
        </form>
    </body>
</html>
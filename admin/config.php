<?php 
try{
    $dsn        = "mysql:host=localhost; dbname=sql_test";
    $username   = "root";
    $password   = "";
    
    $con = new PDO($dsn, $username, $password);

}catch( PDOException $e ){
    echo $e->getMessage();
}
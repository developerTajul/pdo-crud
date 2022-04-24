<?php 
require_once("config.php");

if( isset( $_GET['delete_id'] ) ){
    $current_id = $_GET['delete_id'];
    $stat = $con->prepare("DELETE FROM employees WHERE id = :current_id");
    $stat->bindParam(':current_id', $current_id, PDO::PARAM_INT );
    $stat->execute();
    header("Location: index.php");
}
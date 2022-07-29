<?php 
session_start();
require '../includes/db_connection.php';


if(!isset($_SESSION['get_uname'])){
    header("location:../../index.php"); //login page
}
else {
    //
}


?>
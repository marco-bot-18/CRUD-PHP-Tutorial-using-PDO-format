<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','test_db');

try{
    $conn = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e){
    exit("Error: " . $e->getMessage());
}

$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
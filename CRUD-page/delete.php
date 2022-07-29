<?php
require 'includes/session.php';

error_reporting(E_ALL);

$id = $_GET['person_id'];

try{
    $sql = "DELETE FROM tbl_persons WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);

    if($query->execute()) {
        echo "<script>alert('Record Deleted Successfully!');
                window.location=document.referrer;
            </script>";
    }
}

catch(PDOException $ex){
    $ex->getMessage();
}
    
?>
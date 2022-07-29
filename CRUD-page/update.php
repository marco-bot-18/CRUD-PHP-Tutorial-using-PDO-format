<?php
require 'includes/session.php';

error_reporting(E_ALL);

//date and time
date_default_timezone_set('Asia/Manila');
$timestamp = time();

if(isset($_POST['update'])){
    $id = $_POST['person_id'];
    $firstname = ucwords($_POST['firstname']);
    $middlename = ucwords($_POST['middlename']);
    $lastname = ucwords($_POST['lastname']);
    $birthday = $_POST['bday'];
    $gender = $_POST['gender'];
    $date_time_modified = date("F d, Y")." at ".date("h:i:s A");

    try {
        $sql = "UPDATE tbl_persons 
            SET fname=:firstname,
            mname=:middlename, 
            lname=:lastname, 
            bday=:birthday, 
            gender=:gender, 
            date_added_modified=:date_time_modified 
            WHERE id=:id";
        $query = $conn->prepare($sql);
        $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindParam(':middlename', $middlename, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':date_time_modified', $date_time_modified, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);

        if($query->execute()){
            echo "<script>alert('Record Updated Successfully!');
                    window.location=document.referrer;
                </script>";
        }

    }
    catch(PDOException $ex){
        $ex->getMessage();
    }
}
?>
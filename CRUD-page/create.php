<?php 
require 'includes/session.php';

error_reporting(E_ALL);

//date and time
date_default_timezone_set('Asia/Manila');
$timestamp = time();

if(isset($_POST['create'])){
    $firstname = ucwords($_POST['firstname']);
    $middlename = ucwords($_POST['middlename']);
    $lastname = ucwords($_POST['lastname']);
    $birthday = $_POST['bday'];
    $gender = $_POST['gender'];
    $date_time_created = date("F d, Y")." at ".date("h:i:s A");

    try {
        $sql = "INSERT INTO tbl_persons(fname, mname, lname, bday,  gender, date_added_modified)
            VALUES (:firstname, :middlename, :lastname, :birthday, :gender, :date_time_created)";
        $query = $conn->prepare($sql);
        $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindParam(':middlename', $middlename, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':date_time_created', $date_time_created, PDO::PARAM_STR);

        if($query->execute()) {
            echo "<script>alert('Record Inserted Successfully!');
                    window.location=document.referrer;
                </script>";
        }
        else{
            echo $conn->errorInfo();
        }
    }

    catch (PDOException $ex) {
        $ex->getMessage();
    }

}

?>
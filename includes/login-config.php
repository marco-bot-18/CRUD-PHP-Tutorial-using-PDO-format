<?php
require 'db_connection.php';
session_start();

if(isset($_REQUEST['btn_login'])){
    $username = $_POST['txt_username'];
    $password = md5($_POST['txt_password']);

    try{
        $sql = "SELECT * FROM tbl_user WHERE username=:username and password=:password";
        $query = $conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0) {
            foreach($results as $res){
                $_SESSION['get_uname'] = $res->username;
                $_SESSION['get_pword'] = $res->password;
            }
            header("location: ../CRUD-page/view.php");
        }
        else{
            $_SESSION['err_message'] = "Invalid Credentials!";
            header("location: ../index.php");
        }
    }
    catch(PDOException $ex){
        $ex->getMessage();
    }
}

?>
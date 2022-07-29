<?php require 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDO</title>

  <!-- ccs links, cdns -->
  <?php require 'includes/css-links.php'; ?>

</head>
<body>
  <!-- Navbar -->
  <nav class="navbar sticky-top bg-dark">
    <div class="container-fluid"><span class="text-white">Log In</span></div>
  </nav>
  <div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
      <!-- form start -->
      <form action="includes/login-config.php" method="POST">

        <!-- ERROR MESSAGE -->
        <?php
          if(isset($_SESSION['err_message'])){
            echo "<div class='alert alert-danger' role='alert'>".$_SESSION['err_message']."</div>"; 
          }
          unset($_SESSION['err_message']);
        ?>
        
        <!-- Username input -->
        <div class="form-outline mb-4">
          <input type="text" id="form2Example1" name="txt_username" class="form-control" required />
          <label class="form-label" for="form2Example1">Username</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="txt_password" id="form2Example2" class="form-control" required />
          <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- Submit button -->
        <button type="submit" name="btn_login" class="btn btn-dark btn-block mb-4">Sign in</button>
      
      </form> <!-- form end -->
    </div>
  </div>

</body>


  <?php require 'includes/scripts.php' ?> <!-- js links, cdns  -->
</html>
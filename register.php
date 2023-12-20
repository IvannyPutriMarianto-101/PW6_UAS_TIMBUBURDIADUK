<?php

include 'connect.php';  

$con = new mysqli('localhost','id21684036_epicblinkzz','Cicakmati15*','id21684036_db_epicblinkzz');

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    // Use prepared statements to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

    // Bind parameters
    $stmt->bind_param('sss', $username, $email, $password);

    // Execute the statement
    $stmt->execute();

    $message[] = 'registered successfully!';
    header('location: login.php');
}

// Close the MySQLi connection
$con->close();

?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="style_form.css" />
    <title>EpicBlinkz | Register</title>
   <link rel="icon" href="img/favicon.png">
  </head>
  <body>
    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <!----------------------- Login Container -------------------------->

      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #212121">
          <div class="featured-image mb-3">
            <img src="img/favicon.png" class="img-fluid" style="width: 250px" />
          </div>
          <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600" >Be Verified</p>
          <small class="text-white text-wrap text-center mb-3" style="width: 17rem; font-family: 'Courier New', Courier, monospace"> Welcome back! Please enter your login information to proceed.</small>
        </div>

        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2 style="text-align: center;">Hello,Again</h2>
              <p  style="text-align: center;">We are happy to have you back.</p>
            </div>
            <form method="post" class="form" action="">
            <div class="input-group mb-3">
             <input  type="text" name="username" class="form-control form-control-lg bg-light fs-6"  autocomplete="on" placeholder="enter your username" required>
            </div>
            <div class="input-group mb-3">
             <input type="email" name="email" class="form-control form-control-lg bg-light fs-6"   autocomplete="on" placeholder="enter your email" required>
            </div>
            <div class="input-group mb-3">
               <input type="password" name="password" class="form-control form-control-lg bg-light fs-6"  placeholder="enter your password"required>
            </div>
            <div class="input-group mb-3">
            <input type="password" name="cpassword" class="form-control form-control-lg bg-light fs-6"  placeholder="confirm your password"required>
            </div>
            <div class="input-group mb-3">
            <input class="btn btn-lg btn-primary w-100 fs-6"type="submit" name="submit" value="Register now" class="btn">
            </div>
            </form>
            <div class="row">
              <small>already have an account? <a href="login.php">Login Now</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

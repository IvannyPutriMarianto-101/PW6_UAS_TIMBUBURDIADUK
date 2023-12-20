<?php

include 'connect.php';
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Assuming $con is your MySQLi connection variable
    // Replace 'your_mysql_username', 'your_mysql_password', and 'your_mysql_database' with your actual MySQL credentials
    $con = new mysqli('localhost','id21684036_epicblinkzz','Cicakmati15*','id21684036_db_epicblinkzz');

    // Check the connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Use prepared statements to avoid SQL injection
    $stmt = $con->prepare("SELECT id, username, email, password FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $email, $password); // Adjust this line based on your actual database columns
        $stmt->fetch();

        $_SESSION['user_id'] = $id;
        header('location: shop.php');
    } else {
        $message[] = 'Incorrect password or email!';
    }

    // Close the MySQLi statement and connection
    $stmt->close();
    $con->close();
}

?>

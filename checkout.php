<?php

@include 'connect.php';
session_start();
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;


if(isset($_POST['order_btn'])){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM cart");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO orders(name,number, email, method, flat, street, city, province, country, pin_code, total_product,  price_total) VALUES('$name','$number','$email','$method','$flat','$street','$city','$province','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$province.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EpicBlinkz | Checkout</title>
    <link rel="icon" href="img/favicon.png">

   <script src="https://unpkg.com/feather-icons"></script>


   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style_order.css">

</head>
<body>

<div class="container">
    <nav class="navbar">
        <ul class="nav-links">
            <li class="nav-link">
                <a href="shop.php" class="navbar-logo"><img src="img/favicon.png" alt="" style="width: 20px" height="20px"> Epic<span>Blinkz</span>.</a>
            </li>
            
            <li class="nav-link">
                <a href="shop.php#shopping-cart"><i data-feather="shopping-cart"></i></a>
            </li>
            <li class="nav-link services">
                <a><i data-feather="user"></i></a>

                <?php
                // Establish a connection to MySQL using MySQLi
                $con = new mysqli('localhost','id21684036_epicblinkzz','Cicakmati15*','id21684036_db_epicblinkzz');

                // Check the connection
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                // Your user selection code
                if (isset($con)) {
                    $select_user = $con->prepare("SELECT * FROM users WHERE id = ?");
                    $select_user->bind_param('i', $user_id);
                    $select_user->execute();
                    $result = $select_user->get_result();

                    if ($result->num_rows > 0) {
                        // Fetch the user information
                        $fetch_user = $result->fetch_assoc();
                    }
                } else {
                    echo "Database connection is not available.";
                }
                ?>

                <ul class="drop-down">
                    <?php if (isset($fetch_user)): ?>
                        <li>Username: <span><?php echo $fetch_user['username']; ?></span></li>
                        <li>Email: <span><?php echo $fetch_user['email']; ?></span></li>
                        <li><a href="login.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to logout?');" class="delete-btn-user">Logout</a></li>
                    <?php else: ?>
                        <li>User information not available</li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    </nav>
</div>


<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
    <?php
    
    $conn = new mysqli('localhost','id21684036_epicblinkzz','Cicakmati15*','id21684036_db_epicblinkzz');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
    $total = 0;
    $grand_total = 0;

    if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
            ?>
            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
            <?php
        }
    } else {
        echo "<div class='display-order'><span>Your cart is empty!</span></div>";
    }

    // Close the MySQLi connection
    $conn->close();
    ?>
    <span class="grand-total"> Grand total: $<?= $grand_total; ?>/- </span>
</div>


      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Medan" name="city" required>
         </div>
         <div class="inputBox">
            <span>province</span>
            <input type="text" placeholder="e.g. Sumatera Utara" name="province" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Indonesia" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<script>
      feather.replace();
</script>
   
</body>
</html>
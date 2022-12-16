<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['house'] .', '.$_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      $message[] = 'Order placed successfully!';
   }else{
      $message[] = 'Your cart is empty';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   

   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

   <section class="checkout-orders">
      <form action="" method="POST">
      <h3>Your orders</h3>
         <div class="display-orders">
            <?php
               $grand_total = 0;
               $cart_items[] = '';
               $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
               $select_cart->execute([$user_id]);
               if($select_cart->rowCount() > 0){
                  while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                     $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
                     $total_products = implode($cart_items);
                     $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
            ?>
               <p> <?= $fetch_cart['name']; ?> <span>(<?= '$'.$fetch_cart['price'].' x '. $fetch_cart['quantity']; ?>)</span> </p>
            <?php
                  }
               }else{
                  echo '<p class="empty">your cart is empty!</p>';
               }
            ?>
               <input type="hidden" name="total_products" value="<?= $total_products; ?>">
               <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
               <div class="grand-total"> Total : <span>₱<?= $grand_total; ?></span></div>
         </div>

         <h3>Place your orders</h3>

         <div class="flex">
            <div class="inputBox">
               <span>Your name :</span>
               <input type="text" name="name" placeholder="Enter your name" class="box" maxlength="20" required>
            </div>
            <div class="inputBox">
               <span>Your number :</span>
               <input type="number" name="number" placeholder="Enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
            </div>
            <div class="inputBox">
               <span>Your email :</span>
               <input type="email" name="email" placeholder="Enter your email" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>Payment method :</span>
               <select name="method" class="box" required>
                  <option value="Cash on delivery">Cash on Delivery</option>
                  <option value="Credit card">Credit Card</option>
                  <option value="Paypal">PayPal</option>
               </select>
            </div>
            <div class="inputBox">
               <span>House Number :</span>
               <input type="text" name="house" placeholder="House Number" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>Street :</span>
               <input type="text" name="street" placeholder="Street" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>City :</span>
               <input type="text" name="city" placeholder="City" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>State :</span>
               <input type="text" name="state" placeholder="State" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>Country :</span>
               <input type="text" name="country" placeholder="Country" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>Pin code :</span>
               <input type="number" min="0" name="pin_code" placeholder="Zip Code" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" class="box" required>
            </div>
         </div>
         <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="Place order">
      </form>
   </section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
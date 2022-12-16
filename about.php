<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
   <?php include 'components/user_header.php'; ?>

   <section class="about">
      <div class="row">

         <div class="image">
            <img src="images/logo.gif" alt="">
         </div>
         <div class="content">
            <h3>About Us</h3>
            <p>REALDEALS is a computer peripheral retail business founded on the values of convenience, accessibility, and excellent customer service. Believe it or not, this leader in local technology retail had pretty humble beginnings – when five friends who were passionate about tech hunted down secondhand PCs in the Tipid PC online group to resell at decent rates. REALDEALS officially got its name when we opened our first store in Tokyo in September 2022. A play on the expression Real-Deal, the name was a key step in building a brand that promises reliable services and quality products. Eventually, we shifted to selling brand new products at accessible prices.</p>
            <a href="contact.php" class="btn">Contact us</a>
         </div>
      </div>
   </section>


<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>

</body>
</html>
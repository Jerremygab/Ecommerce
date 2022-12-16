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
   <title>Home</title>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
   <?php include 'components/user_header.php'; ?>

   <section class="about">
      <div class="row">
         <div class="content">
         <br>
            <br>
            <br>
               <h3>WELCOME TO REAL DEALS</h3>
               <p>Play With Style. Best Gaming Experience.</p>
               <a href="shop.php" class="btn">Shop Now</a>
         </div>
         <div class="image">
            <br>
            <br>
            <br>
               <img src="images/allp.png">
         </div>
      </div>
   </section>


   <section class="category">
      <br>
      <br>
      <br>
      <br>
      <h1 class="heading">Category</h1>

      <div class="scontainer">
         <div class="row row2">

            <a href="category.php?category=keyboard" class="col-4">
               <img src="images/keyboard.png" alt="">
               <h2>KEYBOARD</h2>
            </a>

            <a href="category.php?category=mouse" class="col-4">
               <img src="images/mouse.png" alt="">
               <h2>MOUSE</h2>
            </a>

            <a href="category.php?category=microphone" class="col-4">
               <img src="images/mic.png" alt="">
               <h2>MICROPHONE</h2>
            </a>

            <a href="category.php?category=headset" class="col-4">
               <img src="images/headset.png" alt="">
               <h2>HEADSET</h2>
            </a>

            <a href="category.php?category=speaker" class="col-4">
               <img src="images/speaker.png" alt="">
               <h2>SPEAKER</h2>
            </a>

            <a href="category.php?category=webcam" class="col-4">
               <img src="images/web.png" alt="">
               <h2>WEBCAM</h2>
            </a>
            <a href="category.php?category=webcam" class="col-4">
               <img src="images/controller.png" alt="">
               <h2>CONTROLLERS</h2>
            </a>
            <a href="shop.php" class="col-4">
               <img src="images/allp.png" alt="">
               <h2>ALL PRODUCTS</h2>
            </a>
         </div>
      </div>
</section>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>


</body>
</html>
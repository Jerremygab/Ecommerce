<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quick view</title>
   

   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="quick-view">

   <h1 class="heading">Quick view</h1>

   <?php
     $pid = $_GET['pid'];
     $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?"); 
     $select_products->execute([$pid]);
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="images/<?= $fetch_product['image_01']; ?>" alt="">
            </div>
            <div class="sub-image">
               <img src="images/<?= $fetch_product['image_01']; ?>" alt="">
               <img src="images/<?= $fetch_product['image_02']; ?>" alt="">
               <img src="images/<?= $fetch_product['image_03']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><?= $fetch_product['name']; ?></div>
            <div class="flex">
               <div class="price"><span>₱</span><?= $fetch_product['price']; ?><span>/-</span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details"><?= $fetch_product['details']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               <input class="option-btn" type="submit" name="add_to_wishlist" value="add to wishlist">
            </div>
         </div>
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">No products added yet!</p>';
   }
   ?>
</section>
<section class="products">

   <h1 class="heading">You May Also Like</h1>

   <div class="box-container">
   
   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY RAND() LIMIT 4"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
         <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>">
         <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
         <div class="name"><input type="hidden" name="name" value="<?= $fetch_product['name']; ?>"></div>
         <div class="price"><input type="hidden" name="price" value="<?= $fetch_product['price']; ?>"></div>
         <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
         <img src="images/<?= $fetch_product['image_01']; ?>" alt="">
         <div class="name"><?= $fetch_product['name']; ?></div></a>
            <div class="flex">
               <div class="price"><span>₱</span><?= $fetch_product['price']; ?></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">No products found!</p>';
   }
   ?>

   </div>
</section>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
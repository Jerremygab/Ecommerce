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
   <title>Category</title>
   

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
   <?php include 'components/user_header.php'; ?>

   <section class="products">
      <h1 class="heading">Category</h1>
      <div class="box-container">

      <?php
      $category = $_GET['category'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$category}%'"); 
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>">
         <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
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
         echo '<p class="empty">no products found!</p>';
      }
      ?>

      </div>
   </section>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
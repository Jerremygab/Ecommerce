<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_user = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_user->execute([$delete_id]);
   $delete_orders = $conn->prepare("DELETE FROM `orders` WHERE user_id = ?");
   $delete_orders->execute([$delete_id]);
   $delete_messages = $conn->prepare("DELETE FROM `messages` WHERE user_id = ?");
   $delete_messages->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:users_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search accounts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">user accounts</h1>
   <section class="search-form">
      <form action="" method="post">
         <input type="text" name="search_box" placeholder="Search Users" maxlength="100" class="box" required>
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>
   </section>
   
   <div class="box-container">

   
   <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_accounts = $conn->prepare("SELECT * FROM `users` WHERE name LIKE '%{$search_box}%'"); 
     $select_accounts = $conn->prepare("SELECT * FROM `users` WHERE email LIKE '%{$search_box}%'"); 
     $select_accounts->execute();
     if($select_accounts->rowCount() > 0){
      while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> user id : <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> username : <span><?= $fetch_accounts['name']; ?></span> </p>
      <p> email : <span><?= $fetch_accounts['email']; ?></span> </p>
      <a href="users_accounts.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account? the user related information will also be delete!')" class="delete-btn">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No Accounts found!</p>';
      }
   }
   ?>

   </div>

</section>

<script src="../js/script.js"></script>
<script src="../js/admin_script.js"></script>
   
</body>
</html>
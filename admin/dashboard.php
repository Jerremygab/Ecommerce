<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="dashboard">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
   <h1 class="heading">Dashboard</h1>
      <br>
      <br>
      <br>
   <div class="box-container">

      <div class="box">
         <h3>Welcome!</h3>
         <a href="update_profile.php" class="btn">Update profile</a>
      </div>

      <div class="box">
         <h3>Regular users</h3>
         <a href="users_accounts.php" class="btn">See users</a>
      </div>

      <div class="box">
         <h3>Admin users</h3>
         <a href="admin_accounts.php" class="btn">See admins</a>
      </div>

      <div class="box">
         <h3>messages</h3>
         <a href="messages.php" class="btn">See messages</a>
      </div>

      <div class="box">
         <h3>Placed Orders</h3>
         <a href="placed_orders.php" class="btn">See orders</a>
      </div>

      <div class="box">
         <h3>all Products</h3>
         <a href="products.php" class="btn">See products</a>
      </div>

   </div>

</section>
<script src="../js/admin_script.js"></script>
   
</body>
</html>
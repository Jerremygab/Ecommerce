<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'Already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'Sent message successfully!';

   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section>

    <div class="container1">
        <div class="content1">
          <div class="left-side">
            <div class="address details">
              <i class="fas fa-map-marker-alt"></i>
              <div class="topic">Address</div>
              <div class="text-one">REAL DEALS, JAPAN</div>
              <div class="text-two">2-32-4 Nishinomiyahama Nishinomiya Hyogo Japan</div>
            </div>
            <div class="phone details">
              <i class="fas fa-phone-alt"></i>
              <div class="topic">Phone</div>
              <div class="text-one">(+63)998 1234 567</div>
              <div class="text-two">(+63)902 9876 321</div>
            </div>
            <div class="email details">
              <i class="fas fa-envelope"></i>
              <div class="topic">Email</div>
              <div class="text-one">realdeals@gmail.com</div>
              <div class="text-two">info@realdealsglobal.com</div>
            </div>
          </div> 
          <div class="right-side">
              <div class="topic-text">Send us a message</div>
            <form action="#" method="post">
              <div class="input-box">
                <input type="text" name="name" placeholder="Enter your name" required maxlength="20">
              </div>
              <div class="input-box">
                <input type="email" name="email" placeholder="Enter your email" required maxlength="50">
              </div>
              <div class="input-box">
                  <input type="number" name="number" min="0" max="9999999999" placeholder="Enter your number" required onkeypress="if(this.value.length == 10) return false;" class="box">
                </div>
              <div class="input-box message-box">
                <input type="text" name="msg" placeholder="Enter your Message">
              </div>
              <div class="button">
              <input type="submit" value="send message" name="send" class="btn">
              </div>
            </form>
        </div>
      </div>
    </div>
 </section>
<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>



</body>
</html>
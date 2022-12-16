<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'Incorrect username or password!';
   }

}
if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'Email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'Registered successfully, Login now please!';
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section>
<section class="about">
    <div class="row">
    <div class="image">
            <img src="images/pc.png">
        </div>
        <div class="content">
        <div class="form-cont">
                        <div class="form-btn">
                            <span onclick="login()"><h2>Login</h2></span>
                            <span onclick="register()"><h2>Register</h2></span>
                            <hr id="indicator">
                        </div>

                        <form id="login"  method="post">
                           <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                           <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                           <input type="submit" value="Login now" class="btn" name="submit">
                           <br>
                           <a href="">Forgot Password</a>
                        </form>
                        <form id="register" method="post">
                           <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box">
                           <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                           <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                           <input type="password" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                           <input type="submit" value="Register now" class="btn" name="submit">
                        </form>
                    </div>
         </div>
</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>
<script>
        var LoginForm = document.getElementById("login");
        var RegForm = document.getElementById("register");
        var Indicator= document.getElementById("indicator");

            function register(){
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
     </script>

</body>
</html>
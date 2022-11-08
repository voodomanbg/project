<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $uname = mysqli_real_escape_string($conn, $_POST['name']);
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   

   $select = " SELECT * FROM user_from WHERE mail = '$email' OR username = '$uname' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0)
   {

      $error[] = 'user already exist!';

   }
   else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_from(username, fname, lname, mail, password) VALUES ('$uname','$fname','$lname','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Hello World</title>
    </head>
    <body>
        <div class="form-container">

            <form action="" method="post">
               <h3>register now</h3>
               <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               };
               ?>
               <br> <br>
               <label for="name">Username: </label>
               <input type="text" name="name" required placeholder="enter your Username"> <br> <br>
               <label for="fname">First Name: </label>
               <input type="text" name="fname" required placeholder="enter your fName">
               <label for="lname">Last Name: </label>
               <input type="text" name="lname" required placeholder="enter your lName"> <br> <br>
               <label for="email">E-mail: </label>
               <input type="email" name="email" required placeholder="enter your email"> <br> <br>
               <label for="password">Password: </label>
               <input type="password" name="password" required placeholder="enter your password"> <br> <br>
               <label for="cpassword">Confirm Password: </label>
               <input type="password" name="cpassword" required placeholder="confirm your password"> <br> <br>
               <input type="submit" name="submit" value="register now" class="form-btn"> <br>
               <p>already have an account? <a href="login_form.php">login now</a></p>
            </form>
         
         </div>
    </body>
</html>
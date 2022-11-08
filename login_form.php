<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{

   //$name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   //$cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user_from WHERE mail = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_name'] = $row['username'];  //ses username
        header('location:user_page.php');
    }
    else
    {
      $error[] = 'incorrect email or password!';
    }

};
?>

<!doctype html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>  
        <div class="form-container">
            <form action="" method="post">
                <h3>login now</h3>
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                    ?>
                <br> <br>
                <input type="email" name="email" required placeholder="enter your email">
                <input type="password" name="password" required placeholder="enter your password">
                <input type="submit" name="submit" value="login now" class="form-btn">
                <p>don't have an account? <a href="index.php">register now</a></p>
            </form>

        </div>
    </body>
</html>
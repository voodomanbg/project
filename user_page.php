<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <div class="container">
            <div class="content">
            <h3>Hello, <span>there</span></h3>
            <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <a href="edit_profile.php" class="btn">Edit Profile</a>
            <a href="api.php" class="btn">API</a>
            <a href="logout.php" class="btn">logout</a>
            </div>
        </div> 
    </body>
</html>

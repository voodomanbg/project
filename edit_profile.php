<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{
    $username = $_SESSION['user_name'];
    $fname = mysqli_real_escape_string($conn, $_POST['nfname']);
    $lname = mysqli_real_escape_string($conn, $_POST['nlname']);
    $select = " UPDATE user_from SET fname = '$fname', lname = '$lname' WHERE username = '$username' ";

    $result = mysqli_query($conn, $select);

}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <div class="container">
            <div class="content">
            <h3>Dear user:</h3>
            <?php echo $_SESSION['user_name'] ?></span></h1>
            <h3>Provide us with new names</h3>
            </div>
        </div>

        <div class ="form-container">
            <form action="" method="post">
            <label for="nfname">New First Name: </label>
            <input type="text" name="nfname" required placeholder="enter new First name"> <br> <br>
            <label for="nlname">New Last Name: </label>
            <input type="text" name="nlname" required placeholder="enter new Last name"> <br> <br>
            <input type="submit" name="submit" value="Change Names" class="form-btn"> <br> <br>
            <a href="user_page.php">back to user page</a>
            </form>
        </div>
    </body>
</html>
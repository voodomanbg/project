<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <h2>Users Data:</h2> <br>
        <?php
            @include 'config.php';
            $sql = "SELECT username, fname, lname FROM user_from";
            $result = mysqli_query($conn,$sql);
            $emparray = array();
            while($row = mysqli_fetch_assoc($result))
            {
                $emparray[] = $row;
            }
            echo json_encode($emparray);
        ?>       
        <br><a href="user_page.php">back to user page</a>
    </body>
    
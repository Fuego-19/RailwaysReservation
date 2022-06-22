<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Success</title>
    </head>
    <body>
        <h2> Successfully Signed Up </h2>
        You have successfully signed up. Your User ID is <?php echo $_SESSION['uid']?>. Use The ID and regestired password to 
        <a href="LogIn.php">Log In</a>
    </body>
</html>
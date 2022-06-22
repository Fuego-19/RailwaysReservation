<?php
    session_start();
    include "Connection.php";

    // if(isset($_SESSION['uid'])) {

    // }
    // else {
    //   echo "<script> alert('Please Log In'); </script>";
    //   header('Location: LogIn.php');
    // }
        $er = 0;
    if(isset($_POST['sup'])){
        $username = $_POST['name'];
        $gender = $_POST['gen'];
        $phonenum = $_POST['pnum'];
        $password = $_POST['pass'];
        $confirmp = $_POST['conpass'];
      $phonenum = $conn->real_escape_string($phonenum);
      $query3 = "CALL check_phone_registered('$phonenum')";
      if ($conn->query($query3) === FALSE) {
        echo '<script> alert("Phone Number already Regestered"); </script>';
        $er = 1;
      }
    if(strlen($password) < 8){
      echo '<script> alert("Password must be minimum 8 characters"); </script>';
      $er = 1;
    }
    if($confirmp != $password){
      echo '<script> alert("Confirm your password again"); </script>';
      $er = 1;
    }
        
    // When no errors redirect to index.php and insert values in user table
    if($er == 0){
        $i = 10;
        while ($i > 0) {
            $newuid = rand(105, 9999);
            $query1 = "INSERT INTO user VALUES ('$newuid', '$username', '$phonenum', '$gender', '$password');";
            if ($conn->query($query1) === FALSE) {
                echo $conn->error;
                $i = $i - 1;
            }
            else {
                $_SESSION['uid'] = $newuid;
                header('Location: SignUpConfirm.php');
                break;
            }
        }
        $conn->close();
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SignUp</title>
    </head>
    <body>
        <h2> SIGN UP </h2>
        <form method="POST">
            Full Name: <br>
            <input type="text" id="name" name="name" required> <br>
            <br> Gender: <br>
            <input type="radio" id="male" name="gen" value="M" required>
            Male <br>
            <input type="radio" id="female" name="gen" value="F">
            Female <br>
            <input type="radio" id="other" name="gen" value="O">
            Other <br>
            <br> Phone No: <br>
            <input type="tel" id="pnum" name="pnum" pattern="[0-9]{10}" placeholder="1234567890" required> <br>
            <br> Password: <br>
            <input type="password" id="pass" name="pass" required> <br>
            <br> Confirm Password: <br>
            <input type="password" id="conpass" name="conpass" required> <br>
            <br> <button type="submit" name="sup">Sign Up</button>
        </form>
        <br>Already have an account? 
        <a href="LogIn.php">Log In</a>
    </body>
</html>
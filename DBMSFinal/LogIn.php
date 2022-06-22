<?php
    session_start();
    include "Connection.php";
    session_unset();
    // if(isset($_SESSION['uid'])) {
    //     unset($_SESSION['uid']);
    // }
    // else {
    //   echo "<script> alert('Please Log In'); </script>";
    //   header('Location: LogIn.php');
    // }

    $errors = array('username' => '', 'password' => '', 'authenticate' => '');
    $username = $password = '';

    if(isset($_POST['lid'])){
        $username = $_POST['uid'];
        $password = $_POST['pass'];
        
        if(! array_filter($errors)){
            $username = $conn->real_escape_string($username);
            $password = $conn->real_escape_string($password);
            //CHECK CORRECT USERNAME PASSWORD
            $query1 = "CALL check_user_credentials('$username', '$password')";
            if ($conn->query($query1) === FALSE) {
              $errors['authenticate'] .= $conn->error;
                echo "Incorrect User ID or Password!";
            }
            else{
              $_SESSION['uid'] = $username;
              header('Location: Home.php');
            }
            $conn->close();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
    </head>
    <body>
        <h2> LOG IN </h2>
        <form method="POST">
            User ID: <br>
            <input type="text" id="uid" name="uid" required> <br>
            <br> Password: <br>
            <input type="password" id="pass" name="pass" required> <br>
            <div id="myDIV">
                <!-- <p style="color:red;">Incorrect User ID or Password!</p> -->
            </div>
            <!-- <script type="text/javascript">
                alert("Incorrect User ID or Password!");
            </script> -->
            <br><button onclick="myFunction()" type="submit" value="Log In" name="lid">Submit</button>
        </form>
        <br>Don't have an account? 
        <a href="SignUp.php">Sign Up</a>

        <script>
            function myFunction() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";  // shows
                }
                else {
                    x.style.display = "none";   // hides
                }
            }
        </script>
    </body>
</html>
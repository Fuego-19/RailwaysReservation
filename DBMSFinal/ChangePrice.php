<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
        if($_SESSION['uid']!= -1){
            header('Location: LogIn.php');
        }
    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }
    
    if (isset($_POST['sub'])) {
        unset($_POST['sub']);
        $coach = $_POST['ctype'];
        $price = $_POST['price'];
        $op = "UPDATE price SET price = $price WHERE coach = '$coach'";
        // $op = mysqli_query($conn, "UPDATE price SET price = $price WHERE coach = '$coach'");
        if ($conn->query($op) === FALSE) {
            echo "<script> alert('$conn->error'); </script>";
        }
        // echo $op;
        else {
        echo "<script> alert('Price Updated'); </script>";
        }
        
        header('Location: AdminHome.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ChangePrice</title>
        <style>
            #bg {
                width: 100%;
                height: 100%;
                text-align: center;
                /* background-color: #8dc99d; */
            }
            #options {
                width: 80%;
                padding: 25px 25px;
                text-align: center;
                background-color: lightyellow;
                display: inline-block;
                border: 3px solid black;
                border-radius: 25px;
            }   
            ol {
                padding-left: 0;
                text-align: center;
                display: inline-block;
            }
            .button {
                border-radius: 25px;
                border: none;
                padding: 16px 32px;
                text-align: center;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.2s;
                cursor: pointer;
            }
            .smallbtn {
                padding: 8px 16px;
                font-size: 12px;
                margin: 2px 1px;
            }
            .b1 {
                background-color: white; 
                color: black; 
                border: 2px solid #008CBA;
            }
            .b1:hover {
                background-color: #008CBA;
                color: white;
            }

        </style>
    </head>
    <body style="background-color:#8dc99d;">
        <div id="bg">
            <h1> Change Price </h1><br>
            <form method="POST">
                <div id="options">
                    Coach Type: <select name="ctype" required>
                        <option value="A"> A </option>
                        <option value="B"> B </option>
                        <option value="C"> C </option>
                        <option value="S"> S </option>
                        <option value="T"> T </option>
                    </select> <br><br>
                    Price: <input type = 'number' name = 'price' required> <br> <br>
            <button class = "button b1" type = "submit" name = "sub"> Change Price </button>  <br><br>
        </div> <br><br> 
        <a href="AdminHome.php">Home</a>
    </body>
</html>
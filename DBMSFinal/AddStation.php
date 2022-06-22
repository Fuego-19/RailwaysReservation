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
        $error = '';
        $sname = $_POST['sname'];
        if (0 < mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM station WHERE station_name = '$sname'"))[0]) {
            $error = 'Station already exists';
        }
        $np = $_POST['nplat'];
        $sid = mysqli_fetch_row(mysqli_query($conn, "SELECT MAX(station_id) FROM station"))[0] + 1;
        if ($error != '') {
            echo "<script> alert($error); </script>";
        }
        else {
            mysqli_query($conn, "INSERT INTO station VALUES ($sid, '$sname', $np)");
            echo "<script> alert('New Station Added'); </script>";
            
            // header('Location: AdminHome.php');
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AddStation</title>
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
            <h1> Add Station </h1><br>
            <form method="POST">
                <div id="options">
                    <br><br>
                    Station Name: <input type = 'text' name = 'sname' required> <br><br>
                    # Platforms: <input type = 'number' name = 'nplat' min = '1' required> <br> <br>
            <button class = "button b1" type = "submit" name = "sub"> Add Station </button>  <br><br>
        </div> <br><br> 
        <a href="AdminHome.php">Home</a>
    </body>
</html>
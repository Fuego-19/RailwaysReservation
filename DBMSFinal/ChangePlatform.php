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
        $tname = $_POST['tname'];
        $sname = $_POST['sname'];
        $newplat = $_POST['newplat'];

        if (mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM train WHERE train_name = '$tname'"))[0] == 0) {
            $error = 'Train dosent exist';
        }
        else if (mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM station WHERE station_name = '$sname'"))[0] == 0) {
            $error = 'Station dosent exist';
        }
        else if ($newplat > mysqli_fetch_row(mysqli_query($conn, "SELECT no_of_platforms FROM station WHERE station_name = '$sname'"))[0]) {
            $error = 'Platform dosent exist';
        }
        else if (mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM train_schedule WHERE train_number IN (SELECT train_number FROM train WHERE train_name = '$tname') AND station_id IN (SELECT station_id FROM station WHERE station_name = '$sname')"))[0] == 0) {
            $error = 'Station is not present in the train\'s route';
        }

        if ($error == '') {
            // mysqli_query($conn, "UPDATE train_schedule SET platform_no = $newplat WHERE train_number IN (SELECT train_number FROM train WHERE train_name = '$tname') AND station_id IN (SELECT station_id FROM station WHERE station_name = '$sname')");
            $q = "UPDATE train_schedule SET platform_no = $newplat WHERE train_number IN (SELECT train_number FROM train WHERE train_name = '$tname') AND station_id IN (SELECT station_id FROM station WHERE station_name = '$sname')";
            if ($conn->query($q) === FALSE) {
                // echo $conn->error;
                echo "<script> alert('$conn->error'); </script>";
            }
            else {
                echo "<script> alert('Updated') </script>";
            }
            // header('Location: AdminHome.php');
        }
        else {
            echo "<script> alert('$error') </script>";
        }
        // $coach = $_POST['ctype'];
        // $price = $_POST['price'];
        // mysqli_query($conn, "UPDATE price SET price = $price WHERE coach = '$coach'");
        // echo "<script> alert('Price Updated'); </script>";
        
        // header('Location: AdminHome.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ChangePlatform</title>
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
            <h1> Change Platform </h1><br>
            <form method="POST">
                <div id="options">
                    Train Name: <input name = 'tname' required> <br><br>
                    Station Name: <input name = 'sname' required> <br><br>
                    New Platform: <input type = 'number' name = 'newplat' min = 1 required> <br> <br>
            <button class = "button b1" type = "submit" name = "sub"> Change Platform </button>  <br><br>
        </div> <br><br> 
        <a href="AdminHome.php">Home</a>
    </body>
</html>
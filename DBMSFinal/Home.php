<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
        mysqli_query($conn, "CALL updateTrain_status_date()");
        mysqli_query($conn, "CALL update_trainSchedule_status()");
        // $uid = $_SESSION['uid'];
        // session_destroy();
        // $_SESSION['uid'] = $uid;
        if($_SESSION['uid'] == -1){
            header('Location: AdminHome.php');
        }
    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <style>
            #bg {
                width: 100%;
                height: 100%;
                text-align: center;
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
            <h1> HOME </h1><br>
            <div id="options">
                <button class="button b1" onclick="document.location='BookTicket.php'"> Book Ticket </button> <br> <br>
                <button class="button b1" onclick="document.location='TrainSchedule.php'"> Train Schedule </button> <br> <br>
                <button class="button b1" onclick="document.location='MyBookings.php'"> My Bookings </button> <br> <br>
            </div> <br> <br>
            <a href="LogIn.php">Log Out</a>
        </div>
    </body>
</html>
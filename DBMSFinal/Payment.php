<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {

    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }

    if(isset($_POST['sub'])) {
        $_SESSION['pay'] = $_POST['pay'];

        header('Location: Tickets.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Payment</title>
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
            <h1> Payment </h1><br>
            <form method="POST">
                <div id="options">
                    <?php
                        $amount = 0;
                        $pDetails = $_SESSION['pDetails'];
                        $orCity = $_SESSION['orCity'];
                        $dtCity = $_SESSION['dtCity'];
                        $train = $_SESSION['train'];
                        $totalSeats = 0;
                        for ($i = 0; $i < 5; $i++) {
                            $totalSeats += $_SESSION['bookedSeats'][$i];
                        }
                        for ($i = 0; $i < $totalSeats; $i++) {
                            $c = $pDetails[$i][3];
                            $amount += mysqli_fetch_row(mysqli_query($conn, "SELECT price from price where coach = '$c'"))[0];
                        }
                        
                        echo "<h4> Amount: $amount </h4>";
                    ?>
                    <input type="radio" id="net" name="pay" value=0 required>
                    Net Banking <br>
                    <input type="radio" id="card" name="pay" value=1>
                    Credit/Debit Card <br>
                    <input type="radio" id="upi" name="pay" value=2>
                    UPI ID <br>
                    <button class="button b1" type = "submit" name="sub">Pay</button>
                </div>
            </form>
                <br> <br>
            <a href="Passengers.php">Back</a>
        </div>
    </body>
</html>
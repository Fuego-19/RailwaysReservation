<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }

    echo '<script>
        // alert(" printing: " + escape(sessionStorage.getItem("bookTrain")) + " " + escape(sessionStorage.getItem("bookDTime")) + " " + escape(sessionStorage.getItem("bookATime")));
        document.cookie = escape("bookTrain") + "=" + escape(sessionStorage.getItem("bookTrain")) + "; path=/"; 
        document.cookie = escape("bookDTime") + "=" + escape(sessionStorage.getItem("bookDTime")) + "; path=/"; 
        document.cookie = escape("bookATime") + "=" + escape(sessionStorage.getItem("bookATime")) + "; path=/";  
    </script>';
    $bookTrain = $_COOKIE["bookTrain"];
    $bookDTime = $_COOKIE["bookDTime"];
    $bookATime = $_COOKIE["bookATime"];
    $_SESSION['train'] = $bookTrain;

    if (isset($_POST['sub'])) {
        $_SESSION['bookedSeats'] = array($_POST['Aseats'], $_POST['Bseats'], $_POST['Cseats'], $_POST['Sseats'], $_POST['Tseats']);
        header('Location: Passengers.php');
    }
    
    $conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Book Seat</title>
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
            <h1> Book Seat </h1><br>
            <form method="POST">
                <div id="options">
                    <style>
                        table, th, td {
                            width: 1%;
                            border: 1px solid black;
                            text-align: center;
                            background-color: lightyellow;
                        }
                        table {
                            border: 3px solid black;
                            border-radius: 5px;
                        }
                    </style>
                    <table style='width:100%'>
                        <tr>
                            <th>Coach </th>
                            <th>Seats Available</th>
                            <th># Book Seats  </th>
                            <th>Price (in Rs.)</th>
                        </tr>
                    <?php 
                        include "Connection.php";

                        $date = $_SESSION['date'];
                        echo "<h3>$bookTrain</h3>";
                        $query = "SELECT 
                                COUNT(*)
                            FROM
                                train_status T
                            WHERE
                                T.train_no  in (select train_number from Train where Train_Name = '$bookTrain') AND T.Booking_status = 0
                                    AND T.Date = '$date'
                                    AND Coach_No = 'A';";
                        $ACoach = mysqli_fetch_row(mysqli_query($conn, $query))[0];
                        $Aprice = mysqli_fetch_row(mysqli_query($conn, "SELECT price from price where coach = 'A'"))[0];

                        echo "<tr>
                            <td> AC 1 </td>
                            <td> $ACoach </td>
                            <td> <input type = 'number' min='0' max='$ACoach' id = 'Aseats' name = 'Aseats' required> </td>
                            <td> $Aprice </td>
                        </tr>";
                        
                        $query = "SELECT 
                                COUNT(*)
                            FROM
                                train_status T
                            WHERE
                                T.train_no  in (select train_number from Train where Train_Name = '$bookTrain') AND T.Booking_status = 0
                                    AND T.Date = '$date'
                                    AND Coach_No = 'B';";
                        $BCoach = mysqli_fetch_row(mysqli_query($conn, $query))[0];
                        $Bprice = mysqli_fetch_row(mysqli_query($conn, "SELECT price from price where coach = 'B'"))[0];

                        echo "<tr>
                            <td> AC 2 </td>
                            <td> $BCoach </td>
                            <td> <input type = 'number' min='0' max='$BCoach' id = 'Bseats' name = 'Bseats' required> </td>
                            <td> $Bprice </td>
                        </tr>";
                        
                        $query = "SELECT 
                                COUNT(*)
                            FROM
                                train_status T
                            WHERE
                                T.train_no  in (select train_number from Train where Train_Name = '$bookTrain') AND T.Booking_status = 0
                                    AND T.Date = '$date'
                                    AND Coach_No = 'C';";
                        $CCoach = mysqli_fetch_row(mysqli_query($conn, $query))[0];
                        $Cprice = mysqli_fetch_row(mysqli_query($conn, "SELECT price from price where coach = 'C'"))[0];

                        echo "<tr>
                            <td> AC 3 </td>
                            <td> $BCoach </td>
                            <td> <input type = 'number' min='0' max='$CCoach' id = 'Cseats' name = 'Cseats' required> </td>
                            <td> $Cprice </td>
                        </tr>";
                        
                        $query = "SELECT 
                                COUNT(*)
                            FROM
                                train_status T
                            WHERE
                                T.train_no  in (select train_number from Train where Train_Name = '$bookTrain') AND T.Booking_status = 0
                                    AND T.Date = '$date'
                                    AND Coach_No = 'S';";
                        $SCoach = mysqli_fetch_row(mysqli_query($conn, $query))[0];
                        $Sprice = mysqli_fetch_row(mysqli_query($conn, "SELECT price from price where coach = 'S'"))[0];

                        echo "<tr>
                            <td> Sleeper </td>
                            <td> $SCoach </td>
                            <td> <input type = 'number' min='0' max='$SCoach' id = 'Sseats' name = 'Sseats' required> </td>
                            <td> $Sprice </td>
                        </tr>";

                        $query = "SELECT 
                                COUNT(*)
                            FROM
                                train_status T
                            WHERE
                                T.train_no  in (select train_number from Train where Train_Name = '$bookTrain') AND T.Booking_status = 0
                                    AND T.Date = '$date'
                                    AND Coach_No = 'T';";
                        $TCoach = mysqli_fetch_row(mysqli_query($conn, $query))[0];
                        $Tprice = mysqli_fetch_row(mysqli_query($conn, "SELECT price from price where coach = 'T'"))[0];

                        echo "<tr>
                            <td> Genaral </td>
                            <td> $TCoach </td>
                            <td> <input type = 'number' min='0' max='$TCoach' id = 'Tseats' name = 'Tseats' required> </td>
                            <td> $Tprice </td>
                        </tr>";
                    ?>
                        </table>
                    <!-- <input type = "number" min="0" max="5" id = "Aseats" name = "Aseats">  -->
                    <button class = "button b1" type = "submit" name = "sub">Book Seats</button>
                </div>
            </form>
            <br>
            <a href="AvlTrains.php">Back</a>
        </div>
    </body>
</html>
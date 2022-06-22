<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }

    if (isset($_POST['sub'])) {
        
        // header('Location: .php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tickets</title>
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
            <h1> Tickets </h1><br>
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
                            <th> Passenger ID </th>
                            <th> Full Name </th>
                            <th> Age </th>
                            <th> Gender </th>
                            <th> PNR No. </th>
                            <th> Train </th>
                            <th> Origin </th>
                            <th> Destination </th>
                            <th> Date </th>
                            <th> Coach </th>
                            <th> Seat No. </th>
                        </tr>

                        <?php
                            $pDetails = $_SESSION['pDetails'];
                            $train = $_SESSION['train'];
                            $orCity = $_SESSION['orCity'];
                            $dtCity = $_SESSION['dtCity'];
                            $date = $_SESSION['date'];
                            $newPassID = mysqli_fetch_row(mysqli_query($conn, "SELECT MAX(passenger_id) FROM passenger;"))[0] + 1;
                            $newPNR = mysqli_fetch_row(mysqli_query($conn, "SELECT MAX(PNR_Number) FROM ticket;"))[0] + 1;
                            $tranID = rand(10000000, 99999999);
                            $uid = $_SESSION['uid'];
                            $amount = 0;

                            $totalSeats = 0;
                            for ($i = 0; $i < 5; $i++) {
                                $totalSeats += $_SESSION['bookedSeats'][$i];
                            }
                            for ($i = 0; $i < $totalSeats; $i++) {
                                $n = $pDetails[$i][0];
                                $a = $pDetails[$i][1];
                                $g = $pDetails[$i][2];
                                $c = $pDetails[$i][3];
                                $seat = 0;
                                $res = mysqli_query($conn, "SELECT seat_no FROM train_status where coach_no = '$c' AND train_no IN (SELECT train_number FROM train WHERE train_name = '$train') AND booking_status = 0 AND date = '$date'");
                                while ($row = mysqli_fetch_row($res)) {
                                    $seat = $row[0];
                                    break;
                                    // array_push($coachNo, $row[0]);
                                    // array_push($seatNo, $row[1]);
                                }
                                // for ($j = 0; $j < count($seatNo); $j++) {
                                //     if (strcmp($pDetails[$i][3], $coachNo[$j])) {
                                //         $seat = $seatNo[$j];
                                //         // $coachNo = array_slice($coachNo, $j, 1);
                                //         // $seatNo = array_slice($seatNo, $j, 1);
                                //         break;
                                //     }
                                // }
                                echo "<tr>
                                    <td> $newPassID </td>
                                    <td> $n </td>
                                    <td> $a </td>
                                    <td> $g</td>
                                    <td> $newPNR </td>
                                    <td> $train </td>
                                    <td> $orCity </td>
                                    <td> $dtCity </td>
                                    <td> $date </td>
                                    <td> $c </td>
                                    <td> $seat </td>
                                </tr>";
                                mysqli_query($conn, "INSERT INTO passenger VALUES('$n', $newPassID, $a, '$g')");
                                mysqli_query($conn, "INSERT INTO ticket VALUES($newPNR, (SELECT train_number FROM train WHERE train_name = '$train'), '$orCity', '$dtCity', '$date', $newPassID)");
                                mysqli_query($conn, "INSERT INTO boards VALUES($newPassID, (SELECT train_number FROM train WHERE train_name = '$train'))");
                                $trainNo = mysqli_fetch_row(mysqli_query($conn, "SELECT train_number FROM train WHERE train_name = '$train'"))[0];

                                mysqli_query($conn, "CALL updateTrain_status($newPassID, $trainNo, '$c', $seat, '$date')");
                                // mysqli_query($conn, "CALL updateTrain_status($newPassID, $trainNo, '$ct', '$seat')");
                                
                                $amount += mysqli_fetch_row(mysqli_query($conn, "SELECT price from price where coach = '$c'"))[0];
                                mysqli_query($conn, "INSERT INTO phast VALUES($newPassID, $newPNR)");
                                mysqli_query($conn, "INSERT INTO book VALUES($uid, $newPassID)");
                                $newPassID++;
                                // $newPNR++;
                                mysqli_query($conn, "INSERT INTO receive values($newPNR, $tranID)");
                            }
                            // $amount *= mysqli_fetch_row(mysqli_query($conn, "CALL find_no_of_stations('$orCity', '$dtCity')"))[0];
                            // echo $amount;    // ---------------------------------------------------------------------------------------------------
                            
                            $payM = $_SESSION['pay'];
                            mysqli_query($conn, "INSERT INTO payment VALUES ('$payM', '$amount', '$tranID')");
                            mysqli_query($conn, "INSERT INTO pays VALUES($tranID, $uid, '$date' )");
                        ?>
                    </table>
            <!-- <button class = "button b1" type = "submit" name = "sub"> Register Passengers </button>  <br><br> -->
        </div>
        <br> <br>
        <a href="Home.php">Home</a>
    </body>
</html>
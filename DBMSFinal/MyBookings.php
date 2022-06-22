<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }
    // echo $_SESSION['i'];
    for ($j = 1; $j <= $_SESSION['i']; $j++) {
        if (isset($_POST['cancel'.$j])) {
            unset($_POST['cancel'.$j]);
            $cancel_pnr = $_SESSION['cancelPnr'];
            $cancelPnr = $cancel_pnr[$j-1];
            $uid = $_SESSION['uid'];
            // add in cancel
            mysqli_query($conn, "INSERT INTO cancel VALUES ($uid, $cancelPnr, 50)");
            // get pid
            $pids = array();
            $res = mysqli_query($conn, "SELECT passenger_id FROM ticket WHERE pnr_number = $cancelPnr");
            while ($row = mysqli_fetch_row($res)) {
                array_push($pids, $row[0]);
            }
            // update train status
            for ($k = 0; $k < count($pids); $k++) {
                $p = $pids[$k];
                mysqli_query($conn, "UPDATE train_status SET booking_status = 0, pid = 0 WHERE pid = $p");
            }
            $tranID = mysqli_fetch_row(mysqli_query($conn, "SELECT transaction_id FROM receive WHERE pnr_no = $cancelPnr LIMIT 1"))[0];
            // del payment
            mysqli_query($conn, "DELETE FROM payment WHERE transaction_id = $tranID");
            // del receive
            mysqli_query($conn, "DELETE FROM receive WHERE pnr_no = $cancelPnr LIMIT 1");
            // del book
            // del passanger
            for ($k = 0; $k < count($pids); $k++) {
                $p = $pids[$k];
                mysqli_query($conn, "DELETE FROM passenger WHERE passenger_id = $p");
                mysqli_query($conn, "DELETE FROM book WHERE passenger_id = $p");
                mysqli_query($conn, "DELETE FROM boards WHERE passenger_id = $p");
            }
            // del phat
            mysqli_query($conn, "DELETE FROM phast WHERE pnr_no = $cancelPnr");
            // del ticket
            mysqli_query($conn, "DELETE FROM ticket WHERE pnr_number = $cancelPnr");

            echo "<script> alert('Ticket Cancelled'); </script>";
        }
    }
    // if (isset($_POST['sub'])) {
        
    //     // header('Location: .php');
    // }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyBookings</title>
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
            <h1> My Bookings </h1><br>
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

                    <?php
                        function printPassengerDetails($conn, $pid) {
                            $q = "SELECT * from (select @utl:=$pid) t, passenger_booking_details_1;";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $n = $row[1];
                                $a = $row[2];
                                $g = $row[3];
                                $t = $row[4];
                                $train = mysqli_fetch_row(mysqli_query($conn, "SELECT train_name from train where train_number = $t"))[0];
                                $orCity = $row[5];
                                $dtCity = $row[6];
                                $date = $row[7];
                                $coach = $row[8];
                                $seat = $row[9];
                            }
                            echo "<tr>
                                    <td> $pid </td>
                                    <td> $n </td>
                                    <td> $a </td>
                                    <td> $g</td>
                                    <td> $train </td>
                                    <td> $orCity </td>
                                    <td> $dtCity </td>
                                    <td> $date </td>
                                    <td> $coach </td>
                                    <td> $seat </td>
                                </tr>";
                        }

                        $uid = $_SESSION['uid'];
                        $q = "SELECT passenger_id FROM book WHERE user_id = $uid";
                        $res = mysqli_query($conn, $q);
                        $pnr = 0;
                        $flag = 0;
                        $i = 0;
                        $cancel_pnr = array();
                        while ($row = mysqli_fetch_row($res)) {
                            $flag = 1;
                            $pid = $row[0];
                            $curpnr = mysqli_fetch_row(mysqli_query($conn, "SELECT pnr_number FROM ticket WHERE passenger_id = $pid limit 1"))[0];
                            if ($pnr == $curpnr) {
                                // print passenger details
                                printPassengerDetails($conn, $pid);
                            }
                            else {
                                if ($pnr != 0) {
                                    // end table
                                    echo "</table>";
                                    // print payment details
                                    $tranID = mysqli_fetch_row(mysqli_query($conn, "SELECT transaction_id FROM receive WHERE pnr_no = $pnr"))[0];
                                    $date = mysqli_fetch_row(mysqli_query($conn, "SELECT date FROM pays WHERE user_id = $uid and transaction_id = $tranID"))[0];
                                    $amount = mysqli_fetch_row(mysqli_query($conn, "SELECT amount FROM payment WHERE transaction_id = '$tranID'"))[0];
                                    
                                    echo " Transaction ID: $tranID &emsp; Amount(Rs): $amount &emsp; Date: $date ";
                                    
                                    $res1 = mysqli_query($conn, "SELECT 
                                        TS.Arrival_Time
                                    FROM
                                        train_schedule TS
                                    WHERE
                                        (TS.Station_ID IN (SELECT 
                                                S.Station_ID
                                            FROM
                                                station S
                                            WHERE
                                                S.Station_Name IN (SELECT 
                                                        T.Source
                                                    FROM
                                                        ticket T
                                                    WHERE
                                                        T.Passenger_ID = $pid))
                                            AND TS.Train_number IN (SELECT 
                                                T.Train_Number
                                            FROM
                                                ticket T
                                            WHERE
                                                T.Passenger_ID = $pid))");
                                    $time = mysqli_fetch_row($res1)[0];
                                    date_default_timezone_set('Asia/Calcutta');
                                    $d = date('Y-m-d');
                                    $curT = date('H:i:s');
                                    if ($date > $d || ($time > $curT && $date == $d)) {
                                        $i++;
                                        $n = 'cancel'.$i;
                                        echo " <button class = 'button b1 smallbtn' name = $n> Cancel Ticket </button> <br> ";
                                        array_push($cancel_pnr, $pnr);
                                    }
                                    else {
                                        echo "<br><br>";
                                    }
                                }
                                $pnr = $curpnr;
                                // start new table
                                echo "<h3> PNR No.: $pnr </h3>
                                <table style='width:100%'>
                                    <tr>
                                        <th> Passenger ID </th>
                                        <th> Full Name </th>
                                        <th> Age </th>
                                        <th> Gender </th>
                                        <th> Train </th>
                                        <th> Origin </th>
                                        <th> Destination </th>
                                        <th> Date </th>
                                        <th> Coach </th>
                                        <th> Seat No. </th>
                                    </tr>";
                                // print passenger details
                                printPassengerDetails($conn, $pid);
                            }
                        }
                    ?>
                    </table>
                    <?php
                    if ($flag == 1) {
                        $tranID = mysqli_fetch_row(mysqli_query($conn, "SELECT transaction_id FROM receive WHERE pnr_no = $pnr"))[0];
                        $date = mysqli_fetch_row(mysqli_query($conn, "SELECT date FROM pays WHERE user_id = '$uid'"))[0];
                        $amount = mysqli_fetch_row(mysqli_query($conn, "SELECT amount FROM payment WHERE transaction_id = '$tranID'"))[0];
                        echo " Transaction ID: $tranID &emsp; Amount(Rs): $amount &emsp; Date: $date ";
                        
                        $res1 = mysqli_query($conn, "SELECT 
                            TS.Arrival_Time
                        FROM
                            train_schedule TS
                        WHERE
                            (TS.Station_ID IN (SELECT 
                                    S.Station_ID
                                FROM
                                    station S
                                WHERE
                                    S.Station_Name IN (SELECT 
                                            T.Source
                                        FROM
                                            ticket T
                                        WHERE
                                            T.Passenger_ID = $pid))
                                AND TS.Train_number IN (SELECT 
                                    T.Train_Number
                                FROM
                                    ticket T
                                WHERE
                                    T.Passenger_ID = $pid))");
                        $time = mysqli_fetch_row($res1)[0];
                        date_default_timezone_set('Asia/Calcutta');
                        $d = date('Y-m-d');
                        $curT = date('H:i:s');
                        if ($date > $d || ($time > $curT && $date == $d)) {
                            $i++;
                            $n = 'cancel'.$i;
                            echo " <button class = 'button b1 smallbtn' name = $n> Cancel Ticket </button> <br> ";
                            array_push($cancel_pnr, $pnr);
                        }
                        else {
                            echo "<br><br>";
                        }
                    }
                    else {
                        echo "
                            <script> alert('No past bookings'); </script>
                        ";
                    }
                    $_SESSION['cancelPnr'] = $cancel_pnr;
                    $_SESSION['i'] = $i;
                    ?>
            <!-- <button class = "button b1" type = "submit" name = "sub"> Register Passengers </button>  <br><br> -->
        </div>
        <br> <br>
        <a href="Home.php">Home</a>
    </body>
</html>
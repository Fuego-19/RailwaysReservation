<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {

    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }

    mysqli_query($conn, "CALL update_trainSchedule_status()");

    $trainName = '';

    $sName = $pNo = $aTime = $dTime = $status = array();
    if(isset($_POST['submit'])) {
        $trainName = $_POST['Tname'];
        // $_SESSION['Tname'] = $trainName;
    
    //     $query = "SELECT 
    //     S.Station_Name,
    //     T.Platform_No,
    //     T.Arrival_Time,
    //     T.Departure_Time,
    //     T.Status
    // FROM
    //     Train_schedule T,
    //     Station S
    // WHERE
    //     T.Train_Number IN (SELECT 
    //             Train_number
    //         FROM
    //             train
    //         WHERE
    //             Train_Name = '$trainName')
    //         AND T.Station_ID = S.Station_ID;";
        $tno = mysqli_fetch_row(mysqli_query($conn, "SELECT train_number from train where train_name = '$trainName' limit 1"))[0];
        $query = "SELECT * from (select @utl:=$tno) t, train_schedule_view;";

        $res = mysqli_query($conn, $query);
        $flag = 0;
        while ($row = mysqli_fetch_row($res)) {
            $r = $row[1];
            $temp = mysqli_fetch_row(mysqli_query($conn, "SELECT station_name from station where station_id = $r limit 1;"))[0];
            array_push($sName, $temp);
            array_push($pNo, $row[2]);
            array_push($aTime, $row[3]);
            array_push($dTime, $row[4]);
            if ($row[5] == 0) {
                array_push($status, 'Departed');
            }
            else if ($row[5] == 1) {
                array_push($status, 'At Station');
            }
            else if ($row[5] == 2) {
                array_push($status, 'Not Arrived');
            }
            else {
                array_push($status, '---');
            }
            $flag = 1;
        }
        if ($flag == 0) {
            echo '<script type="text/javascript"> alert("The Train dosen\'t exist"); </script>';
        }
    }
    
    $conn->close();
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
            <h1> Train Schedule </h1><br>
            <form method="POST">
                <div id="options">
                    Enter Train Name 
                    <input type = "search" name = "Tname" id = "Tname" required> <br> <br>
                    <button class = "button b1" type = "submit" name = "submit"> Get Schedule </button> <br> <br>
                    <?php 
                    
                    if ($sName != NULL) {
                        echo " <style>
                            table, th, td {
                                width: 10%;
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
                                <th>Station Name</th>
                                <th>Platform No.</th>
                                <th>Arrival Time </th>
                                <th>Departure Time</th>
                                <th>Status</th>
                            </tr>";

                            $k = 0;
                            while($k < count($sName)){
                                echo "<tr>
                                    <td> $sName[$k] </td>
                                    <td> $pNo[$k] </td>
                                    <td> $aTime[$k] </td>
                                    <td> $dTime[$k] </td>
                                    <td> $status[$k]</td>
                                </tr>";
                                $k += 1;
                            }
                            echo "</table>";
                        }
                    ?>
                    <!-- <button class = "button b1" type = "submit" name = "sub">Search Trains</button> -->
                </div>
            </form>
            <br>
            <a href="Home.php">Home</a>
        </div>
    </body>
</html>
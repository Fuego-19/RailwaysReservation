<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }

    //REDIRECTION
    // if(isset($_SESSION['username'])){
    //   if($_SESSION['username'] == 'admin1' || $_SESSION['username'] == 'admin'){
    //       header('Location: admin-page.php');
    //   }
    //   else{
    //     header('Location: user.php');
    //   }
    // }

    $origin = $dest = $error = '';
    mysqli_query($conn, "CALL update_trainSchedule_status()");
    if(isset($_POST['sub'])) {
        $origin = $_POST['orCity'];
        $dest = $_POST['dtCity'];
        $date = $_POST['Ddate'];
        $tname_a = array();
        
        $q1 = mysqli_query($conn, "SELECT 
                station_id
            FROM
                station S
            WHERE
                S.Station_name = '$origin' ");
        $sid = 0;
        while ($row = mysqli_fetch_row($q1)) {
            $sid = $row[0];
        }

        $q2 = mysqli_query($conn, "SELECT 
                station_id
            FROM
                station S
            WHERE
                S.Station_name = '$dest'");
        $did = 0;
        while ($row = mysqli_fetch_row($q2)) {
            $did = $row[0];
        }

        // date_default_timezone_set("Asia/Calcutta");
        // // if ($date > date('Y-m-d')) {
        //     $tno_a = array();
        //     $dt_a = array();
        //     $q1 = mysqli_query($conn, "SELECT train_number, departure_time FROM train_schedule WHERE station_id = $sid");
        //     while ($row = mysqli_fetch_row($q1)) {
        //         array_push($tno_a, $row[0]);
        //         array_push($dt_a, $row[1]);
        //     }

        //     for ($i = 0; $i < count($tno_a); $i++) {
        //         $tno = $tno_a[$i];
        //         $dt = $dt_a[$i];
        //         $q2 = mysqli_query($conn, "SELECT train_number FROM train_schedule WHERE station_id = $did AND train_number = $tno AND arrival_time > '$dt'");
        //         while ($row = mysqli_fetch_row($q2)) {
        //             array_push($final_tno_a, $row[0]);
        //         }
        //     }

        //     for ($i = 0; $i < count($final_tno_a); $i++) {
        //         $t = $final_tno_a[$i];
        //         array_push($tname_a, mysqli_fetch_row(mysqli_query($conn, "SELECT train_name FROM train WHERE train_number = $t"))[0]);
        //     }
        // }
        // else {
            $tno_a = array();
            $dt_a = array();
            $q1 = mysqli_query($conn, "SELECT train_number, departure_time FROM train_schedule WHERE station_id = $sid AND date = '$date' AND status = 2");
            while ($row = mysqli_fetch_row($q1)) {
                array_push($tno_a, $row[0]);
                array_push($dt_a, $row[1]);
            }

            $final_tno_a = array();
            for ($i = 0; $i < count($tno_a); $i++) {
                $tno = $tno_a[$i];
                $dt = $dt_a[$i];
                $q2 = mysqli_query($conn, "SELECT train_number FROM train_schedule WHERE station_id = $did AND train_number = $tno AND arrival_time > '$dt' AND date = '$date' AND status = 2");
                while ($row = mysqli_fetch_row($q2)) {
                    array_push($final_tno_a, $row[0]);
                }
            }

            for ($i = 0; $i < count($final_tno_a); $i++) {
                $t = $final_tno_a[$i];
                array_push($tname_a, mysqli_fetch_row(mysqli_query($conn, "SELECT train_name FROM train WHERE train_number = $t"))[0]);
            }
        // }

        

        // $tn = array();
        // $q3 = $q4 = 0;
        // date_default_timezone_set("Asia/Calcutta");
        // $d = date('Y-m-d');
        // // echo date("Y-m-d", strtotime("+3 day", $d));
        // if($date > $d) {//} && $date <= date("Y-m-d", strtotime("+3 day", $d))){
        //     echo "IN IF";
        //     $q3 = mysqli_query($conn, " SELECT 
        //     Train_number
        // FROM
        //     train_schedule T
        // WHERE
        //     T.Station_ID = '$sid'
        //         ");

        //     $q4 = mysqli_query($conn, " SELECT 
        //             Departure_Time
        //         FROM
        //             train_schedule T
        //         WHERE
        //             T.Station_ID = '$sid'
        //             ");

        // }
        // else{
        //     echo "IN ELSE";
        //     $q3 = mysqli_query($conn, " SELECT 
        //             Train_number
        //         FROM
        //             train_schedule T
        //         WHERE
        //             T.Status = 2 AND T.Station_ID = '$sid'
        //                 AND T.Date = '$date' ");

        

        //     $q4 = mysqli_query($conn, " SELECT 
        //             Departure_Time
        //         FROM
        //             train_schedule T
        //         WHERE
        //             T.Status = 2 AND T.Station_ID = '$sid'
        //             AND T.Date = '$date' ");
        // }
        // while ($row = mysqli_fetch_row($q3)) {
        //     array_push($tn, $row[0]);
        // }
        // $dt = array();  

        // while ($row = mysqli_fetch_row($q4)) {
        //     array_push($dt,$row[0]);
        // }
        // $m = 0;
        // $ftn = array();
        
        // while($m < count($dt)){
        //     array_push($ftn, mysqli_query($conn, "SELECT 
        //             Train_number
        //         FROM
        //             train_schedule
        //         WHERE
        //             Train_number = '$tn[$m]' AND Date = '$date'
        //                 AND Station_ID = '$did'
        //                 AND Arrival_Time > '$dt[$m]' "));
                        
        //     $m += 1;
        // }
        // $aftn = array();
        // $q = 0;
        // while($q < count($ftn)){
        //     array_push($aftn, mysqli_fetch_row($ftn[$q])[0]);
        //     $q += 1;   
        // }
        // $tnames = array();
        // $temp = array();
        // $w = 0;
        // while($w < count($aftn)){
        //         $query1 = "SELECT 
        //         Train_Name
        //     FROM
        //         train
        //     WHERE
        //         Train_Number = '$aftn[$w]'";
        //     array_push($temp, mysqli_query($conn, $query1));
        //     $w += 1;
        // }

        // // $_SESSION['availableTrains'] = $res;
        // $flag = 0;
        // $it = 0;
        // while($it < count($temp)){
        //     while ($row = mysqli_fetch_row($temp[$it])){
        //         array_push($tnames, $row[0]);
        //         print("Train Name: ".$row[0]."\n");
        //         $flag = 1;
        //     }
        //     $it += 1;
        // }
        if (count($tname_a) == 0) {
            echo '<script type="text/javascript"> alert("No train(s) available for given input"); </script>';
        }
        else {
            $_SESSION['availableTrains'] = $tname_a;
            $_SESSION['orCity'] = $origin;
            $_SESSION['dtCity'] = $dest;
            $_SESSION['date'] = $date;
            // mysqli_free_result($res);
            header('Location: AvlTrains.php');
        }
        $conn->close();
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
            <h1> Book Ticket </h1><br>
            <form method="POST">
                <div id="options">
                    Origin City  <input type="text" id="orCity" name="orCity" required> <br><br><br>
                    Destination City  <input type="text" id="dtCity" name="dtCity" required> <br>
                    <br><br>
                    Departure Date <input type = "date" id = "Ddate" name = "Ddate"> <br><br>
                    <button class = "button b1" type = "submit" name = "sub">Search Trains</button>
                </div>
            </form>
            <br> <br>
            <a href="Home.php">Home</a>
        </div>
    </body>
</html>
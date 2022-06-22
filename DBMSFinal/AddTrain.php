<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
        $atime = array();
        $dtime = array();
        $sname = array();
        $pno = array();
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
        $no = $_SESSION['no'];
        $tname = $_POST['tName'];
        // if (mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM train WHERE train_name = '$tname'"))[0] > 0) {
        //     $error = 'Train name already exists';
        //     $no = 0;
        // }
        for ($i = 0; $i < $no; $i++) {
            $a = 'at'.$i;
            $d = 'dt'.$i;
            $s = 'sn'.$i;
            $p = 'pn'.$i;
            array_push($atime, $_POST[$a]);
            array_push($dtime, $_POST[$d]);
            array_push($sname, $_POST[$s]);
            array_push($pno, $_POST[$p]);
            if ($atime[$i] >= $dtime[$i]) {
                $error = 'Arrival time cant be > Departure time';
                break;
            }
            else if ($i != 0 && $dtime[$i-1] >= $atime[$i]) {
                $error = 'Previous departure time cant be > Arrival time';
                break;
            }
            $sn = $sname[$i];
            $res = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM station WHERE station_name = '$sn'"))[0];
            if ($res == 0) {
                $error = 'Station dosent exist';
                break;
            }
            $pl = mysqli_fetch_row(mysqli_query($conn, "SELECT no_of_platforms FROM station WHERE station_name = '$sn'"))[0];
            if ($pno[$i] > $pl) {
                $error = 'Platform number dosent exist';
                break;
            }
        }
        if ($error != '') {
            echo "<script> alert('$error'); </script>";
        }
        else {
            date_default_timezone_set("Asia/Calcutta");
            $d = date('Y-m-d');
            $tno = mysqli_fetch_row(mysqli_query($conn, "SELECT MAX(Train_number) FROM train"))[0] + 1;
            // mysqli_query($conn, "INSERT INTO train VALUES ($tno, '$tname')");
            $query = "INSERT INTO train VALUES ($tno, '$tname')";
            if($conn -> query($query) === FALSE){
                echo "<script> alert('$conn->error'); </script>";
            }
            else{
                for ($i = 0; $i < $no; $i++) {
                    echo "adding...";
                    $at = $atime[$i];
                    $dt = $dtime[$i];
                    $sn = $sname[$i];
                    $pn = $pno[$i];
                    $sid = mysqli_fetch_row(mysqli_query($conn, "SELECT station_id FROM station WHERE station_name = '$sn'"))[0];
                    mysqli_query($conn, "INSERT INTO train_schedule VALUES ($tno, '$at', '$dt', '$d', $sid, $pn, 0)");
                }
                // ADD SEATS IN TRAIN STATUS ==============================================================================================================
                $s = array('A', 'B', 'C', 'S', 'T');
                $n = array(13, 21, 25,  41, 31);
                for ($i = 0;$i<3; $i++) {
                    $date = strtotime("+".$i." day", strtotime($d));
                    for ($j =0; $j<5; $j++) {
                        $co = $s[$j];
                        for ($k =1; $k <= $n[$j]; $k++) {
                            mysqli_query($conn, "INSERT into train_status values ($tno, '$co',$k ,0 , 0, date_add('$d', interval $i day))");
                        }

                    }

                }

                echo "<script> alert('New Train Added w/ Schedule'); </script>";
                $_SESSION['added'] = 1;
                header('Location: AdminHome.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AddTrain</title>
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
            <h1> Add Train </h1><br>
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
                        if(isset($_POST['add'])) {
                            echo "Train Name: <input type='text' id='tName' name='tName' required> &emsp;&emsp; ";
                        }
                        else {
                            echo "Number of Stops: <input type='number' name='noPlat'> <button class = 'button b1 smallbtn' name = 'add'> Add Row </button>";
                        }
                    ?>
                    <br><br>
                    
                    <table style='width:100%'>
                        <tr>
                            <th> Arrival Time </th>
                            <th> Departure Time </th>
                            <th> Station Name </th>
                            <th> Platform No. </th>
                        </tr>
                        <!-- <tr>
                            <td> <input type = 'time' name = 'at0' value = '' required> </td>
                            <td> <input type = 'time' name = 'dt0' value = '' required> </td>
                            <td> <input type = 'text' name = 'sn0' value = '' required> </td>
                            <td> <input type = 'number' name = 'pn0' value = '' required> </td>
                        </tr> -->
                        <?php
                            if (isset($_POST['add'])) {
                                $_SESSION['no'] = $_POST['noPlat'];
                                // $tname = $_POST['tName'];
                                for ($i = 0; $i < $_POST['noPlat']; $i++) {
                                    $a = 'at'.$i;
                                    $d = 'dt'.$i;
                                    $s = 'sn'.$i;
                                    $p = 'pn'.$i;
                                    echo "<tr>
                                        <td> <input type = 'time' name = '$a' required> </td>
                                        <td> <input type = 'time' name = '$d' required> </td>
                                        <td> <input type = 'text' name = '$s' required> </td>
                                        <td> <input type = 'number' name = '$p' required> </td>
                                    </tr>";
                                }
                            }
                        ?>
                    </table>
            <br> <br>
            <?php
                if (isset($_POST['add'])) {
            echo "<button class = 'button b1' type = 'submit' name = 'sub'> Add Train </button>  <br><br>";
                }
            ?>
        </div> <br><br> 
        <a href="AdminHome.php">Home</a>
    </body>
</html>
<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {

    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }
    $a = $_SESSION['availableTrains'];

    $atime = array();
    $dtime = array();
    
    $orCity = $_SESSION['orCity'];
    $dtCity = $_SESSION['dtCity'];

    $i = 0;
    while ($i < count($a)) {
        $query = "SELECT 
        Departure_Time
    FROM
        train_schedule
    WHERE
        Train_Number IN (SELECT 
                Train_Number
            FROM
                Train T
            WHERE
                T.Train_Name = '$a[$i]')
            AND Station_ID IN (SELECT 
                Station_ID
            FROM
                station
            WHERE
                Station_Name = '$orCity');";
        $res1 = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_row($res1)) {
            array_push($dtime, $row[0]);
        }
        mysqli_free_result($res1);
        $i+=1;
    }   

    $j = 0;
    while($j < count($a)){
        $query2 = "SELECT 
        Arrival_Time
    FROM
        train_schedule
    WHERE
        Train_number IN (SELECT 
                Train_Number
            FROM
                Train T
            WHERE
                T.Train_Name = '$a[$j]')
            AND Station_ID IN (SELECT 
                Station_ID
            FROM
                station
            WHERE
                Station_Name = '$dtCity');";
        $res2 = mysqli_query($conn, $query2);
        while ($row2 = mysqli_fetch_row($res2)) {
            array_push($atime, $row2[0]);
        }
        $j += 1;
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AvlTrains</title>
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
                /* background-color: lightyellow; */
                display: inline-block;
                /* border: 3px solid black; */
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
            <h1> Available Trains </h1><br>
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
                                <th>Train</th>
                                <th>Depature Time</th>
                                <th>Arrival Time</th>
                                <th>Book</th>
                            </tr>
                        
                    <?php 
                        $k = 0;
                        while($k < count($a)){
                            echo"<tr>
                                <td> $a[$k] </td>
                                <td> $dtime[$k] </td>
                                <td> $atime[$k] </td>
                                <td> <button onclick='pass(\"$a[$k]\", \"$dtime[$k]\", \"$atime[$k]\")' class = 'button b1 smallbtn' name = 'book'> Book </button> </td>
                                
                            </tr>";
                            $k += 1;
                        }
                        echo "</table>";
                    ?>
                    <script>
                        function pass(train, dtime, atime) {
                            // if (train != NULL) {
                                sessionStorage.SessionName = "bookTrain";
                                sessionStorage.setItem("bookTrain", train);
                                sessionStorage.SessionName = "bookDTime";
                                sessionStorage.setItem("bookDTime", dtime);
                                sessionStorage.SessionName = "bookATime";
                                sessionStorage.setItem("bookATime", atime);
                                <?php
                                if (isset($_POST['book'])) {
                                    unset($_POST['book']);
                                    header('Location: BookSeat.php');
                                }
                                ?>
                            // }
                            // window.location.href = 'BookSeat.php';
                            // alert(train + " - " + dtime + " - " + atime + " -> " + sessionStorage.getItem("bookTrain"));
                        }
                    </script>
                </div>
            </form>
            <br> <br>
            <a href="BookTicket.php">Back</a>
        </div>

        <script type="text/javascript">
            function myFunction(train, dtime, atime) {
                alert(train + " " + dtime + " " + atime);
            }
        </script>
    </body>
</html>
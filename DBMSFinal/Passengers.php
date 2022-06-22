<?php
    session_start();
    include "Connection.php";
    if(isset($_SESSION['uid'])) {
    }
    else {
      echo "<script> alert('Please Log In'); </script>";
      header('Location: LogIn.php');
    }

    $totalSeats = 0;
    for ($i = 0; $i < 5; $i += 1) {
        $totalSeats += $_SESSION['bookedSeats'][$i];
    }

    if (isset($_POST['sub'])) {
        $flag = 0;
        $coaches = array();
        for ($i = 0; $i < $_SESSION['bookedSeats'][0]; $i += 1) {
            array_push($coaches, 'A');
        }
        for ($i = 0; $i < $_SESSION['bookedSeats'][1]; $i += 1) {
            array_push($coaches, 'B');
        }
        for ($i = 0; $i < $_SESSION['bookedSeats'][2]; $i += 1) {
            array_push($coaches, 'C');
        }
        for ($i = 0; $i < $_SESSION['bookedSeats'][3]; $i += 1) {
            array_push($coaches, 'S');
        }
        for ($i = 0; $i < $_SESSION['bookedSeats'][4]; $i += 1) {
            array_push($coaches, 'T');
        }
        $_SESSION['pDetails'] = array();
        for ($i = 1; $i <= $totalSeats; $i += 1) {
            if ($_POST['age'.$i] < 3 || $_POST['age'.$i] > 120) {
                echo "<script> alert('Age should be between 3 and 120'); </script>";
                $flag = 1;
                break;
            }
            else {
                $detail = array($_POST['pname'.$i], $_POST['age'.$i], $_POST['gen'.$i], $coaches[$i-1]);
                array_push($_SESSION['pDetails'], $detail);
            }
        }
        if ($flag == 0) {
            header('Location: Payment.php');
        }
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
            <h1> Passenger Information </h1><br>
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
                            <th>Full Name </th>
                            <th>Age </th>
                            <th>Gender </th>
                            <th>Coach </th>
                        </tr>

                        <?php
                            $name = 'pname';
                            $age = 'age';
                            $str = 'gen';
                            $no = 1;
                            for ($i = 0; $i < $_SESSION['bookedSeats'][0]; $i += 1) {
                                $n = $name . $no;
                                $a = $age . $no;
                                $g = $str . $no;
                                $no += 1;
                                echo "<tr>
                                    <td> <input type = 'text' id = 'pname' name = '$n' required> </td>
                                    <td> <input type = 'number' id = 'age' name = '$a' required> </td>
                                    <td> <input type='radio' id='male' name='$g' value='M' required> Male <input type='radio' id='female' name='$g' value='F'> Female <input type='radio' id='other' name='$g' value='O'> Other </td>
                                    <td> AC 1 </td>
                                </tr>";
                            }
                            for ($i = 0; $i < $_SESSION['bookedSeats'][1]; $i += 1) {
                                $n = $name . $no;
                                $a = $age . $no;
                                $g = $str . $no;
                                $no += 1;
                                echo "<tr>
                                    <td> <input type = 'text' id = 'pname' name = '$n' required> </td>
                                    <td> <input type = 'number' id = 'age' name = '$a' required> </td>
                                    <td> <input type='radio' id='male' name='$g' value='M' required> Male <input type='radio' id='female' name='$g' value='F'> Female <input type='radio' id='other' name='$g' value='O'> Other </td>
                                    <td> AC 2 </td>
                                </tr>";
                            }
                            for ($i = 0; $i < $_SESSION['bookedSeats'][2]; $i += 1) {
                                $n = $name . $no;
                                $a = $age . $no;
                                $g = $str . $no;
                                $no += 1;
                                echo "<tr>
                                    <td> <input type = 'text' id = 'pname' name = '$n' required> </td>
                                    <td> <input type = 'number' id = 'age' name = '$a' required> </td>
                                    <td> <input type='radio' id='male' name='$g' value='M' required> Male <input type='radio' id='female' name='$g' value='F'> Female <input type='radio' id='other' name='$g' value='O'> Other </td>
                                    <td> AC 3 </td>
                                </tr>";
                            }
                            for ($i = 0; $i < $_SESSION['bookedSeats'][3]; $i += 1) {
                                $n = $name . $no;
                                $a = $age . $no;
                                $g = $str . $no;
                                $no += 1;
                                echo "<tr>
                                    <td> <input type = 'text' id = 'pname' name = '$n' required> </td>
                                    <td> <input type = 'number' id = 'age' name = '$a' required> </td>
                                    <td> <input type='radio' id='male' name='$g' value='M' required> Male <input type='radio' id='female' name='$g' value='F'> Female <input type='radio' id='other' name='$g' value='O'> Other </td>
                                    <td> Sleeper </td>
                                </tr>";
                            }
                            for ($i = 0; $i < $_SESSION['bookedSeats'][4]; $i += 1) {
                                $n = $name . $no;
                                $a = $age . $no;
                                $g = $str . $no;
                                $no += 1;
                                echo "<tr>
                                    <td> <input type = 'text' id = 'pname' name = '$n' required> </td>
                                    <td> <input type = 'number' id = 'age' name = '$a' required> </td>
                                    <td> <input type='radio' id='male' name='$g' value='M' required> Male <input type='radio' id='female' name='$g' value='F'> Female <input type='radio' id='other' name='$g' value='O'> Other </td>
                                    <td> General </td>
                                </tr>";
                            }
                            $no -= 1;
                        ?>
                    </table>
            <br> <br>
            <button class = "button b1" type = "submit" name = "sub"> Register Passengers </button>  <br><br>
        </div> <br><br>
        <a href="BookSeat.php">Back</a>
    </body>
</html>
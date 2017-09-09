<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './src/db/db_connection.php';

if (!isset($_COOKIE['loginUser'])) {
    header('Location: ./login.php');
    exit();
}

$conn = OpenCon();
$selectVehicle = '';
$reservationStartPoint = '';
$reservationEndPoint = '';
$reservationDate = '';
$reservationVehicleType = '';
$arr = array();

if (isset($_POST['vehicleN'])) {
    $selectVehicle = $_POST['vehicleN'];
    $reservationStartPoint = $_POST['start'];
    $reservationEndPoint = $_POST['end'];
    $reservationDate = $_POST['date'];
    $reservationVehicleType = $_POST['type'];
}

$query = "SELECT * FROM VEHICLE WHERE NUMBER='" . $selectVehicle . "'";
mysqli_query($conn, $query) or die('Error querying database.');

$result = mysqli_query($conn, $query);

//while ($row = mysqli_fetch_array($result)) {
// echo $row['NAME'] . ' ' . $row['PHONENO'] . ': ' . $row['ADDRESS'] . ' ' . $row['PASSWORD'] .'<br />';
//}

function getDriver($email) {
    global $conn;
    global $arr;
    $query = "SELECT * FROM USERS WHERE EMAIL='" . $email . "'";
    mysqli_query($conn, $query) or die('Error querying database.');
    $selectDriver = mysqli_query($conn, $query);
    if ($selectDriver->num_rows > 0) {
        while ($row = mysqli_fetch_array($selectDriver)) {
            $arr[0] = $row['EMAIL'];
            $arr[1] = $row['NAME'];
            $arr[2] = $row['PHONENO'];
            $arr[3] = $row['ADDRESS'];
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Cab (GET YOUR CAB)</title>
        <link href="res/css/bootstrap.css" rel="stylesheet">
        <link href="res/css/font-awesome.css" rel="stylesheet">
        <script src="res/js/jquery.js" type="text/javascript"></script>
        <script src="res/js/bootstrap.js" type="text/javascript"></script>
        <style type="text/css">
            #backgroundImage{z-index: 1;}

            #backgroundImage:before {
                content: "";
                position: absolute;
                z-index: -1;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background-image: url(res/img/6487161_orig.jpg);
                background-repeat: no-repeat;
                background-size: 100%;
                opacity: 0.4;
                filter:alpha(opacity=40);
                height:100%;
                width:100%;
            }
        </style>
    </head>
    <body style="background-color: whitesmoke">
        <div class="navbar navbar-inverse navbar-static-top" style="margin-bottom: 0">
            <div class="container">
                <div class="navbar-header">
                    <a style="color: #cccc00" class="navbar-brand" href="index.php">My Cab</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a style="color: #cccc00" class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-bars fa-fw"></i>Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a style="padding: 10px;" href="src/login/logOut.php"><i class="fa fa-sign-out fa-fw"></i>Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="jumbotron" style="margin-bottom: 0px;">
            <div class="container">
                <h2 class="text-uppercase"><a href="#" style="text-decoration: none; color: #cccc00">Make Reservation</a></h2>
<!--                <h4>Complete user <small><?php echo $_COOKIE['loginUser']; ?></small></h4>-->
                <h4>Complete reservation</h4>
                <!--                <div class="pull-right">
                                    <a style="padding: 10px;" href="search.php"><i class="fa fa-calendar-o fa-fw"></i>Make Reservation</a>
                                </div>-->
            </div>
        </div>
        <div class="well" style="background-color: #cccc00; padding: 0px 0px 0px 0px; margin-bottom: 0px;">
            <div class="container">
                <h4 class="text-uppercase" style="color: #333300; font-weight: bold; font-size: x-large">Make Reservation</h4>
            </div>
        </div>
        <div class="well" style="margin-bottom: 0px;">
            <div class="container">
                <h3>Reservation Detail</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <h4>Start Point</h4>
                        <h5><?php echo $reservationStartPoint; ?></h5>
                    </div>
                    <div class="col-lg-4">
                        <h4>End Point</h4>
                        <h5><?php echo $reservationEndPoint; ?></h5>
                    </div>
                    <div class="col-lg-4">
                        <h4>Reservation Date</h4>
                        <h5><?php echo $reservationDate; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="well">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Vehicle Detail</h4>
                        <table class="table table-responsive table-striped">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                getDriver($row['DRIVER_EMAIL'])
                                ?>
                                <tr>
                                    <td>Vehicle number</td>
                                    <td><?php echo $row['NUMBER']; ?></td>
                                </tr>
                                <tr>
                                    <td>Driver email</td>
                                    <td><?php echo $row['DRIVER_EMAIL']; ?></td>
                                </tr>
                                <tr>
                                    <td>Vehicle type</td>
                                    <td><?php echo $row['TYPE']; ?></td>
                                </tr>
                                <tr>
                                    <td>No of seats</td>
                                    <td><?php echo $row['NO_OF_SEATS']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h4>Driver Detail</h4>
                        <table class="table table-responsive table-striped">
                            <tr>
                                <td>Driver Email</td>
                                <td><?php echo $arr[0]; ?></td>
                            </tr>
                            <tr>
                                <td>Driver Name</td>
                                <td><?php echo $arr[1]; ?></td>
                            </tr>
                            <tr>
                                <td>Phone no</td>
                                <td><?php echo $arr[2]; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $arr[3]; ?></td>
                            </tr>
                        </table>

                        <div class="pull-right">
                            <form id="reservationForm" action="src/makeReservation.php" method="post">
                                <input type="hidden" id="number" name="reservation[number]" value="<?php echo $selectVehicle; ?>"/>
                                <input type="hidden" id="start" name="reservation[start]" value="<?php echo $reservationStartPoint; ?>"/>
                                <input type="hidden" id="end" name="reservation[end]" value="<?php echo $reservationEndPoint; ?>"/>
                                <input type="hidden" id="date" name="reservation[date]" value="<?php echo $reservationDate; ?>"/>
                                <button type="submit" class="btn btn-warning btn-sm">
                                    Done
                                </button>
                            </form>
                        </div>
                    </div>
                    <div id="reservation_error" style="display: none; color: transparent; margin: 2em; text-align: center">
                        <p class="text-danger text-lowercase">
                            <i class="fa fa-fw fa-close"></i>
                            Reservation fail. please try again.
                        </p>
                    </div>
                    <div id="reservation_success" style="display: none; color: transparent; margin: 2em; text-align: center">
                        <p class="text-success text-lowercase">
                            <i class="fa fa-fw fa-check"></i>
                            new user successfully registered.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $("#reservationForm").submit(function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var formDataSerialized = $(this).serialize();
                    console.log(formDataSerialized);
                    $.post("src/makeReservation.php", formDataSerialized, function (data) {
                        if (data === '200') {
                            window.location.href='dashboardPassenger.php';
                        } else {
                            $('#reservation_error').show();
                        }
                    });
                });
            });
        </script>

    </body>
</html>
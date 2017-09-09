<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include './src/db/db_connection.php';

if (!isset($_COOKIE['loginUser'])) {
    header('Location: ./login.php');
}

$conn = OpenCon();
//Variables
$selectVehicle = '';
$cookieError = FALSE;
$reservationStartPoint = '';
$reservationEndPoint = '';
$reservationDate = '';
$reservationVehicleType = '';

if (!isset($_COOKIE['loginUser'])) {
    header('Location: ./login.php');
    exit();
}

if (isset($_POST['bookdate']) && isset($_POST['startPoint']) && isset($_POST['endPoint']) && isset($_POST['vehicleType'])) {
    $format = 'Y-m-d';
    $date = DateTime::createFromFormat($format, $_POST['bookdate']);
    $searchDate = $date->format("Y-m-d");
    $reservationStartPoint = $_POST['startPoint'];
    $reservationEndPoint = $_POST['endPoint'];
    $reservationDate = $searchDate;
    $reservationVehicleType = $_POST['vehicleType'];
} else {
    $cookieError = TRUE;
}

$query = "SELECT * FROM VEHICLE";
mysqli_query($conn, $query) or die('Error querying database.');
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM RESERVATION WHERE DATE(BOOK_DATE) = '" . $reservationDate . "'";
mysqli_query($conn, $query2) or die('Error querying database.');
$notAvarlabe = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM VEHICLE WHERE TYPE = '" . $reservationVehicleType . "'";
mysqli_query($conn, $query3) or die('Error querying database.');
$allVehicles = mysqli_query($conn, $query3);
//while ($row = mysqli_fetch_array($allVehicles)) {
// echo $row['NUMBER'] . ' ' . $row['DRIVER_EMAIL'] .'<br />';
//}
//
//while ($row = mysqli_fetch_array($notAvarlabe)) {
// echo $row['VEHICLE_ID'] . ' ' . $row['START_POINT'] . ' ' . $row['END_POINT'] . $row['BOOK_DATE'] . '<br />';
//}
//while ($row = mysqli_fetch_array($allVehicles)) {
//    while ($row2 = mysqli_fetch_array($notAvarlabe)) {
//        if ($row['NUMBER'] != $row2['VEHICLE_ID']) {
//            echo 'Hole';
//        } else {
//            echo '123456';
//        }
//    }
//}
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
                opacity: 0.2;
                filter:alpha(opacity=20);
                height:100%;
                width:100%;
            }
        </style>
    </head>
    <body id="backgroundImage">
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
                            <li><a style="padding: 10px;" href="dashboardPassenger.php"><i class="fa fa-user fa-fw"></i>Account</a></li>
                            <li><a style="padding: 10px;" href="src/login/logOut.php"><i class="fa fa-sign-out fa-fw"></i>Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <h2 class="text-uppercase"><a href="index.php" style="text-decoration: none; color: #cccc00">My Cab (Cab Service)</a></h2>
                <h4>Search Result</h4>
                <!--<div class="pull-right">
                    <a style="padding: 10px;" href="search.php"><i class="fa fa-calendar-o fa-fw"></i>Make Reservation</a>
                </div>-->
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form id="searchForm" method="post" action="search.php">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input id="startPoint" type="text" class="form-control" name="startPoint" placeholder="Starting point">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input id="endPoint" type="text" class="form-control" name="endPoint" placeholder="Ending point">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="bookdate" type="date" class="form-control" name="bookdate" placeholder="Booking date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-cab"></i></span>
                                            <select class="form-control" onchange="getSelectedTypeForReservation()" name="vehicleType" id="vehicleTypeSelect">
                                                <option selected>Select a vehicle type</option>
                                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                    <option value="<?php echo $row['TYPE']; ?>"><?php echo $row['TYPE']; ?></option>
                                                    <?php
                                                }
                                                CloseCon($conn);
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="vehicleType" name="vehicleType"/>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-warning btn-block">
                                            <span class="fa fa-search"></span> Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="well-sm">
                <div class="row">
                    <div class="col-md-3">
                        <h4>Vehicle Number</h4>
                    </div>
                    <div class="col-md-3">
                        <h4>Vehicle Type</h4>
                    </div>
                    <div class="col-md-3">
                        <h4>Vehicle No Of Seats</h4>
                    </div>
                    <div class="col-md-3">
                        <h4></h4>
                    </div>
                </div>
            </div>
            <div>
                <?php
                if ($notAvarlabe->num_rows > 0 && $allVehicles->num_rows > 0) {
                    while ($row = mysqli_fetch_array($allVehicles)) {
                        while ($row2 = mysqli_fetch_array($notAvarlabe)) {
                            if ($row2['VEHICLE_ID'] != $row['NUMBER']) {
                                ?>
                                <div class="well" style="background-color: white">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><?php echo $row['NUMBER']; ?></h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4><?php echo $row['TYPE']; ?></h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4><?php echo $row['NO_OF_SEATS']; ?></h4>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="./vehicleDetail.php" method="post">
                                                <input type="hidden" id="vehicleN" name="vehicleN" value="<?php echo $row['NUMBER']; ?>"/>
                                                <input type="hidden" id="start" name="start" value="<?php echo $reservationStartPoint; ?>"/>
                                                <input type="hidden" id="end" name="end" value="<?php echo $reservationEndPoint; ?>"/>
                                                <input type="hidden" id="date" name="date" value="<?php echo $reservationDate; ?>"/>
                                                <input type="hidden" id="type" name="type" value="<?php echo $reservationVehicleType; ?>"/>
                                                <button type="submit" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye fa-fw"></i>view
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="row">
                                    <h4 class="text-center text-info">No available cabs in searched date.</h4>
                                </div>
                                <?php
                            }
                        }
                    }
                } else if ($allVehicles->num_rows > 0 && $notAvarlabe->num_rows <= 0) {
                    while ($row = mysqli_fetch_array($allVehicles)) {
                        ?>
                        <div class="well" style="background-color: white">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4><?php echo $row['NUMBER']; ?></h4>
                                </div>
                                <div class="col-md-3">
                                    <h4><?php echo $row['TYPE']; ?></h4>
                                </div>
                                <div class="col-md-3">
                                    <h4><?php echo $row['NO_OF_SEATS']; ?></h4>
                                </div>
                                <div class="col-md-3">
                                    <form action="./vehicleDetail.php" method="post">
                                        <input type="hidden" id="vehicleN" name="vehicleN" value="<?php echo $row['NUMBER']; ?>"/>
                                        <input type="hidden" id="start" name="start" value="<?php echo $reservationStartPoint; ?>"/>
                                        <input type="hidden" id="end" name="end" value="<?php echo $reservationEndPoint; ?>"/>
                                        <input type="hidden" id="date" name="date" value="<?php echo $reservationDate; ?>"/>
                                        <input type="hidden" id="type" name="type" value="<?php echo $reservationVehicleType; ?>"/>
                                        <button type="submit" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye fa-fw"></i>view
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="row">
                        <h4 class="text-center text-info">No available cabs in searched date.</h4>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <script type="text/javascript">
            function getSelectedTypeForReservation() {
                document.getElementById('vehicleType').value = document.getElementById('vehicleTypeSelect').value;
            }

//            jQuery(document).ready(function ($) {
//                $("#searchForm").submit(function (e) {
//                    e.preventDefault();
//                    var $form = $(this);
//                    var formDataSerialized = $(this).serialize();
//                    console.log(formDataSerialized);
//                    $.post("src/search/searchKeyWord.php", formDataSerialized, function (data) {
//                        if (data === '200') {
//                            $('#update_success').show();
//                        } else {
//                            $('#update_error').show();
//                        }
//                    });
//                });
//            });

        </script>

    </body>
</html>


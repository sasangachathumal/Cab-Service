<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './src/db/db_connection.php';

$conn = OpenCon();

//Step2
$query = "SELECT * FROM RESERVATION WHERE PASSENGER_EMAIL='".$_COOKIE['loginUser']."'";
mysqli_query($conn, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($conn, $query);
//while ($row = mysqli_fetch_array($result)) {
// echo $row['NAME'] . ' ' . $row['PHONENO'] . ': ' . $row['ADDRESS'] . ' ' . $row['PASSWORD'] .'<br />';
//}
?>
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

    <div class="jumbotron">
        <div class="container">
            <h2 class="text-uppercase"><a href="dashboardPassenger.php" style="text-decoration: none; color: #cccc00">Cab Service Account</a></h2>
            <h4>Welcome User <small><?php echo $_COOKIE['loginUser']; ?></small></h4>
            <div class="pull-right">
                <a style="padding: 10px;" href="search.php"><i class="fa fa-calendar-o fa-fw"></i>Make Reservation</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                <table class="table table-striped table-hover table-responsive text-center">
                    <thead>
                        <tr class="text-uppercase" style="background-color: #cccc00">
                            <td class="text-center">Vehicle Number</td>
                            <td class="text-center">Vehicle Type</td>
                            <td class="text-center">Passenger</td>
                            <td class="text-center">Driver</td>
                            <td class="text-center">Reservation Date</td>
                            <td class="text-center">Start Location</td>
                            <td class="text-center">End Location</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <?php
                            $query = "SELECT * FROM VEHICLE WHERE NUMBER='" . $row['VEHICLE_ID'] . "'";
                            mysqli_query($conn, $query) or die('Error querying database.');
                            $resultVehicle = mysqli_query($conn, $query);
                            while ($row2 = mysqli_fetch_array($resultVehicle)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['VEHICLE_ID']; ?></td>
                                    <td><?php echo $row2['TYPE']; ?></td>
                                    <td><?php echo $row['PASSENGER_EMAIL']; ?></td>
                                    <td><?php echo $row2['DRIVER_EMAIL']; ?></td>
                                    <td><?php echo $row['BOOK_DATE']; ?></td>
                                    <td><?php echo $row['START_POINT']; ?></td>
                                    <td><?php echo $row['END_POINT']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../src/db/db_connection.php';

$conn = OpenCon();

//Step2
$query = "SELECT * FROM VEHICLE";
mysqli_query($conn, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($conn, $query);
//while ($row = mysqli_fetch_array($result)) {
// echo $row['NAME'] . ' ' . $row['PHONENO'] . ': ' . $row['ADDRESS'] . ' ' . $row['PASSWORD'] .'<br />';
//}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Cab (GET YOUR CAB) - Vehicles</title>
        <link href="../res/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../res/css/font-awesome.css" rel="stylesheet" type="text/css">
        <script src="../res/js/jquery.js" type="text/javascript"></script>
        <script src="../res/js/bootstrap.js" type="text/javascript"></script>
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
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a style="color: #cccc00" class="navbar-brand" href="index.php">My Cab</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a style="color: #cccc00" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars fa-fw"></i>Menu
<!--                            <span class="caret"></span>-->
                        </a>
                        <ul class="dropdown-menu">
                            <li><a style="padding: 10px;" href="#"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a></li>
                            <li><a style="padding: 10px;" href="../user/users.php"><i class="fa fa-users fa-fw"></i>Users</a></li>
                            <li class="active"><a style="padding: 10px;" href="vehicals.php"><i class="fa fa-car fa-fw"></i>Vehicles</a></li>
                            <li><a style="padding: 10px;" href="src/login/logOut.php"><i class="fa fa-sign-out fa-fw"></i>Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <h2><a href="../dashboardAdmin.php" style="text-decoration: none; color: #cccc00">Cab Service Dashboard</a></h2>
                <h4>Welcome Admin (<small><?php echo $_COOKIE['loginUser']; ?></small>) to Vehicle List</h4>
                <div class="pull-right">
                    <a href="newVehicle.php"><i class="fa fa-car fa-fw"></i>New</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                    <table class="table table-striped table-bordered table-hover table-responsive text-center">
                        <thead>
                            <tr class="text-uppercase" style="background-color: #ffff00">
                                <th class="text-center">Vehicle Number</th>
                                <th class="text-center">Driver Email</th>
                                <th class="text-center">Vehicle Type</th>
                                <th class="text-center">No of Seats</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $row['NUMBER']; ?></td>
                                    <td><?php echo $row['DRIVER_EMAIL']; ?></td>
                                    <td><?php echo $row['TYPE']; ?></td>
                                    <td><?php echo $row['NO_OF_SEATS']; ?></td>
                                    <td>
                                        <form method="post" action="updateVehicle.php">
                                            <input type="hidden" name="updateNumber" id="updateNumber" value="<?php echo $row['NUMBER']; ?>"/>
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
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